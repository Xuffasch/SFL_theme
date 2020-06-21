<?php
/**
 * Wordpress theme "SFL_Theme" for SFL Distribution
 */
if ( ! function_exists( 'sfl_setup' ) ) :
  function sfl_setup() {
    add_theme_support( 'automatic-feed-links' );
    
    /** Add post thumbnail management in admin */
    add_theme_support( 'post-thumbnails' );
    /** Add menus management in admin */
    add_theme_support( 'menus' );
    /** Add automatic creation of title tag in the page <head> */
    add_theme_support( 'title-tag' );
    /** Add woocommerce functions. Without it woocom. Product custom post type is not recongnized and connected to template files */
    add_theme_support( 'woocommerce' );
  }
endif;
add_action( 'after_theme_setup' , 'sfl_setup' );

/** Declare default post thumbnail image sizes */
set_post_thumbnail_size(960, 720, true);

/** Define other named sizes for thumbnail image */
add_image_size('medium', 720, 0, false);
add_image_size('square', 480, 0, false);

/** Include style.css file to pages. The array could contain other css files style could depend on and should be downloaded before style.css */
function sfl_scripts_and_styles() {
  wp_enqueue_style( 'style', get_stylesheet_uri(), array() );
  wp_enqueue_style( 'nav', get_stylesheet_directory_uri().'/css/0-nav.css', array('style'));

  if ( is_front_page() ) {
    wp_enqueue_style( 'img_top', get_template_directory_uri().'/css/1-img-top.css', array('style') );
    wp_enqueue_style( 'sections', get_template_directory_uri().'/css/front-sections.css', array('style') );
    wp_enqueue_style( 'front', get_template_directory_uri().'/css/20-services.css', array('style') );
  }
}
add_action( 'wp_enqueue_scripts', 'sfl_scripts_and_styles' );

/** Declare menus names */
require_once( get_template_directory().'/inc/menus.php' );

/** Declare sidebars names */
require_once( get_template_directory().'/inc/sidebars.php' );

