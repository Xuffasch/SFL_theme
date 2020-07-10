<!-- This template is called by woocommerce shortcode [products] to display products. It should be placed in a woocommerce folder inside any theme to override the content-product.php template default template provided by the woocommerce plugin.

Check https://docs.woocommerce.com/wc-apidocs/source-class-WC_Shortcode_Products.html for detail implementation of [products]
-->

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
  <?php if ( !is_front_page() ) { ?>  
    <div class="quantifier" id="<?php echo $product_id; ?>">
      <button class="grid-item less" id="<?php echo $product_id; ?>"> - </button>
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
      <h1 class="grid-item counter counter-<?php echo $product_id; ?>" id="<?php echo $cart_item_id; ?>"><?php echo $product_qty; ?></h1>
      <button class="grid-item more" id="<?php echo $product_id; ?>"> + </button>
    </div>
  <?php } ?>
</li>