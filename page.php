<?php get_header("v2"); ?>
  <div class="container-grid">
    <?php while ( have_posts() ) : the_post(); ?>
      
      <div class="page-title">
        <?php 
          if ( is_account_page() ) {
            if ( !is_user_logged_in() ) {  
              echo "Connectez vous";
            } 
          } else {
            the_title();
          }
        ?>
      </div>
      
      <?php the_content();

    endwhile;  
    ?>
  </div>
<?php get_footer(); ?>



