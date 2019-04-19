<?php
/**
 * Plugin Name:       Iran agency map
 * Plugin URI:        wpro.ir
 * Description:       The Imap plugin is a great plugin for Iranian companies that they can display their agencies on a beautiful SVG map.
 * Version:           1.0.0
 * Author:            Hossein Masoudi
 * Author URI:        https://github.com/Hossein52Hz
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       iran-agency-map
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * install and prepare imap table in Database
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/activation.php';

register_activation_hook( __FILE__ , 'iran_agency_map_agency_install');

/**
 * create table list of agencies 
 */

 require_once plugin_dir_path( __FILE__ ) . 'admin/agency-item-lists.php';

 /**
  * create imap admin menu and sub-menu
  */
  require_once plugin_dir_path( __FILE__ ) . 'admin/imap-admin-menu.php';

  /**
   * add agency page handler
   */
  require_once plugin_dir_path( __FILE__ ) . 'admin/agency-page-handler.php';

  require_once plugin_dir_path( __FILE__ ) . 'admin/new-edit-form-handler.php';

  /**
   * create plugin settings page
   */
  require_once plugin_dir_path( __FILE__ ) . 'admin/imap-settings.php';

  /**
   * add translation section
   */
  function iran_agency_map_agency_languages() {
    load_plugin_textdomain( 'iran-agency-map', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
  }
  add_action( 'plugins_loaded', 'iran_agency_map_agency_languages' );

  /**
   * add script and style of imap plugin
   */
  require_once plugin_dir_path( __FILE__ ) . 'includes/scripts.php';
  add_action( 'wp_enqueue_scripts', 'iran_agency_map_scripts' );
  
  /**
   * Imap front-end shortcut
   */
  require_once plugin_dir_path( __FILE__ ) . 'public/imap-shortcode.php';


  /**
   * Unistall plugin
   */
  require_once plugin_dir_path( __FILE__ ) . 'includes/uninstall.php';
  register_uninstall_hook(__FILE__, 'iran_agency_map_uninstall');