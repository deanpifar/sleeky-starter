<?php

/*
Custom Scripts and Styles
-------------------------------------
*/

function custom_scripts() {

  if ( $GLOBALS['pagenow'] != 'wp-login.php' && ! is_admin() ) {

		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), null, true);

		wp_register_script( 'slickslider', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.8.1', true );
		wp_enqueue_script( 'slickslider' );

		//wp_register_script( 'animateonscroll', get_template_directory_uri() . '/assets/js/aos.js', array(), '6.1.1', true );
		//wp_enqueue_script( 'animateonscroll' );

    //wp_register_script( 'featherlight', get_template_directory_uri() . '/assets/js/featherlight.min.js', array(), '1.7.14', true );
		//wp_enqueue_script( 'featherlight' );

    //wp_register_script( 'wowjs', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '1.3.0', true );
		//wp_enqueue_script( 'wowjs' );

		//wp_register_script( 'fontawesome', get_template_directory_uri() . '/assets/js/font-awesome.js', array(), '6.1.1', true );
		//wp_enqueue_script( 'fontawesome' );

		wp_register_script( 'sleeky', get_template_directory_uri() . '/assets/js/scripts.js', array('wp-util', 'jquery', 'slickslider'), '1.0.0', true );
		wp_enqueue_script( 'sleeky' );

  }

}

function custom_styles() {

  if ( $GLOBALS['pagenow'] != 'wp-login.php' && !is_admin() ) {

    wp_register_style( 'sleeky', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'sleeky' );

    //wp_register_style( 'slickslider', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.6.0', 'all' );
    //wp_enqueue_style( 'slickslider' );

    //wp_register_style( 'slickslidertheme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), '1.6.0', 'all' );
    //wp_enqueue_style( 'slickslidertheme' );

    //wp_register_style( 'featherlightcss', get_template_directory_uri() . '/assets/css/featherlight.min.css' );
    //wp_enqueue_style( 'featherlightcss' );

    //wp_register_style( 'wowjscss', get_template_directory_uri() . '/assets/css/animate.min.css' );
    //wp_enqueue_style( 'wowjscss' );

    //wp_register_style( 'animateonscroll', get_template_directory_uri() . '/assets/css/aos.css' );
    //wp_enqueue_style( 'animateonscroll' );

  }

}

function custom_menus() {

/*
Registering Menus
-------------------------------------
*/

register_nav_menus( array(

  'primary' => 'Primary menu',
  // 'secondary' => 'Secondary menu',
  // 'tertiary' => 'Tertiary menu'

));

}