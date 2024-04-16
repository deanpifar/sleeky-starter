<?php

/*
	Blocks Settings
-------------------------------------
*/

function include_scripts_in_backend() {
  wp_enqueue_script( 'jquery-ui-resizable');

  wp_register_script( 'slickslider', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.8.1', true );
  wp_enqueue_script( 'slickslider' );

  wp_register_script( 'sleeky', get_template_directory_uri() . '/assets/js/scripts.js', array('wp-util', 'jquery', 'slickslider'), '1.0.0', true );
  wp_enqueue_script( 'sleeky' );
}

add_action('enqueue_block_editor_assets', 'include_scripts_in_backend');

function include_global_styles_blocks() {
	wp_enqueue_style( 'sleeky-block', get_template_directory_uri() . '/style.css');
}

add_action('admin_enqueue_scripts', 'include_global_styles_blocks');

add_filter( 'should_load_separate_core_block_assets', '__return_true' );

/*
	Autoload blocks
-------------------------------------
*/ 

function load_blocks() {
	$theme  = wp_get_theme();
	$blocks = get_blocks();
	foreach( $blocks as $block ) {
		if ( file_exists( get_template_directory() . '/blocks/' . $block . '/block.json' ) ) {
			register_block_type( get_template_directory() . '/blocks/' . $block . '/block.json', array('style' => 'block-' . $block) );
			wp_register_style( 'block-' . $block, get_template_directory_uri() . '/blocks/' . $block . '/style.css' );

			if ( file_exists( get_template_directory() . '/blocks/' . $block . '/init.php' ) ) {
				include_once get_template_directory() . '/blocks/' . $block . '/init.php';
			}
		}
	}
}
add_action( 'init', __NAMESPACE__ . '\load_blocks', 5 );

function load_acf_field_group( $paths ) {
	$blocks = get_blocks();
	foreach( $blocks as $block ) {
		$paths[] = get_template_directory() . '/blocks/' . $block;
	}
	return $paths;
}
add_filter( 'acf/settings/load_json', __NAMESPACE__ . '\load_acf_field_group' );

function get_blocks() {
	$theme = wp_get_theme();
	$blocks = get_option( 'cwp_blocks' );
	$version = get_option( 'cwp_blocks_version' );
	if ( empty( $blocks ) || version_compare( $theme->get( 'Version' ), $version ) || ( function_exists( 'wp_get_environment_type' ) && 'development' !== wp_get_environment_type() ) ) {
		$blocks = scandir( get_template_directory() . '/blocks/' );
		$blocks = array_values( array_diff( $blocks, array( '..', '.', '.DS_Store', '_base-block' ) ) );

		update_option( 'cwp_blocks', $blocks );
		update_option( 'cwp_blocks_version', $theme->get( 'Version' ) );
	}
	return $blocks;
}

function block_categories( $categories ) {

	// Check to see if we already have a CultivateWP category
	$include = true;
	foreach( $categories as $category ) {
		if( 'blog-blocks' === $category['slug'] ) {
			$include = false;
		}
	}

	if( $include ) {
		$categories = array_merge(
			$categories,
			[
				[
					'slug'  => 'custom',
					'title' => __( 'Custom' ),
				],
			]
		);
	}

	return $categories;
}
add_filter( 'block_categories_all', __NAMESPACE__ . '\block_categories' );