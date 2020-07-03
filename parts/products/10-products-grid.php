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
          <div class="quantifier">
            <button class="less" id="<?php echo $slug ?>" onClick="Remove(event)"><h1> - </h1></button>
            <h1 class="counter" id="counter-<?php echo $slug ?>">0</h1>
            <button class="more" id="<?php echo $slug ?>" onClick="Add(event)"><h1> + </h1></button>
          </div>
        </div>
  <?php }
    }
  ?>
</div>

