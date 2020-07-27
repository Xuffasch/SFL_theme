<?php
function update_cart() {
  $cart_item_id = $_REQUEST["cart_item_id"];
  if ( $cart_item_id == "" ) {
    WC()->cart->add_to_cart($_REQUEST["product_id"], $_REQUEST["new_quantity"]);
    $item_keys = array_keys(WC()->cart->get_cart());
    $cart_item_id = end($item_keys);
  } else {
    WC()->cart->set_quantity( $cart_item_id, $_REQUEST["new_quantity"] );
  }

  $cart_item = WC()->cart->get_cart_item($cart_item_id);
  $newQty = $cart_item["quantity"];
  $cart_count = WC()->cart->get_cart_contents_count();

  $ok = array( 
    'success' => "New quantity for ".$cart_item['data']->get_title()." : ".$newQty, 
    'productId' => $_REQUEST["product_id"], 
    'itemId' => $cart_item_id, 
    'newQty' => $newQty,
    'cart_counter' => $cart_count
  );

  wp_send_json_success($ok);

  wp_die();
}

add_action( "wp_ajax_update_quantity", 'update_cart' );
add_action( "wp_ajax_nopriv_update_quantity", 'update_cart' );