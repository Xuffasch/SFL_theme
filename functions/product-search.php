<?php
function search_product() {
  // $answer = random_int(0, 20);

  // $phrase = $answer > 10 ? "Pas de produits contenant les mots clefs" : random_bytes(42);

  // echo '<li>'.$phrase.'</li>';

  global $wpdb, $woocommerce;

  $keyword = $_POST['keyword'];

  $queryStr = "SELECT DISTINCT $wpdb->posts.*
  FROM $wpdb->posts, $wpdb->postmeta
  WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id
  AND $wpdb->posts.post_status = 'publish'
  AND $wpdb->posts.post_type = 'product'
  AND (
    ($wpdb->posts.post_title LIKE '%{$keyword}%')
    OR
    ($wpdb->posts.post_content LIKE '%{$keyword}%')
  )
  ORDER BY $wpdb->posts.post_date DESC";

  $queryResult = $wpdb->get_results($queryStr);
  
  $output = "<li>Pas de produit avec le(s) mot(s)-clef : ".$keyword.'</li>';
  if ( !empty($queryResult) ) {
    $output = '';

    foreach ($queryResult as $result) {
      $output .= '<li>';
        $output .= '<div class="product-data">';
          $output .= '<h3>'.$result->post_title.'</h3>';
        $output .= '</div>';
      $output .= '</li>';
    }
  }

  echo $output;

  die();
}

add_action( "wp_ajax_search_product", 'search_product' );
add_action( "wp_ajax_nopriv_search_product", 'search_product' );