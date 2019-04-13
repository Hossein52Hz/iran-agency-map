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
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
If (is_plugin_active('imap/imap.php'))
{             
/**
 * install and prepare imap table in Database
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/activation.php';

register_activation_hook( __FILE__ , 'imap_agency_install');

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
  function imap_agency_languages() {
    load_plugin_textdomain( 'imap', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
  }
  add_action( 'plugins_loaded', 'imap_agency_languages' );

  /**
   * add script and style of imap plugin
   */
  require_once plugin_dir_path( __FILE__ ) . 'includes/scripts.php';
  function add_plugin_scripts() {
    wp_enqueue_script( 'jquery3-js', plugins_url( 'public/js/jquery-3.1.1.min.js', __FILE__ ));
    wp_enqueue_script( 'mousewheel-js', plugins_url( 'public/js/jquery.mousewheel-3.1.13.min.js', __FILE__ ));
    wp_enqueue_script( 'raphael-js', plugins_url( 'public/js/raphael-2.2.7.min.js', __FILE__ ));
    wp_enqueue_script( 'mapael-js', plugins_url( 'public/js/jquery.mapael.min.js', __FILE__ ));
    wp_enqueue_script( 'iranmapael-js', plugins_url( 'public/js/iranmapael.js', __FILE__ ));

     wp_enqueue_style( 'style', plugins_url( 'public/css/style.css', __FILE__ ) );
 
   }
   add_action( 'wp_enqueue_scripts', 'add_plugin_scripts' );
  /**
   * Imap front-end shortcut
   */
  require_once plugin_dir_path( __FILE__ ) . 'public/imap-shortcode.php';


  /**
   * Unistall plugin
   */
  require_once plugin_dir_path( __FILE__ ) . 'includes/unistall.php';
  register_uninstall_hook(__FILE__, 'imap_uninstall_plugin');
}
?>