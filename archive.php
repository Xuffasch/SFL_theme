<?php get_header("v2"); ?>
  <div class="container-grid" id="products-type">
    <div class="section-container">
      <div class="top-bar">
        <div class="grid-item top-title">
          <h1 class='title'>
          <?php
            $start_message = ( is_tax() ) ? single_term_title( "Liste de ", true ) : "Tous les produits de saison";
            echo $start_message; 
          ?>
          </h1>
          <h1 class="search-title">
            Recherche Produit
          </h1>
        </div>
        <button class="grid-item search" id="btn-search">
          <?php echo file_get_contents( get_template_directory()."/images/search.svg"); ?>
        </button>
      </div>
      <div class="messages">
        <div id="messages">
          <h1>Faites votre panier</h1>
        </div>
        <div id="search-box" class="invisible">
          <?php get_search_form(); ?>
        </div> 
      </div>
      <div class="results">
        <?php
          if ( isset($_GET["product_cat"]) ) {
            echo do_shortcode('[products limit="7" columns="2" paginate="true" category='.$_GET["product_cat"].']');
          } else {
            echo do_shortcode('[products limit="7" columns="2" paginate="true"]');
          }
        ?>
        <!-- <--?php echo do_shortcode('[products limit="7" columns="2" paginate="true" category='.$_GET["product_cat"].']'); ?> -->
        <div class="results-search invisible">
          <div id="loading" class="invisible">
            <?php echo file_get_contents( get_template_directory()."/images/refresh.svg"); ?>
            <h1>Recherche parmi les produits...</h1>
          </div>
          <div class="search-list">
          </div>
        </div>
      </div>
    </div>

<?php get_footer(); ?>
