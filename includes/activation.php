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

    $table_name = $wpdb->prefix . 'imap';

    // sql to create your table
    // NOTICE that:
    // 1. each field MUST be in separate line
    // 2. There must be two spaces between PRIMARY KEY and its name
    //    Like this: PRIMARY KEY[space][space](id)
    // otherwise dbDelta will not work
    // --
    // -- Table structure for table `wp_imap`
    // --
    $sql = "CREATE TABLE " . $table_name . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        agency_province_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
        agency_city_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
        agency_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
        agency_full_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
        agency_tell bigint(20) NOT NULL,
        agency_mobile bigint(20) NOT NULL,
        agency_address longtext COLLATE utf8_unicode_ci NOT NULL,
        agency_url_logo varchar(100) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY  (id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

    // we do not execute sql directly
    // we are calling dbDelta which cant migrate database
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    // --
    // -- Table structure for table `wp_imap_province`
    // --
    $imap_province_table_name = $wpdb->prefix . 'imap_province';
    $sql = "CREATE TABLE " . $imap_province_table_name . " (
      province_en_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
      province_fa_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
      position_x int(11) NOT NULL,
      position_y int(11) NOT NULL
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    $insert_province_data = $wpdb->query("
    INSERT INTO `wp_imap_province` (`province_en_name`, `province_fa_name`, `position_x`, `position_y`) VALUES
    ('alborz', 'البرز', 240, 340),
    ('ardabil', 'اردبیل', 100, 210),
    ('bushehr', 'بوشهر', 640, 345),
    ('caspian', 'دریای خزر', 0, 0),
    ('chaharmahal-and-bakhtiari', 'چهارمحال و بختیاری', 480, 330),
    ('east-azerbaijan', 'آذربایجان شرقی', 170, 80),
    ('fars', 'فارس', 620, 430),
    ('gilan', 'گیلان', 180, 280),
    ('golestan', 'گلستان', 185, 520),
    ('hamadan', 'همدان', 315, 225),
    ('hormozgan', 'هرمزگان', 750, 600),
    ('ilam', 'ایلام', 400, 130),
    ('isfahan', 'اصفهان', 400, 400),
    ('kerman', 'کرمان', 600, 650),
    ('kermanshah', 'کرمانشاه', 330, 130),
    ('khorasan-razavi', 'خراسان رضوی', 250, 730),
    ('khuzestan', 'خوزستان', 500, 240),
    ('kohgiluyeh-and-boyer-ahmad', 'کهگیلویه و بویراحمد', 550, 330),
    ('kurdistan', 'کردستان', 260, 160),
    ('lorestan', 'لرستان', 380, 210),
    ('markazi', 'مرکزی', 330, 280),
    ('mazandaran', 'مازندران', 230, 400),
    ('north-khorasan', 'خراسان شمالی', 150, 630),
    ('persian-gulf', 'خلیج فارس', 0, 0),
    ('qazvin', 'قزوین', 240, 290),
    ('qom', 'قم', 315, 345),
    ('semnan', 'سمنان', 280, 530),
    ('sistan-baluchestan', 'سیستان بلوچستان', 700, 850),
    ('south-khorasan', 'خراسان جنوبی', 440, 750),
    ('tehran', 'تهران', 270, 370),
    ('west-azerbaijan', 'آذربایجان غربی', 130, 140),
    ('yazd', 'یزد', 450, 570),
    ('zanjan', 'زنجان', 210, 220)"
    );
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($insert_province_data);
    
    // -- Indexes for table `wp_imap`
    $set_fkey = $wpdb->query(" ALTER TABLE `wp_imap` ADD KEY `agency_province_name` (`agency_province_name`) ");
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($set_fkey);

    // -- Indexes for table `wp_imap_province`
    $set_pkey = $wpdb->query(" ALTER TABLE `wp_imap_province` ADD PRIMARY KEY (`province_en_name`) ");
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($set_pkey);



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
    // $installed_ver = get_option('imap_agency_db_version');
    // if ($installed_ver != $imap_agency_db_version) {
    //     $sql = "CREATE TABLE " . $table_name . " (
    //         id int(11) NOT NULL AUTO_INCREMENT,
    //         agency_province_name VARCHAR(100) NOT NULL,
    //         agency_city_name VARCHAR(100) NOT NULL,
    //         agency_name VARCHAR(100) NOT NULL,
    //         agency_full_name VARCHAR(100) NOT NULL,
    //         agency_tell bigint(20) NOT NULL,
    //         agency_mobile bigint(20) NOT NULL,
    //         agency_address longtext NOT NULL,
    //         agency_url_logo VARCHAR(100) NOT NULL,
    //         PRIMARY KEY  (id)
    //     );";

    //     require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    //     dbDelta($sql);

    //     // notice that we are updating option, rather than adding it
    //     update_option('imap_agency_db_version', $imap_agency_db_version);
    // }
}

// register_activation_hook(__FILE__, 'imap_agency_install');

/**
    * Trick to update plugin database, see docs
    */
// function imap_agency_update_db_check()
// {
//     global $imap_agency_db_version;
//     if (get_site_option('imap_agency_db_version') != $imap_agency_db_version) {
//         imap_agency_install();
//     }
// }

// add_action('plugins_loaded', 'imap_agency_update_db_check');
