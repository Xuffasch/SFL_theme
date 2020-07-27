<?php
function custom_primary_menu() {
  $menuLocations = get_nav_menu_locations();
  $menuId = $menuLocations['primary'];

  $primaryNav = wp_get_nav_menu_items($menuId);

  foreach( $primaryNav as $navItem ) {
    $logged = "";
    $icon = "";
    $cart_counter = "";
    switch ($navItem->ID) {
      case 224:
        $icon = file_get_contents(get_template_directory()."/images/products/market-bw.svg");
        break;
      case 225:
        $icon = file_get_contents(get_template_directory()."/images/products/vegan-bw.svg");
        break;
      case 226:
        $icon = file_get_contents(get_template_directory()."/images/products/fruits-bw.svg");
        break;
      case 228:
        $icon = file_get_contents(get_template_directory()."/images/account/account-round.svg");
        $logged = is_user_logged_in() ? 'logged' : "";
        break;
      case 227:
        $icon = file_get_contents(get_template_directory()."/images/products/basket-round.svg");
        $count =  WC()->cart->get_cart_contents_count();
        $cart_counter = "<div class='cart-item-counter'><h2 id='cart-counter'>".$count."</h2></div>";
        break;
    }

    echo '<li class="menu-item"><a href="'.$navItem->url.'" alt="'.$navItem->title.'" class="menu-icon '.$logged.'" id="item-'.$navItem->ID.'">'.$icon.'</a>'.$cart_counter.'</li>';
  }
}