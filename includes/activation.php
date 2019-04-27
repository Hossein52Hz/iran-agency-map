<?php
/**
    * $iran_agency_map_db_version - holds current database version
    * and used on plugin update to sync database tables
    */
global $iran_agency_map_db_version;
$iran_agency_map_db_version = '1.0.0';

/**
    * register_activation_hook implementation
    *
    * will be called when user activates plugin first time
    * must create needed database tables
    */
function iran_agency_map_agency_install()
{
    global $wpdb;
    global $iran_agency_map_db_version;
    $province_info = $wpdb->prefix . 'iam_province_info';
    $agencies_info = $wpdb->prefix . 'iam_agencies_info';

    // sql to create your table
    // NOTICE that:
    // 1. each field MUST be in separate line
    // 2. There must be two spaces between PRIMARY KEY and its name
    //    Like this: PRIMARY KEY[space][space](id)
    // otherwise dbDelta will not work
    // --
    // -- Table structure for table province_info
    // --
    
    if( $wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE '$province_info'")) != $province_info )
    {
        $iran_agency_map_table = "CREATE TABLE " . $province_info . " (
            province_en_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
            province_fa_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
            position_x int(11) NOT NULL,
            position_y int(11) NOT NULL,
            PRIMARY KEY  (province_en_name)
          )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        
          require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
          dbDelta($iran_agency_map_table);  
    }

    // --
    // -- Table structure for table agencies_info
    // --
    if( $wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE '$agencies_info'")) != $agencies_info )
    {
        $iran_agency_map_create_imap_table = "CREATE TABLE " . $agencies_info . " (
            id int(11) NOT NULL AUTO_INCREMENT,
            agency_province_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
            agency_city_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
            agency_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
            agency_full_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
            agency_tell bigint(20) NOT NULL,
            agency_mobile bigint(20) NOT NULL,
            agency_address longtext COLLATE utf8_unicode_ci NOT NULL,
            agency_url_logo varchar(100) COLLATE utf8_unicode_ci NOT NULL,
            PRIMARY KEY  (id),
            FOREIGN KEY (agency_province_name) REFERENCES " .$province_info . "(province_en_name)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($iran_agency_map_create_imap_table);

        $iran_agency_map_insert_province_data = $wpdb->query($wpdb->prepare("INSERT INTO `".$province_info."` (province_en_name, province_fa_name, position_x, position_y) VALUES
        ('east-azerbaijan', 'آذربایجان شرقی', 130, 140),
        ('west-azerbaijan', 'آذربایجان غربی', 170, 80),
        ('ardabil', 'اردبیل', 100, 210),
        ('isfahan', 'اصفهان', 395, 398),
        ('alborz', 'البرز', 240, 340),
        ('ilam', 'ایلام', 385, 120),
        ('bushehr', 'بوشهر', 640, 345),
        ('tehran', 'تهران', 270, 370),
        ('chaharmahal-and-bakhtiari', 'چهارمحال و بختیاری', 480, 330),
        ('south-khorasan', 'خراسان جنوبی', 440, 750),
        ('khorasan-razavi', 'خراسان رضوی', 250, 730),
        ('north-khorasan', 'خراسان شمالی', 150, 630),
        ('khuzestan', 'خوزستان', 500, 240),
        ('zanjan', 'زنجان', 210, 220),
        ('semnan', 'سمنان', 280, 530),
        ('sistan-baluchestan', 'سیستان بلوچستان', 700, 850),
        ('fars', 'فارس', 620, 430),
        ('qazvin', 'قزوین', 240, 290),
        ('qom', 'قم', 315, 345),
        ('kurdistan', 'کردستان', 260, 160),
        ('kerman', 'کرمان', 600, 650),
        ('kermanshah', 'کرمانشاه', 330, 130),
        ('kohgiluyeh-and-boyer-ahmad', 'کهگیلویه و بویراحمد', 550, 330),
        ('golestan', 'گلستان', 185, 520),
        ('gilan', 'گیلان', 180, 280),
        ('lorestan', 'لرستان', 380, 210),
        ('mazandaran', 'مازندران', 230, 400),
        ('markazi', 'مرکزی', 330, 280),
        ('hormozgan', 'هرمزگان', 750, 600),
        ('hamadan', 'همدان', 315, 225),
        ('yazd', 'یزد', 450, 570),
        ('persian-gulf', 'خلیج فارس', 0, 0),
        ('caspian', 'دریای خزر', 0, 0)"
        ));
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($iran_agency_map_insert_province_data);
        
    }

    // save current database version for later use (on upgrade)
    add_option('iran_agency_map_db_version', $iran_agency_map_db_version);
}