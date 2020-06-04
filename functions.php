<?php
/**
 * Wordpress theme "SFL_Theme" for SFL Distribution
 */
if ( ! function_exists( 'sfl_setup' ) ) :
  function sfl_setup() {
    /**
     * Add default support
    */
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus ');
  }
endif;
add_action( 'after_theme_setup' , 'sfl_setup' );

function sfl_scripts_and_styles() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'sfl_scripts_and_styles' );

/**
 * Create the main menu
 */
require_once( get_template_directory().'/inc/menus.php' );