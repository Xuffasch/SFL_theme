<?php get_header(); ?>
  <div class="img-background" id="img-background">
    <?php get_template_part('parts/0-landing-video')?>
  </div>
  <!-- <section class="img-top-screen" id="top-screen">
    <div class="horizontal">
      <div class="img-top-screen-title">
        <h2>Livraison en Ile-de-France</h2>
        <h3>du Lundi au Samedi de 7h à 19h30</h3>
      </div>
      <iframe src="https://www.youtube.com/embed/JRQ-w0VqFek" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="main-video">
      </iframe>
    </div>
  </section>
  <section class="section-container" id="section-1">
    <div class="section-position" id="section-position-1"></div>
    <h1>
      <a href="#section-position-1">Nos services - nos engagements</a>
    </h1>
    <div class="services-articles">
      <article id="article-1">
        <h1>Selectionner</h1>
        <p>Choisissez les produits dont nous vous assurons l'approvisionnement une fois commandée</p>
      </article>
      <article id="article-2">
        <h1>Programmer</h1>
        <p>Tôt le matin, tous les lundis, en début de soirée</p>
      </article>
      <article id="article-3">
        <h1>Cuisiner</h1>
        <p>Pour ça on ne sait pas faire ! A vous de jouer...</p>
      </article>
    </div>
    <div class="services-articles-titles">
      <div id="title-1">
        <img src="<--?php echo get_template_directory_uri(); ?>/images/vegetable.svg" alt="selectionner" class="article-img">
      </div>
      <div id="title-2">
        <img src="<--?php echo get_template_directory_uri(); ?>/images/calendar2.svg" alt="selectionner" class="article-img">
      </div>
      <div id="title-3">
        <img src="<--?php echo get_template_directory_uri(); ?>/images/cooking2.svg" alt="selectionner" class="article-img">
      </div>
    </div>
  </section>
  <section class="section-container" id="section-2">
    <div class="section-position" id="section-position-2"></div>
    <h1>
      <a href="#section-position-2">Produits récents</a>
    </h1>

    <button id="to-top">
       <a href="#top-screen">&#x21E7;</a>
     </button>
  </section>
  <footer class="footer-container">
    <div class="footer-content">
      <h3 class="footer-header">Tous les droits de reproduction réservés à SFL Distribution</h3>
    </div>
  </footer> -->
  <!-- Resize the video when the window resizes 
        1) mobile portrait landscape
        2) desktop browser
  --> 
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