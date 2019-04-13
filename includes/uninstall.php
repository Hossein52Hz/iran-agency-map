<?php
function imap_uninstall_plugin()
{
    // if uninstall.php is not called by WordPress, die
    // if (!defined('WP_UNINSTALL_PLUGIN')) {
    //     die;
    // }
    delete_option('imap_agency_db_version'); 
    delete_option('imap_settings');
    
    global $wpdb;
    $wpdb->query( "DROP TABLE IF EXISTS wp_imap" );
    $wpdb->query( "DROP TABLE IF EXISTS imap_province" );
}
?>