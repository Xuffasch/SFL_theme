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
    <div class="section-container">
      <div class="top-bar">
        <div class="grid-item top-title">
          <h1 class="title">Tous nos produits de saison</h1>
        </div>
        <button class="grid-item search" id="btn-search"></button>
      </div>
      <div class="messages">
        <div id="messages">
          <h1>Faites votre panier</h1>
        </div>
        <div id="search-box" class="invisible">
          <h1>Entrer nom ou mot-clef</h1>
        </div> 
      </div>
      <?php echo do_shortcode('[products limit="7" columns="2" paginate="true"]'); ?>
    </div>
  </div>
<?php get_footer(); ?>