<?php
/**
 * Wordpress theme "SFL_Theme" for SFL Distribution
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes( 'charset' ); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( '|', true, 'right' ); ?> </title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> >
    <header class="site-header">
      <h1>
        <a href="<?php echo home_url(); ?>">
          SFL Distribution
        </a>
      </h1>
    </header>
