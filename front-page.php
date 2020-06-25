<?php get_header(); ?>
  <div class="img-background" id="img-background">
    <?php get_template_part('parts/0-landing-video') ?>
    <?php get_template_part('parts/10-services') ?>
    <?php get_template_part('parts/20-products') ?>
    <?php get_template_part('parts/30-hours') ?>
    <?php get_template_part('parts/99-legal') ?>
  </div>
  <!-- <script>
    window.onload = window.onresize = function () {
      console.log("onsize is used");
      console.log("window width : " + window.innerWidth);
      console.log("window height : " + window.innerHeight);
      
      let video = document.getElementById("main-video");  
      let width = 24;
      let height = 12;

      width = window.innerWidth < 768 ? parseInt(window.innerWidth * .74) : 530;
      height = window.innerWidth < 768 ? parseInt(width * 315 / 560) : 315;

      console.log("new video width : " + width);
      console.log("new video height : " + height);

      video.style.width = width + "px";
      video.style.height = height + "px";

      console.log("video width : " + video.style.width);
      console.log("video height : " + video.style.height);
    }
  </script> -->
<?php get_footer(); ?>