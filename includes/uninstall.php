<?php
function iran_agency_map_uninstall()
{
    // if uninstall.php is not called by WordPress, die
    // if (!defined('WP_UNINSTALL_PLUGIN')) {
    //     die;
    // }
    delete_option('iran_agency_map_db_version'); 
    delete_option('iran_agency_map_settings');
    $province_info = $wpdb->prefix . 'iam_province_info';
    $agencies_info = $wpdb->prefix . 'iam_agencies_info';
    global $wpdb;
    $wpdb->query( "DROP TABLE IF EXISTS '" . $agencies_info ."' ");
    $wpdb->query( "DROP TABLE IF EXISTS '" . $province_info ."' ");
}