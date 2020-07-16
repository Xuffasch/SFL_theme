<?php
function search_product() {
  global $wpdb, $woocommerce;

  check_ajax_referer( "productsearch", 'search_nonce' );

  $keyword = $_POST['keyword'];
  $sane_keyword = sanitize_text_field( $keyword );
  echo "Sanitized word : ".sanitize_text_field($sane_keyword);
  $output = "<li>Pas de produit avec le(s) mot(s)-clef : ".$sane_keyword.'</li>';

  if ($sane_keyword != "") {

    $queryStr = "SELECT DISTINCT $wpdb->posts.*
    FROM $wpdb->posts
    WHERE $wpdb->posts.post_status = 'publish'
    AND $wpdb->posts.post_type = 'product'
    AND (
      $wpdb->posts.post_title LIKE '%{$sane_keyword}%'
    )
    ORDER BY $wpdb->posts.post_date DESC";

    $queryResult = $wpdb->get_results($queryStr);

    $queryStr2 = "SELECT DISTINCT $wpdb->posts.*
    FROM $wpdb->posts
    WHERE $wpdb->posts.post_title LIKE %s
    AND $wpdb->posts.post_type = 'product'
    AND $wpdb->posts.post_status = 'publish'
    ORDER BY $wpdb->posts.post_date DESC";

    $like = '%';
    $like_str = $like.$wpdb->esc_like( $sane_keyword ).$like;

    $queryResult2 = $wpdb->get_results( $wpdb->prepare(
      $queryStr2,
      $like_str
    ));
  

    if ( !empty($queryResult) ) {
      $output = '';
      foreach ($queryResult as $result) {
        $output .= '<li>';
          $output .= '<div class="product-image">';
            $output .= '<img src="'.esc_url(get_the_post_thumbnail_url($result->ID, 'thumbnail')).'">';
          $output .= '</div>';
          $output .= '<div class="product-data">';
            $output .= '<h3>'.$result->post_title.'</h3>';
          $output .= '</div>';
        $output .= '</li>';
      }
    }
  } 

  $allowed = array (
    'li' => array(),
    'div' => array( 'class' => array() ),
    // 'img' => array( 'src' => array() )
  );
  $cleared_output = wp_kses($output, $allowed);

  echo $cleared_output;

  die();
}

add_action( "wp_ajax_search_product", 'search_product' );
add_action( "wp_ajax_nopriv_search_product", 'search_product' );