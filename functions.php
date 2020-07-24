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

    /** Remove add to cart button to product archive grid */
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
  }
endif;
add_action( 'after_setup_theme' , 'sfl_setup' );

/** Declare default post thumbnail image sizes */
set_post_thumbnail_size(960, 720, true);

/** Define other named sizes for thumbnail image */
add_image_size('medium', 720, 0, false);
add_image_size('square', 480, 0, false);
add_image_size('smallSquareOne', 240, 0, false);

add_action("wp_ajax_add_one_quantity", "update_cart");
add_action("wp_ajax_nopriv_add_one_quantity", "update_cart");

add_action("wp_ajax_remove_one_quantity", "update_cart");
add_action("wp_ajax_nopriv_remove_one_quantity", "update_cart");

require_once( get_template_directory().'/functions/update-cart.php');

/** Include style.css file to pages. The array could contain other css files style could depend on and should be downloaded before style.css */
function sfl_scripts_and_styles() {
  $template_folder = get_template_directory_uri();

  wp_enqueue_style( 'style', get_stylesheet_uri(), array() );
  wp_enqueue_style( 'nav', get_stylesheet_directory_uri().'/css/0-nav-v2.css', array('style'));
  wp_enqueue_style( 'legal', get_stylesheet_directory_uri().'/css/99-legal.css', array('style') ); 

  wp_enqueue_script( "menu-button", $template_folder."/js/menu-button.js", array("jquery"), '1.0', true );

  wp_localize_script( 
    'menu-button', 
    'currentState', 
    array( 'logged' => is_user_logged_in() ),
    array( 'jquery' )
  );

  if ( is_front_page() ) {
    wp_enqueue_style( 'landing-video-v2', $template_folder.'/css/0-landing-video-v2.css', array('style') );
    wp_enqueue_style( 'services', $template_folder.'/css/10-services.css', array('style') );
    wp_enqueue_style( 'products', $template_folder.'/css/20-products.css', array('style') );
    wp_enqueue_style( 'hours', $template_folder.'/css/30-hours.css', array('style') );
    wp_enqueue_style( 'payment-logo', $template_folder.'/css/9-payment-logo.css', array('style') );
    wp_enqueue_style( 'delivery-logo', $template_folder.'/css/8-delivery-logo.css', array('style') );
    wp_enqueue_script( 'front-scrolling', $template_folder."/js/front-scrolling.js", array("jquery"), '1.0', true);
  }

  if (is_tax() || is_post_type_archive( "product" )) {
    wp_enqueue_style( 'products-pages', $template_folder.'/css/products/10-products-wc-grid.css', array('style') );

    wp_enqueue_script( "quantifier", $template_folder."/js/products-quantifier.js", array("jquery"), '1.0', true );

    // Declare the variable ajaxurl to be called in products-quantifier.js to retrieve the url to send the ajax request 
    wp_localize_script( 
      "quantifier", 
      'helper', 
      array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'logginState' => is_user_logged_in(),
      ),
      array('jquery')
    ); 

    wp_enqueue_script( "search", $template_folder."/js/search.js", array("jquery"));

    wp_localize_script( 
      "search", 
      "compagnons", 
      array( 
        'template_url' => $template_folder,
        'ajaxurl' => admin_url('admin-ajax.php'),
        'whois' => wp_create_nonce( 'productsearch' )
     ),
      array("jquery"));
  }

  if ( is_account_page() ) {
    wp_enqueue_style( 'account', $template_folder.'/css/account/account.css', array('style') );
  }

  if ( is_cart() ) {
    wp_enqueue_style( 'cart', $template_folder.'/css/cart/cart.css', array('style') );
  }

}
add_action( 'wp_enqueue_scripts', 'sfl_scripts_and_styles' );

/** Declare menus names */
require_once( get_template_directory().'/inc/menus.php' );

/** Declare sidebars names */
require_once( get_template_directory().'/inc/sidebars.php' );

require_once( get_template_directory().'/functions/product-search.php');

require_once( get_template_directory().'/functions/custom-primary-menu.php');
