<?php get_header(); ?>
  <div class="container-grid" id="product-archive">
    <div class="section-container">
      <div class="top-title">
        <h2>Tous nos produits de saison</h2>
      </div>
      <?php $args = array( 'post_type' => 'product' ); ?>
      <!-- <--?php get_template_part("parts/products/10-products-grid") ?> -->
      <?php include( locate_template( "parts/products/10-products-grid.php", false, false ) ); ?>
    </div>
  </div>
<?php get_footer(); ?>