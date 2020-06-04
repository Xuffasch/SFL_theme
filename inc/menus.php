<?php
/**
 * Create the main menu
 */
function sfl_main_menu() {
  register_nav_menus( 
    array( 'primary' =>  __('Menu Primaire', 'sfltheme'), )
  );
}
add_action( 'init', 'sfl_main_menu' );