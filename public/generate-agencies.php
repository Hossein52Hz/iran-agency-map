<?php
//generate province's name and their agencies 
function iran_agency_map_generate_areas()
{
    global $wpdb;
    $province_info = $wpdb->prefix . 'iam_province_info';
    $agencies_info = $wpdb->prefix . 'iam_agencies_info';

    $province_result = $wpdb->get_results( " SELECT * FROM $province_info ");
    $agencies_result = $wpdb->get_results( " SELECT * FROM $agencies_info ");
    echo 'areas: {';
    foreach ( $province_result AS $row1 ) 
    {
                echo '"' . esc_html($row1->province_en_name) . '": {';
                    
                    if ( $row1->province_en_name == 'caspian' || $row1->province_en_name == 'persian-gulf' ) {
                        // sea and gulf default color
                        echo 'attrs: {fill: "rgb(108, 174, 216)"},';
                    }                    

                   echo 'tooltip: {content: ' . '"' . esc_html($row1->province_fa_name) . '"},';
                   echo 'Agencies: ' . "'";
                   foreach ( $agencies_result AS $row ) 
                   {
                       if( $row1->province_en_name == $row->agency_province_name )
                       {
                           echo  '<div class="branch"><div><img src="' . esc_html($row->agency_url_logo) . '" class="profile right"><ul class="info"><li class="cityname">' . esc_html($row->agency_city_name) . '</li><li class="fullname">' . esc_html($row->agency_name) . '</li></ul></div><div class="contact"><ul><li><i class="profile-icon"></i><span>مدیریت: </span> ' . esc_html($row->agency_full_name) . '</li><li><i class="tell-icon"></i><span> شماره تلفن: </span>' . esc_html($row->agency_tell) . '</li><li><i class="mobile-icon"></i><span>شماره همراه: </span>' . esc_html($row->agency_mobile) . '</li><li><i class="address-icon"></i><span>آدرس: </span>' . esc_html($row->agency_address) . '</li></ul></div></div>';
                       }
                   }
                   echo "'";
                echo '},';           
    }
    echo '},';
}
function iran_agency_map_generate_plot()
{
    global $wpdb;
    $province_info = $wpdb->prefix . 'iam_province_info';
    $agencies_info = $wpdb->prefix . 'iam_agencies_info';
    $province_plot_result = $wpdb->get_results( " SELECT DISTINCT province_en_name, position_x, position_y FROM $province_info INNER JOIN $agencies_info  ON $agencies_info.agency_province_name = $province_info.province_en_name " );
    echo ' plots: { ';
    foreach ( $province_plot_result AS $row ) 
    {
        echo "'" . esc_html($row->province_en_name) . "': {";
        echo "latitude: " . esc_html($row->position_x) . ",";
        echo "longitude: " . esc_html($row->position_y) . ",";
        echo ' }, ';
    }
    echo ' }, ';
}
function iran_agency_map_generate_link()
{
    global $wpdb;
    $province_info = $wpdb->prefix . 'iam_province_info';
    $agencies_info = $wpdb->prefix . 'iam_agencies_info';
    $province_link_result = $wpdb->get_results( " SELECT DISTINCT agency_province_name FROM $agencies_info " );

    $options = get_option( 'iran_agency_map_settings' );
    $central_agency = rtrim($options['iran_agency_map_centeral_agency']);
    echo ' links: { ';
    foreach ( $province_link_result AS $row ) 
    {
        if( $central_agency != rtrim($row->agency_province_name) )
        {
            echo "'". esc_html($central_agency) ."-". esc_html(rtrim($row->agency_province_name))."':{";
            echo "between: [" . "'" . esc_html($central_agency) . "'," . "'" . esc_html(rtrim($row->agency_province_name))."'],";
            echo '},';
        }

    }
    echo '}';
}