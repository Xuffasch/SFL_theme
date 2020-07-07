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
add_action( 'after_setup_theme' , 'sfl_setup' );

/** Declare default post thumbnail image sizes */
set_post_thumbnail_size(960, 720, true);

/** Define other named sizes for thumbnail image */
add_image_size('medium', 720, 0, false);
add_image_size('square', 480, 0, false);

add_action("wp_ajax_add_one_quantity", "add_one");
add_action("wp_ajax_nopriv_add_one_quantity", "add_one");

function add_one() {
  $item_id = "";
  $cart_item_id = $_REQUEST["cart_item_id"];
  if ( $cart_item_id == "" ) {
    $product_id = $_REQUEST["product_id"];
    WC()->cart->add_to_cart($product_id, 1);
    $items = WC()->cart->get_cart();
    $item_keys = array_keys($items);
    $item_id = end($item_keys);
  } else {
    WC()->cart->set_quantity( $cart_item_id, $_REQUEST["new_quantity"] );
    $item_id = $cart_item_id;
  }

  $cart_item = WC()->cart->get_cart_item($item_id);
  $newQty = $cart_item["quantity"];

  $ok = array( 'success' => "Add quantity is done", 'productId' => $_REQUEST["product_id"], 'itemId' => $item_id, 'newQty' => $newQty );

  $ko = array( 'failure' => "Add quantity did not work");

  wp_send_json_success($ok);

  wp_die();
}

add_action("wp_ajax_remove_one_quantity", "remove_one");
add_action("wp_ajax_nopriv_remove_one_quantity", "remove_one");

function remove_one() {
  $product_id = $_REQUEST["cart_item_id"];

  $newQty = 0;
  $items = WC()->cart->get_cart();
  foreach($items as $item => $values) {
    $newQty = $values["quantity"];
  }

  if ( $newQty > 0 ) {
    $cart->add_to_cart($product_id, -1);
    $items = WC()->cart->get_cart_items();
    foreach($items as $item => $values) {
      $newQty = $values["quantity"];
    }
  
    $ok = array( 'success' => "Decrease quantity is done", 'newQty' => $newQty);
  
    $ko = array( 'failure' => "Decrease quantity did not work", 'oldQty' => 4);
  
    wp_send_json_success($ok);
    wp_send_json_error($ko);
  } 

  wp_die();
}

/** Include style.css file to pages. The array could contain other css files style could depend on and should be downloaded before style.css */
function sfl_scripts_and_styles() {
  $template_folder = get_template_directory_uri();

  wp_enqueue_style( 'style', get_stylesheet_uri(), array() );
  wp_enqueue_style( 'nav', get_stylesheet_directory_uri().'/css/0-nav.css', array('style'));
  wp_enqueue_style( 'legal', get_stylesheet_directory_uri().'/css/99-legal.css', array('style') ); 

  if ( is_front_page() ) {
    wp_enqueue_style( 'landing-video', $template_folder.'/css/0-landing-video.css', array('style') );
    wp_enqueue_style( 'services', $template_folder.'/css/10-services.css', array('style') );
    wp_enqueue_style( 'products', $template_folder.'/css/20-products.css', array('style') );
    wp_enqueue_style( 'hours', $template_folder.'/css/30-hours.css', array('style') );
    wp_enqueue_style( 'payment-logo', $template_folder.'/css/9-payment-logo.css', array('style') );
    wp_enqueue_style( 'delivery-logo', $template_folder.'/css/8-delivery-logo.css', array('style') );
  }

  if (is_tax() || is_post_type_archive( "product" )) {
    wp_enqueue_style( 'products-pages', $template_folder.'/css/products/10-products-grid.css', array('style') );

    wp_enqueue_script( "quantifier", $template_folder."/js/products-quantifier.js", array("jquery"), '1.0', true );

    // localize the script to your domain name, so that you can reference the url to admin-ajax.php file easily
    wp_localize_script( "quantifier", 'ajaxurl', admin_url( 'admin-ajax.php' ));   
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

