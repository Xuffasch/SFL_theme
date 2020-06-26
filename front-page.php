<?php get_header(); ?>
  <?php get_template_part('parts/0-landing-video') ?>
  <?php get_template_part('parts/10-services') ?>
  <?php get_template_part('parts/20-products') ?>
  <?php get_template_part('parts/30-hours') ?>
  <?php get_template_part('parts/99-legal') ?>
  <script>
    window.onload = window.onresize = function() {
      let nav = document.getElementsByTagName("nav")[0];
      let navH = nav.offsetHeight;

      let landing = document.getElementById("landing");
      landing.style.paddingBottom = navH + "px";
      landing.style.paddingTop = navH + "px";
    };
  </script>
<?php get_footer(); ?>