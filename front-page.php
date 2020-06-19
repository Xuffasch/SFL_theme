<?php get_header(); ?>
  <section class="img-top-screen" id="top-screen">
    <div class="horizontal">
      <div class="img-top-screen-content">
        <h2>SFL Distribution vous livre en Ile-de-France</h2>
        <h3>du Lundi au Samedi de 7h à 19h30</h3>
      </div>
      <iframe width=560 height=315 src="https://www.youtube.com/embed/JRQ-w0VqFek" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="main-video">
      </iframe>
    </div>
  </section>
  <section class="section-container" id="section-1">
    <div class="section-position" id="section-position-1"></div>
    <h1>
      <a href="#section-position-1">Nos services - nos engagements</a>
    </h1>

  </section>
  <section class="section-container" id="section-2">
    <div class="section-position" id="section-position-2"></div>
    <h1>
      <a href="#section-position-2">Nos produits</a>
    </h1>

    <button id="to-top">
       <a href="#top-screen">&#x21E7;</a>
     </button>
  </section>
  <footer class="footer-container">
    <div class="footer-content">
      <h3 class="footer-header">Tous les droits de reproduction réservés à SFL Distribution</h3>
    </div>
  </footer>
  <!-- Resize the video when the window resizes 
        1) mobile portrait landscape
        2) desktop browser
  --> 
  <!-- <script>
    window.onresize = function () {
      if (window.screen.width < 1024) {
        console.log("onsize is used");
        let video = document.getElementById("main-video");
        let height = video.width * 315 / 560;
        video.setAttribute("style", "height:" + height + "px");
      }
    }
  </script> -->
<?php get_footer(); ?>