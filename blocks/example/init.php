<?php

  /*
  This file is not needed if the block is not using any scripts or special PHP to "power" it.
  -------------------------------------
  */ /* - Change function name and uncomment the function

  function register_block_example_script() {
    wp_register_script( 'block-example-script', get_template_directory_uri() . '/blocks/example/script.js', [ 'acf', 'jquery', 'slickslider' ] );
    wp_enqueue_script( 'block-example-script' );
  }

  add_action( 'init', 'register_block_example_script' );

?>