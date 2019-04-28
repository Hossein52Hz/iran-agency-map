<?php
/**
 * include admin script/style
 */
function iran_agency_map_new_agency_form_script($hook) {
    // if ( 'admin.php?page=agencies_form' != $hook ) {
    //     return;
    // }
  // jQuery
  wp_enqueue_script('jquery');
  // This will enqueue the Media Uploader script
  wp_enqueue_media();
  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_script( 'wp-color-picker');
  wp_enqueue_script( 'iran-agency-map-custom-script', plugin_dir_url(__FILE__) . '../admin/js/custom-admin.js' );
  wp_enqueue_style( 'iran-agency-map-setting-style', plugin_dir_url(__FILE__) . '../admin/css/iam-setting-page.css' );
}
// UPLOAD ENGINE
function iran_agency_map_load_wp_media() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'iran_agency_map_load_wp_media' );
add_action( 'admin_enqueue_scripts', 'iran_agency_map_new_agency_form_script' );

/**
 * include frontend script/style
 * I include style and script in iam-shortcut.php file because 
 * they should included when they are in a page that it haave [shortcut]
 */
function iran_agency_map_scripts() {
  wp_enqueue_script('jquery');
  wp_enqueue_script( 'mousewheel-js', plugins_url( '../public/js/jquery.mousewheel-3.1.13.min.js', __FILE__ ));
  wp_enqueue_script( 'raphael-js', plugins_url( '../public/js/raphael-2.2.7.min.js', __FILE__ ));
  wp_enqueue_script( 'mapael-js', plugins_url( '../public/js/jquery.mapael.min.js', __FILE__ ));
  wp_enqueue_script( 'iranmapael-js', plugins_url( '../public/js/iranmapael.js', __FILE__ ));
  wp_enqueue_style( 'iran-agency-map-style', plugins_url( '../public/css/iam-style.css', __FILE__ ) );
 }