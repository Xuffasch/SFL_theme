<?php get_header(); ?>
  <div class="container-grid" id="products-type">
    <!-- <div class="section-container">
      <div class="top-title">
        <h1><--?php single_term_title( "Liste de ", true ); ?></h1>
      </div> 
      <--?php 
        $terms = get_queried_object();
        $termID = $terms->slug;

        $args = array(
                  'post_type' => 'product',
                  'product_cat' => $termID,
                  'limit' => 3
                );?>
      <div class="messages">
        <h1 id="messages">Faites votre panier</h1>
      </div>
      <--?php include( locate_template( "parts/products/10-products-grid.php", false, false ) ); ?>
    </div> -->
    <div class="section-container">
      <div class="top-title">
        <h1><?php single_term_title( "Liste de ", true ); ?></h1>
      </div>
      <div class="messages">
        <h1 id="messages">Faites votre panier</h1>
      </div>
      <?php echo do_shortcode('[products limit="7" columns="2" paginate="true"]'); ?>
    </div>

<?php get_footer(); ?>