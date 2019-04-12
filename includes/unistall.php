<?php
function imap_uninstall_plugin()
{
    // if uninstall.php is not called by WordPress, die
    if (!defined('WP_UNINSTALL_PLUGIN')) {
        die;
    }
    global $wpdb;
    $wpdb->query( "DROP TABLE IF EXISTS wp_imap" );
    $wpdb->query( "DROP TABLE IF EXISTS imap_province" );
    delete_option('imap_settings');
    delete_option('imap_agency_db_version');    
}
?>