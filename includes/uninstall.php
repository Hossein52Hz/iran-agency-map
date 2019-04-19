<?php
function iran_agency_map_uninstall()
{
    // if uninstall.php is not called by WordPress, die
    // if (!defined('WP_UNINSTALL_PLUGIN')) {
    //     die;
    // }
    delete_option('iran_agency_map_db_version'); 
    delete_option('iran_agency_map_settings');
    
    global $wpdb;
    $wpdb->query( "DROP TABLE IF EXISTS wp_imap" );
    $wpdb->query( "DROP TABLE IF EXISTS imap_province" );
}