<?php
//generate province's name and their agencies 
function imap_generate_areas()
{
    global $wpdb;
    $province_result = $wpdb->get_results( ' SELECT * FROM wp_imap_province ' );
    $agencies_result = $wpdb->get_results( ' SELECT * FROM wp_imap ' );
    echo 'areas: {';
    foreach ( $province_result AS $row1 ) 
    {
                echo '"' . $row1->province_en_name . '": {';
                    
                    if ( $row1->province_en_name == 'caspian' || $row1->province_en_name == 'persian-gulf' ) {
                        // sea and gulf default color
                        echo 'attrs: {fill: "rgb(108, 174, 216)"},';
                    }                    

                   echo 'tooltip: {content: ' . '"' . $row1->province_fa_name . '"},';
                   echo 'Agencies: ' . "'";
                   foreach ( $agencies_result AS $row ) 
                   {
                       if( $row1->province_en_name == $row->agency_province_name )
                       {
                           echo  '<div class="branch"><div><img src="' . $row->agency_url_logo . '" class="profile right"><ul class="info"><li class="cityname">' . $row->agency_city_name . '</li><li class="fullname">' . $row->agency_name . '</li></ul></div><div class="contact"><ul><li><span>مدیریت: </span> ' . $row->agency_full_name . '</li><li><span>' . $row->agency_tell . '</span>031-31234567</li><li><span>شماره همراه: </span>' . $row->agency_mobile . '</li><li><span>آدرس: </span>' . $row->agency_address . '</li></ul></div></div>';
                       }
                   }
                   echo "'";
                echo '},';           
    }
    echo '},';
}
function imap_generate_plot()
{
    global $wpdb;
    $province_plot_result = $wpdb->get_results( ' SELECT DISTINCT province_en_name, position_x, position_y FROM wp_imap_province INNER JOIN wp_imap ON wp_imap.agency_province_name=wp_imap_province.province_en_name ' );
    echo ' plots: { ';
    foreach ( $province_plot_result AS $row ) 
    {
        echo "'" . $row->province_en_name . "': {";
        echo "latitude: " . $row->position_x . ",";
        echo "longitude: " . $row->position_y . ",";
        echo ' }, ';
    }
    echo ' }, ';
}

?>