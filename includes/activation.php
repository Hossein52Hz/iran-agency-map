<?php
/**
    * PART 1. Defining Custom Database Table
    * ============================================================================
    *
    * In this part you are going to define custom database table,
    * create it, update, and fill with some dummy data
    *
    * http://codex.wordpress.org/Creating_Tables_with_Plugins
    *
    * In case your are developing and want to check plugin use:
    *
    * DROP TABLE IF EXISTS wp_cte;
    * DELETE FROM wp_options WHERE option_name = 'imap_agency_install_data';
    *
    * to drop table and option
    */

/**
    * $imap_agency_db_version - holds current database version
    * and used on plugin update to sync database tables
    */
global $imap_agency_db_version;
$imap_agency_db_version = '1.0.0'; // version changed from 1.0 to 1.1

/**
    * register_activation_hook implementation
    *
    * will be called when user activates plugin first time
    * must create needed database tables
    */
function imap_agency_install()
{
    global $wpdb;
    global $imap_agency_db_version;

    $table_name = $wpdb->prefix . 'imap'; // do not forget about tables prefix

    // sql to create your table
    // NOTICE that:
    // 1. each field MUST be in separate line
    // 2. There must be two spaces between PRIMARY KEY and its name
    //    Like this: PRIMARY KEY[space][space](id)
    // otherwise dbDelta will not work
    $sql = "CREATE TABLE " . $table_name . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        agency_province_name VARCHAR(100) NOT NULL,
        agency_city_name VARCHAR(100) NOT NULL,
        agency_name VARCHAR(100) NOT NULL,
        agency_full_name VARCHAR(100) NOT NULL,
        agency_tell bigint(20) NOT NULL,
        agency_mobile bigint(20) NOT NULL,
        agency_address longtext NOT NULL,
        agency_url_logo VARCHAR(100) NOT NULL,
        PRIMARY KEY  (id)
    );";

    // we do not execute sql directly
    // we are calling dbDelta which cant migrate database
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    // save current database version for later use (on upgrade)
    add_option('imap_agency_db_version', $imap_agency_db_version);

    /**
        * [OPTIONAL] Example of updating to 1.1 version
        *
        * If you develop new version of plugin
        * just increment $imap_agency_db_version variable
        * and add following block of code
        *
        * must be repeated for each new version
        * in version 1.1 we change email field
        * to contain 200 chars rather 100 in version 1.0
        * and again we are not executing sql
        * we are using dbDelta to migrate table changes
        */
    $installed_ver = get_option('imap_agency_db_version');
    if ($installed_ver != $imap_agency_db_version) {
        $sql = "CREATE TABLE " . $table_name . " (
            id int(11) NOT NULL AUTO_INCREMENT,
            agency_province_name VARCHAR(100) NOT NULL,
            agency_city_name VARCHAR(100) NOT NULL,
            agency_name VARCHAR(100) NOT NULL,
            agency_full_name VARCHAR(100) NOT NULL,
            agency_tell bigint(20) NOT NULL,
            agency_mobile bigint(20) NOT NULL,
            agency_address longtext NOT NULL,
            agency_url_logo VARCHAR(100) NOT NULL,
            PRIMARY KEY  (id)
        );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        // notice that we are updating option, rather than adding it
        update_option('imap_agency_db_version', $imap_agency_db_version);
    }
}

register_activation_hook(__FILE__, 'imap_agency_install');

/**
    * Trick to update plugin database, see docs
    */
function imap_agency_update_db_check()
{
    global $imap_agency_db_version;
    if (get_site_option('imap_agency_db_version') != $imap_agency_db_version) {
        imap_agency_install();
    }
}

add_action('plugins_loaded', 'imap_agency_update_db_check');
