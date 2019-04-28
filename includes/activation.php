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
    
    if( $wpdb->get_var("SHOW TABLES LIKE '$province_info'") != $province_info )
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


        function iam_insert_province_data($place_holders, $values) {
            global $wpdb;
            $province_info = $wpdb->prefix . 'iam_province_info';
            $agencies_info = $wpdb->prefix . 'iam_agencies_info';
            
            $query = "INSERT INTO $province_info (province_en_name, province_fa_name, position_x, position_y) VALUES ";
            $query .= implode( ', ', $place_holders );
            $sql   = $wpdb->prepare( "$query ", $values );
            $insert_data = $wpdb->query( $sql );
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($insert_data);
        }
        $data_to_be_inserted = array( array(
            
            'province_en_name'  => 'east-azerbaijan',
            'province_fa_name'  => 'آذربایجان شرقی',
            'position_x'        => 130,
            'position_y'        => 140
        ),
        
        array(
            'province_en_name'  => 'west-azerbaijan',
            'province_fa_name'  => 'آذربایجان غربی',
            'position_x'        => 170,
            'position_y'        => 80
        ),
        
        array(
            'province_en_name'  => 'ardabil',
            'province_fa_name'  => 'اردبیل',
            'position_x'        => 100,
            'position_y'        => 210
        ),
        
        array(
            'province_en_name'  => 'isfahan',
            'province_fa_name'  => 'اصفهان',
            'position_x'        => 395,
            'position_y'        => 398
        ),
        
        array(
            'province_en_name'  => 'alborz',
            'province_fa_name'  => 'البرز',
            'position_x'        => 240,
            'position_y'        => 340
        ),
        
        array(
            'province_en_name'  => 'ilam',
            'province_fa_name'  => 'ایلام',
            'position_x'        => 385,
            'position_y'        => 120
        ),
        
        array(
            'province_en_name'  => 'bushehr',
            'province_fa_name'  => 'بوشهر',
            'position_x'        => 640,
            'position_y'        => 345
        ),
        
        array(
            'province_en_name'  => 'tehran',
            'province_fa_name'  => 'تهران',
            'position_x'        => 270,
            'position_y'        => 370
        ),
        
        array(
            'province_en_name'  => 'chaharmahal-and-bakhtiari',
            'province_fa_name'  => 'چهارمحال و بختیاری',
            'position_x'        => 480,
            'position_y'        => 330
        ),
        
        array(
            'province_en_name'  => 'south-khorasan',
            'province_fa_name'  => 'خراسان جنوبی',
            'position_x'        => 440,
            'position_y'        => 750
        ),
        
        array(
            'province_en_name'  => 'khorasan-razavi',
            'province_fa_name'  => 'خراسان رضوی',
            'position_x'        => 250,
            'position_y'        => 730
        ),
        
        array(
            'province_en_name'  => 'north-khorasan',
            'province_fa_name'  => 'خراسان شمالی',
            'position_x'        => 150,
            'position_y'        => 630
        ),
        
        array(
            'province_en_name'  => 'khuzestan',
            'province_fa_name'  => 'خوزستان',
            'position_x'        => 500,
            'position_y'        => 240
        ),
        
        array(
            'province_en_name'  => 'zanjan',
            'province_fa_name'  => 'زنجان',
            'position_x'        => 210,
            'position_y'        => 220
        ),
        
        array(
            'province_en_name'  => 'semnan',
            'province_fa_name'  => 'سمنان',
            'position_x'        => 280,
            'position_y'        => 530
        ),
        
        array(
            'province_en_name'  => 'sistan-baluchestan',
            'province_fa_name'  => 'سیستان بلوچستان',
            'position_x'        => 700,
            'position_y'        => 850
        ),
        
        array(
            'province_en_name'  => 'fars',
            'province_fa_name'  => 'فارس',
            'position_x'        => 620,
            'position_y'        => 430
        ),
        
        array(
            'province_en_name'  => 'qazvin',
            'province_fa_name'  => 'قزوین',
            'position_x'        => 240,
            'position_y'        => 290
        ),
        
        array(
            'province_en_name'  => 'qom',
            'province_fa_name'  => 'قم',
            'position_x'        => 315,
            'position_y'        => 345
        ),
        
        array(
            'province_en_name'  => 'kurdistan',
            'province_fa_name'  => 'کردستان',
            'position_x'        => 260,
            'position_y'        => 160
        ),
        
        array(
            'province_en_name'  => 'kerman',
            'province_fa_name'  => 'کرمان',
            'position_x'        => 600,
            'position_y'        => 650
        ),
        
        array(
            'province_en_name'  => 'kermanshah',
            'province_fa_name'  => 'کرمانشاه',
            'position_x'        => 330,
            'position_y'        => 130
        ),
        
        array(
            'province_en_name'  => 'kohgiluyeh-and-boyer-ahmad',
            'province_fa_name'  => 'کهگیلویه و بویراحمد',
            'position_x'        => 550,
            'position_y'        => 330
        ),
        
        array(
            'province_en_name'  => 'golestan',
            'province_fa_name'  => 'گلستان',
            'position_x'        => 185,
            'position_y'        => 520
        ),
        
        array(
            'province_en_name'  => 'gilan',
            'province_fa_name'  => 'گیلان',
            'position_x'        => 180,
            'position_y'        => 280
        ),
        
        array(
            'province_en_name'  => 'lorestan',
            'province_fa_name'  => 'لرستان',
            'position_x'        => 380,
            'position_y'        => 210
        ),
        
        array(
            'province_en_name'  => 'mazandaran',
            'province_fa_name'  => 'مازندران',
            'position_x'        => 230,
            'position_y'        => 400
        ),
        
        array(
            'province_en_name'  => 'markazi',
            'province_fa_name'  => 'مرکزی',
            'position_x'        => 330,
            'position_y'        => 280
        ),
        
        array(
            'province_en_name'  => 'hormozgan',
            'province_fa_name'  => 'هرمزگان',
            'position_x'        => 750,
            'position_y'        => 600
        ),
        
        array(
            'province_en_name'  => 'hamadan',
            'province_fa_name'  => 'همدان',
            'position_x'        => 315,
            'position_y'        => 225
        ),
        
        array(
            'province_en_name'  => 'yazd',
            'province_fa_name'  => 'یزد',
            'position_x'        => 450,
            'position_y'        => 570
        ),
        
        array(
            'province_en_name'  => 'persian-gulf',
            'province_fa_name'  => 'خلیج فارس',
            'position_x'        => 0,
            'position_y'        => 0
        ),
        
        array(
            'province_en_name' => 'caspian',
            'province_fa_name' => 'دریای خزر',
            'position_x'       => 0,
            'position_y'       => 0
        ));
        
        
        $values = $place_holders = array();
        
        if(count($data_to_be_inserted) > 0) {
            foreach($data_to_be_inserted as $data) {
                array_push( $values, $data['province_en_name'], $data['province_fa_name'], $data['position_x'], $data['position_y']);
                $place_holders[] = "( '%s', '%s', '%d', '%d')";
            }
        
            iam_insert_province_data( $place_holders, $values );
        }
    }

    // --
    // -- Table structure for table agencies_info
    // --
    if( $wpdb->get_var("SHOW TABLES LIKE '$agencies_info'") != $agencies_info )
    {
        $iran_agency_map_create_table = "CREATE TABLE " . $agencies_info . " (
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
        dbDelta($iran_agency_map_create_table);
        
    }

    // save current database version for later use (on upgrade)
    add_option('iran_agency_map_db_version', $iran_agency_map_db_version);
}