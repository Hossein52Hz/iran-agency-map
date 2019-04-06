<?php
/**
 * Plugin Name:       Imap
 * Plugin URI:        wpro.ir
 * Description:       The Imap plugin is a great plugin for Iranian companies that they can display their agencies on a beautiful SVG map.
 * Version:           1.0.0
 * Author:            Masoudi
 * Author URI:        wpro.ir
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       imap
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

/**
 * create table list of agencies and display theme
 */

 require_once plugin_dir_path( __FILE__ ) . 'admin/agency_item_lists.php';

 /**
  * create imap admin menu and sub-menu
  */
  require_once plugin_dir_path( __FILE__ ) . 'admin/imap-admin-menu.php';

  /**
   * add agency page handler
   */
  require_once plugin_dir_path( __FILE__ ) . 'admin/agency_page_handler.php';

  require_once plugin_dir_path( __FILE__ ) . 'admin/new-edit-form-handler.php';

  /**
   * create plugin settings page
   */
  require_once plugin_dir_path( __FILE__ ) . 'admin/imap-settings.php';

  /**
   * add translation section
   */
  require_once plugin_dir_path( __FILE__ ) . 'includes/translation.php';

  /**
   * add script and style of imap plugin
   */
  require_once plugin_dir_path( __FILE__ ) . 'includes/scripts.php';
  ?>