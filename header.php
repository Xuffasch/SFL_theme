<?php
/**
 * Wordpress theme "SFL_Theme" for SFL Distribution
 */
?>
<!DOCTYPE html>
<!-- Add the language attribute such as fr-FR -->
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <!-- Initially, the page will use the width of the device, the zoom is equal to 1, and in Safari, will not shrink elements to display those which are off-screen -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- no <title> tag to write as it is taken care of by title-tag in functions.php -->
    <meta name="description" content="Theme for SFL Distribution using woocommerce"/>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> >
      <header class=header-container>
        <nav class="nav-container" id="navBar">
          <!-- 1. Site logo - anchor to home page -->
          <div class="logo-container">
            <a href="<?php echo home_url('/'); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/fruits_logo.svg" alt="Logo" class="site-logo">
            </a>
          </div>
          <!-- 2. Site title -->
          <h1 class="site-title">SFL Distribution</h1>
          <!-- 3. Menu button for mobile navigation -->
          <div class="btn-container">
            <button class="menu-button" id="menu-button">
              <div class="bar1"></div>
              <div class="bar2"></div>
              <div class="bar3"></div> 
            </button>
          </div>
          <!-- 4. Site principal navigation menu -->
          <?php wp_nav_menu( array(
            'theme_location' => 'primary',
            'container_class' => 'menu-container'));
          ?>
        </nav>
      </header>

      <!-- Hook to indicate the opening of the <body> tag -->
      <?php wp_body_open() ?>

