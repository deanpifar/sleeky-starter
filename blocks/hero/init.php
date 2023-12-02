<?php 

function cwp_register_block_script() {
    wp_register_script( 'block-hero-script', get_template_directory_uri() . '/blocks/hero/script.js', [ 'acf', 'jquery', 'slickslider' ] );
    wp_enqueue_script( 'block-hero-script' );
}

add_action( 'init', 'cwp_register_block_script' );

?>