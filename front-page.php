<?php get_header(); ?>
  <section class="img-top-screen">
    <div class="horizontal">
      <div class="img-top-screen-content">
        <h2>SFL Distribution vous livre en Ile-de-France</h2>
        <h3>du Lundi au Samedi de 7h à 19h30</h3>
      </div>
    </div>
  </section>
  <section class="section-container" id="section-1">
    <div class="section-position" id="section-position-1"></div>
    <h1>Nos services - nos engagements</h1>
    
    <button class="section-button arrow" id="next-section">
      <a href="#section-position-1">&#x21E7;</a>
    </button>
  
  </section>
  <section class="section-container" id="section-2">
    <div class="section-position" id="section-position-2"></div>
    <h1>Nos produits</h1>

    <!-- <a href="#section-position-2" class="next-section">
      <div class="arrow">&#x21E7;</div>   
    </a> -->
    <button class="section-button arrow" id="next-section">
      <a href="#section-position-2">&#x21E7;</a>
    </button>
    
  </section>
  <footer class="footer-container">
    <div class="footer-content">
      <h3 class="footer-header">Tous les droits de reproduction réservés à SFL Distribution</h3>
    </div>
  </footer>
  <script>
    let threshold = window.screen.height * 0.4;
    function navButtonsDisplay() {
      let navBtns = document.getElementsByClassName("arrow");
      Array.from(navBtns).map(btn => {
        let isHidden = btn.classList.contains("hide-button");
        let isAboveT = btn.getBoundingClientRect().y < threshold;

        if (!isHidden && isAboveT || isHidden && !isAboveT) {
          btn.classList.toggle("hide-button");
        }
        return btn;
      })
    }

    // window.onscroll = function() {
    //   let midScreen = window.screen.height / 2;
    //   let navButton = document.getElementById("next-section");
    //   let navButtonIsHidden = navButton.classList.contains("hide-button");
    //   let navButtonIsAboveMid = navButton.getBoundingClientRect().y < midScreen;
    //   let toHide = !navButtonIsHidden && navButtonIsAboveMid;
    //   let toDisplay = navButtonIsHidden && !navButtonIsAboveMid;

    //   if ( toHide || toDisplay ) {
    //     console.log(toHide ? "will hide" : toDisplay ? "will Display" : "do nothing")
    //     navButton.classList.toggle("hide-button");
    //   } 
    // }

    window.onscroll = navButtonsDisplay;
    window.onresize = navButtonsDisplay;
  </script>
<?php get_footer(); ?>