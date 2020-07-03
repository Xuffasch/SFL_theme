<div class="product-grid">
  <?php 
    $products = wc_get_products( $args );
    if ( $products ) {?>
      <?php foreach ($products as $prd) { ?>
        <div class="product">
          <h3><?php echo $prd->get_name(); ?></h3>
          <h4><?php echo $prd->get_slug(); ?></h4>
          <h4><?php echo $prd->get_description(); ?></h4>
          <?php 
            $post_id = $prd->get_id();
            $img_url = wp_get_attachment_image_src( 
              get_post_thumbnail_id( $post_id ),
              'single-post-thumbnail'
            );
          ?>
          <img src="<?php echo $img_url[0]; ?>" 
            alt="<?php echo $prd->get_name() ?>">
        </div>
  <?php }
    }
  ?>
</div>

