<?php

/*
Blocks Settings
-------------------------------------
*/

function ghub_child_setup() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
}

add_action( 'after_setup_theme', 'ghub_child_setup' );

function my_block_plugin_editor_scripts() {

	wp_enqueue_script('slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), null, false);
	wp_enqueue_script('slickd-js', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slick-js'), null, false);
}

add_action('enqueue_block_editor_assets', 'my_block_plugin_editor_scripts');

/*
Blocks Category Settings
-------------------------------------
*/ 

function wpdocs_add_new_block_category( $block_categories ) {
 
    $new_cats = array_merge(
        $block_categories,
        [
            [
                'slug'  => 'homepage-design',
                'title' => esc_html__( 'From Homepage', 'text-domain' ),
            ],
        ]
    );

    return ($new_cats);
}
 
add_filter( 'block_categories_all', 'wpdocs_add_new_block_category');

/*
Blocks
-------------------------------------
*/ 

function acf_hero_item_block() {
	
	if( function_exists('acf_register_block') ) {
		
		acf_register_block(array(
			'name'				=> 'example',
			'title'				=> __('Example'),
			'description'		=> __('Example Block.'),
			'render_template'	=> 'template-parts/example.php',
			'category'			=> 'homepage-design',
			'icon'				=> 'excerpt-view',
			'keywords'			=> array( 'example' ),
		));

       /*acf_register_block(array(
			'name'				=> 'hero',
			'title'				=> __('Hero'),
			'description'		=> __('A hero for the page.'),
			'render_template'	=> 'template-parts/hero.php',
			'category'			=> 'homepage-design',
			'icon'				=> 'excerpt-view',
			'keywords'			=> array( 'hero' ),
		));*/

	}
}

add_action('acf/init', 'acf_hero_item_block');