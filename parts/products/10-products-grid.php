<div class="product-grid">
  <?php 
    $products = wc_get_products( $args );
    if ( $products ) {?>
      <?php foreach ($products as $prd) { ?>
        <div class="product <?php echo $prd->get_slug(); ?>">
          <?php 
            $post_id = $prd->get_id();
            $name = $prd->get_name();
            $slug = $prd->get_slug();
            $img_url = wp_get_attachment_image_src( 
              get_post_thumbnail_id( $post_id ),
              'single-post-thumbnail'
            );
          ?>
          <img src="<?php echo $img_url[0]; ?>" alt="<?php echo $name; ?>">
          <h3 class="product-name"><?php echo $name; ?></h3>
          <h3 class="product-id"><?php echo $post_id; ?><h3>
          <div class="quantifier" id="<?php echo $post_id; ?>">
            <button class="less" id="<?php echo $post_id ?>"><h1> - </h1></button>
            <?php 
              $cart_item_id = "";
              $product_qty = 0;
              foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) : {
                if ( $post_id == $cart_item["data"]->get_id() ) {
                  $cart_item_id = $cart_item_key;
                  $product_qty = $cart_item["quantity"];
                  break;
                } 
              }
            endforeach;
            ?>
            <h1 class="counter-<?php echo $post_id; ?>" id="<?php echo $cart_item_id; ?>"><?php echo $product_qty; ?></h1>
            <button class="more" id="<?php echo $post_id; ?>"><h1> + </h1></button>
          </div>
          <h1 style="padding: 8px"><?php echo $cart_item_id; ?></h1>
        </div>
  <?php }
    }
  ?>
</div>

