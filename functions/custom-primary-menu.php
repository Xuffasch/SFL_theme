<?php
function custom_primary_menu() {
  $menuLocations = get_nav_menu_locations();
  $menuId = $menuLocations['primary'];

  $primaryNav = wp_get_nav_menu_items($menuId);
  $navBar = "";

  foreach( $primaryNav as $navItem ) {
    $logged = "";
    $icon = "";
    $cart_counter = "";

    switch ($navItem->ID) {
      case 224:
        $navBar .= '<ul id="menu-menu-sfl" class="invisible">';
        $icon = file_get_contents(get_template_directory()."/images/products/market-bw.svg");
        $navBar .= '<li class="menu-item"><a href="'.$navItem->url.'" alt="'.$navItem->title.'" class="menu-icon" id="item-'.$navItem->ID.'">'.$icon.'</a></li>';
        break;
      case 225:
        $icon = file_get_contents(get_template_directory()."/images/products/vegan-bw.svg");
        $navBar .= '<li class="menu-item"><a href="'.$navItem->url.'" alt="'.$navItem->title.'" class="menu-icon" id="item-'.$navItem->ID.'">'.$icon.'</a></li>';
        break;
      case 226:
        $icon = file_get_contents(get_template_directory()."/images/products/fruits-bw.svg");
        $navBar .= '<li class="menu-item"><a href="'.$navItem->url.'" alt="'.$navItem->title.'" class="menu-icon" id="item-'.$navItem->ID.'">'.$icon.'</a></li>';
        $navBar .= '</ul>';
        break;
      case 228:
        $navBar .= '<div class="user-menu">';
        $icon = file_get_contents(get_template_directory()."/images/account/account-round.svg");
        $logged = is_user_logged_in() ? 'logged' : "";
        $navBar .= '<a href="'.get_permalink( wc_get_page_id( 'myaccount' )).'" alt="Account" class="user-menu-item menu-icon'.$logged.'" id="my-account">'.$icon.'</a>';
        break;
      case 227:
        $cart_background_start = '<a href="'.get_permalink( wc_get_page_id( 'cart' )).'" alt="Account" class="menu-icon" id="my-account"><div class="cart-background-filler">'; 
        $cart_background_end = '</div></a>';
        
        $icon = file_get_contents(get_template_directory()."/images/products/basket-round.svg");
        $cart_icon = '<div class="cart-icon">'.$icon.'</div>';
        
        $cart_counter = '<div class="cart-item-counter"><h2 id="cart-counter">'.count(WC()->cart->get_cart()).'</h2></div>';

        $in_cart = is_cart() ? 'invisible' : '';
        
        $navBar .= '<div class="user-menu-item cart-counter '.$in_cart.'">';
        $navBar .= $cart_background_start;
        $navBar .= $cart_icon;
        $navBar .= $cart_counter;
        $navBar .= $cart_background_end;
        $navBar .= '</div>';
        break;
    }
  }

  echo $navBar;
}