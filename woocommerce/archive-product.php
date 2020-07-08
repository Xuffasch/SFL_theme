<?php get_header(); ?>
  <div class="container-grid" id="product-archive">
    <!-- <div class="section-container">
      <div class="top-title">
        <h2>Tous nos produits de saison</h2>
      </div>
      <div id="allproducts-messages">
        <h1 id="messages">Faites votre panier</h1>
      </div>
      <--?php $args = array( 'post_type' => 'product', 
                           'limit' => 3 ); ?>
      <--?php include( locate_template( "parts/products/10-products-grid.php", false, false ) ); ?>
    </div> -->
    <?php echo do_shortcode('[products limit="7" columns="3" paginate="true"]'); ?>
  </div>
<?php get_footer(); ?>