<?php

/*
Custom Logo Function / WP-AdminLogin Screen
-------------------------------------
*/

function custom_logo() {
  add_theme_support(
    'custom-logo', array(
      'flex-height' => true,
      'flex-width' => true,
      'header-text' => array(
        'site-title',
        'site-description'
      )
    )
  );
}

function custom_login_logo() {
  echo '<style type="text/css">
    h1 a {
      background-image:url("' . wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] . '") !important;
      -webkit-background-size: contain !important;
      background-size: contain !important;
      height: 150px !important;
      width: 100% !important;
      outline: none !important;
    }
    h1 a:focus {
      -webkit-box-shadow: none !important;
      box-shadow: none !important;
    }
  </style>';
}

function custom_login_logo_url( $url ) {
  return get_bloginfo( 'url' );
}

/*
Excerpt Settings
-------------------------------------
*/

function custom_excerptlength( $length ) {
  return 20;
}

function custom_excerptmore( $more ) {
  return '&hellip;';
}

/*
Generate pretty menu
-------------------------------------
*/

function site_menu( $name = '', $depth = 1 ) {
	if( $name ) {
		$menu = wp_nav_menu( "container_class=menu&echo=0&menu=$name&depth=$depth" );
	} else {
		$menu = wp_nav_menu( "container_class=menu&echo=0&depth=$depth" );
	}

	/* Remove the wrapper and the poorly used title element */
	$menu = str_replace( '<div class="menu">', '', $menu );
	$menu = str_replace( '<ul>', '', $menu );
	$menu = str_replace( '</ul></div>', '', $menu );
	$menu = preg_replace( '/<ul id=\"(.*?)\" class=\"(.*?)\">/', '', $menu );
	$menu = preg_replace( '/title=\"(.*?)\"/', '', $menu );
	echo $menu;
}

/*
Custom Mime
-------------------------------------
*/

function custom_mime( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

/*
Generate Thumbnail Function
-------------------------------------
*/

function generate_thumbnail( $size ) {
  if ( ! get_the_post_thumbnail() ) {
    $thumbnail = get_field( 'default_image', 'option' )['sizes'][$size];
  } else {
    $thumbnail = get_the_post_thumbnail_url( get_the_ID(), $size );
  }
  return $thumbnail;
}

/*
Theme Setup
-------------------------------------
*/

add_action( 'wp_enqueue_scripts', 'custom_scripts' );
add_action( 'init', 'custom_styles' );
add_action( 'init', 'custom_menus' );
add_action( 'after_setup_theme', 'custom_logo' );
add_action( 'login_head', 'custom_login_logo' );
add_action( 'login_head', 'custom_login_logo_url' );

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
  add_theme_support( 'woocommerce' );
}

add_filter( 'excerpt_length', 'custom_excerptlength' );
add_filter( 'excerpt_more', 'custom_excerptmore' );
add_filter( 'upload_mimes', 'custom_mime' );

/*
Remove support for Emojis
-------------------------------------
*/

add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

function disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

    $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }
  return $urls;
}

/*
Require authentication for all REST API requests to stop data being leaked
-------------------------------------
*/

add_filter( 'rest_authentication_errors', function( $result ) {
	if ( ! empty( $result ) ) {
		return $result;
	}
	if ( ! is_user_logged_in() ) {
		return new WP_Error( 'rest_not_logged_in', 'Only authenticated users can access the REST API.', array( 'status' => 401 ) );
	}
	return $result;
});