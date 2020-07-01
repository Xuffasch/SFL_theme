<div class="content-container" id="services">
  <section class="section-container" id="section-services">
    <div class="section-position" id="position-services"></div>
    <div class="section-header">
      <h1 class="flex-item section-title" id="services">
        <a href="#position-services" class="mobile">Programmer le date ou la régularité de vos commandes</a>
        <a href="#position-services" class="desktop">En magasin ou depuis chez vous, votre mode de réglement et de livraison</a>
      </h1>
      <div class="flex-item order">
          <button id="services-btn-order">Commander</button>
      </div>
    </div>
    <div class="services-icons">
      <div class="grid-icons">
        <div class="service-type" id="payment">
          <img src="<?php echo get_template_directory_uri(); ?>/images/horizontal-line.svg" alt="">
          <h3> Paiement </h3>
          <img src="<?php echo get_template_directory_uri(); ?>/images/horizontal-line.svg" alt="">
        </div>
        <?php get_template_part("/parts/9-payment-logo" ) ?>
      </div>
      <div class="grid-icons">
        <div class="service-type" id="delivery">
          <img src="<?php echo get_template_directory_uri(); ?>/images/horizontal-line.svg" alt="">
          <h3> Livraison </h3>
          <img src="<?php echo get_template_directory_uri(); ?>/images/horizontal-line.svg" alt="">
        </div>
        <?php get_template_part("/parts/8-delivery-logo" ) ?>
      </div>
    </div>  
  </section>
</div>

