<?php
function search_product() {
  $answer = random_int(0, 20);

  $phrase = $answer > 10 ? "Pas de produits contenant les mots clefs" : random_bytes(42);

  echo '<li>'.$phrase.'</li>';

  die();
}

add_action( "wp_ajax_search_product", 'search_product' );
add_action( "wp_ajax_nopriv_search_product", 'search_product' );