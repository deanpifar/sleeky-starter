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

/*
WooCommerce Settings
-------------------------------------
*/

// If you want to use the WooCommerce settings from the Sleeky Starter
$enable_theme_woocommece_settings = true;

if( $enable_theme_woocommece_settings ) {

  // Disable the default WooCommerce Styles
  add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


  // Change the Remove text next to the assigned coupon on the cart page
  function filter_woocommerce_cart_totals_coupon_html( $coupon_html, $coupon, $discount_amount_html ) {
    $coupon_html = str_replace( '[Remove]', 'x', $coupon_html );

    return $coupon_html;
  }

  add_filter( 'woocommerce_cart_totals_coupon_html', 'filter_woocommerce_cart_totals_coupon_html', 10, 3 );

}

add_action( 'wp_footer', function() {
	
	?><script>
	jQuery( function( $ ) {
		let timeout;
		$('.woocommerce').on('change', 'input.qty', function(){
			if ( timeout !== undefined ) {
				clearTimeout( timeout );
			}
			timeout = setTimeout(function() {
				$("[name='update_cart']").trigger("click"); // trigger cart update
			}, 500 ); // 1 second delay, half a second (500) seems comfortable too
		});
	} );
	</script><?php
	
} );