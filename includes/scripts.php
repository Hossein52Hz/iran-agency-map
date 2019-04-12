<?php
/**
 * include admin script/style
 */
function new_agency_form_script($hook) {
    // if ( 'admin.php?page=agencies_form' != $hook ) {
    //     return;
    // }
  // jQuery
  wp_enqueue_script('jquery');
  // This will enqueue the Media Uploader script
  wp_enqueue_media();

  wp_enqueue_script( 'imap_custom_script', plugin_dir_url(__FILE__) . '../admin/js/custom-admin.js' );
  wp_enqueue_style( 'imap_setting_style', plugin_dir_url(__FILE__) . '../admin/css/imap-setting-page.css' );
}
// UPLOAD ENGINE
function load_wp_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );
add_action( 'admin_enqueue_scripts', 'new_agency_form_script' );

/**
 * include frontend script/style
 * I include style and script in imap-shortcut.php file because 
 * they should included when they are in a page that it haave [shortcut]
 */
?>