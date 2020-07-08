<?php 
global $product;

if ( empty( $product ) || !$product->is_visible() ) {
  return;
}
?>
<li class="product <?php echo $product->get_slug(); ?>" >
  <?php
    do_action( 'woocommerce_before_shop_loop_item' );

    do_action( 'woocommerce_before_shop_loop_item_title' );

    do_action( 'woocommerce_shop_loop_item_title' );

    do_action( 'woocommerce_after_shop_loop_item_title' );

    do_action( 'woocommerce_after_shop_loop_item' );
    $product_id = $product->get_id();
  ?>
  <div class="quantifier" id="<?php echo $product_id; ?>">
    <button class="less" id="<?php echo $product_id; ?>"><h1> - </h1></button>
    <?php 
        $cart_item_id = "";
        $product_qty = 0;
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) : {
          if ( $product_id == $cart_item["data"]->get_id() ) {
            $cart_item_id = $cart_item_key;
            $product_qty = $cart_item["quantity"];
            break;
          } 
        }
        endforeach;
    ?>
    <h1 class="counter-<?php echo $product_id; ?>" id="<?php echo $cart_item_id; ?>"><?php echo $product_qty; ?></h1>
    <button class="more" id="<?php echo $product_id; ?>"><h1> + </h1></button>
  </div>
</li>