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
	wp_enqueue_script( 'jquery-ui-resizable');
	wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), null, false);
	wp_enqueue_script('slickd-js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery', 'jquery-ui-resizable', 'slick-js'), null, false);
}

add_action('enqueue_block_editor_assets', 'my_block_plugin_editor_scripts');

function toast_rs_enqueue(){
	wp_enqueue_style( 'toast_rs_style', get_template_directory_uri() . '/style.css');
}
add_action('admin_enqueue_scripts', 'toast_rs_enqueue');


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
			[
                'slug'  => 'about-design',
                'title' => esc_html__( 'From About page', 'text-domain' ),
            ],
        ]
    );

    return ($new_cats);
}
 
add_filter( 'block_categories_all', 'wpdocs_add_new_block_category');


function cwp_load_blocks() {
	register_block_type( get_template_directory() . '/blocks/example/block.json' );

	$blocks = acf_get_block_types();

	foreach( $blocks as $block ) {
		if ( file_exists( get_template_directory() . '/blocks/' . $block['name'] . '/block.json' ) ) {

		}
	}

}
add_action( 'init', 'cwp_load_blocks' );