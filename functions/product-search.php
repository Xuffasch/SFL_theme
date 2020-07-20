<?php
function search_product() {
  global $wpdb, $woocommerce;

  check_ajax_referer( "productsearch", 'search_nonce' );

  $keyword = $_POST['keyword'];
  $sane_keyword = sanitize_text_field( $keyword );

  $output = '<li>Pas de produit trouvé avec le(s) mot(s)-clef utilisé(s)</li>';
  if ($sane_keyword != "") {
    $queryStr2 = "SELECT DISTINCT $wpdb->posts.*
    FROM $wpdb->posts
    WHERE $wpdb->posts.post_title LIKE %s
    AND $wpdb->posts.post_type = 'product'
    AND $wpdb->posts.post_status = 'publish'
    ORDER BY $wpdb->posts.post_date DESC";

    $like_str = '%'.$wpdb->esc_like( $sane_keyword ).'%';

    $queryResult2 = $wpdb->get_results( $wpdb->prepare(
      $queryStr2,
      $like_str
    ));

    if ( !empty($queryResult2) ) {
      $output = '';
      foreach ($queryResult2 as $result) {
        $price = get_post_meta($result->ID, '_regular_price');

        $output .= '<li class="search-item">';
          $output .= '<div class="product-image">';
            $output .= '<img src="'.esc_url(get_the_post_thumbnail_url($result->ID, 'smallSquareOne')).'"></div>';

          $output .= '<div class="product-data">';
            $output .= '<h2>'.$result->post_title.'</h2></div>';
          $output .= '<div class="product-price">';
            $output .= '<h3>'.$price[0].'</h3></div>'; 
          $output .= '<div class="quantifier" id="'.$result->ID.'">';
            $output .= '<button class="grid-item less" id="'.$result->ID.'"></button>';
            $cart_item_id = "";
            $product_qty = 0;
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) : {
              if ( $result->ID == $cart_item["data"]->get_id() ) {
                $cart_item_id = $cart_item_key;
                $product_qty = $cart_item["quantity"];
              break;
              }
            }
            endforeach;
            $output .= '<h1 class="grid-item counter counter-'.$result->ID.' result-item" id="'.$cart_item_id.'">'.$product_qty.'</h1>';
            $output .= '<button class="grid-item more" id="'.$result->ID.'"></button>';
          $output .= '</div>';
        $output .= '</li>';
      }
    }
  } 

  $allowed = array (
    'li' => array( 'class' => array() ),
    'div' => array( 'class' => array() ),
    'img' => array( 'src' => array(), 'class' => array() ),
    'button' => array( 'class' => array(), 'id' => array() ),
    'h1' => array( 'class' => array(), 'id' => array() )
  );
  $cleared_output = wp_kses($output, $allowed);

  $ok = array( 'page' => $cleared_output,
               'plus' => file_get_contents(get_template_directory()."/images/plus.svg"),
               'less' => file_get_contents(get_template_directory()."/images/less.svg"));
  
  wp_send_json_success($ok);

  wp_die();
}

add_action( "wp_ajax_search_product", 'search_product' );
add_action( "wp_ajax_nopriv_search_product", 'search_product' );