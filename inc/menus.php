/**
 * Create the main menu
 */
function sfl_main_menu() {
  register_nav_menu('main_menu', __('Menu Principal'));
}
add_action( 'init', 'sfl_main_menu' );