<?php
add_action( 'admin_init', 'iran_agency_map_settings_init' );

function iran_agency_map_settings_init(  ) { 

	register_setting( 'pluginPage', 'iran_agency_map_settings' );

	add_settings_section(
		'iran_agency_map_pluginPage_section', 
		__( 'imap setting section', 'iran-agency-map' ), 
		'iran_agency_map_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'iran_agency_map_check_link', 
		__( 'active links', 'iran-agency-map' ), 
		'iran_agency_map_check_link_render', 
		'pluginPage', 
		'iran_agency_map_pluginPage_section' 
	);

	add_settings_field( 
		'iran_agency_map_centeral_agency', 
		__( 'central agency', 'iran-agency-map' ), 
		'iran_agency_map_centeral_agency_render', 
		'pluginPage', 
		'iran_agency_map_pluginPage_section' 
	);

	add_settings_field( 
		'iran_agency_map_bg_color', 
		__( 'Background map color', 'iran-agency-map' ), 
		'iran_agency_map_bg_color_render', 
		'pluginPage', 
		'iran_agency_map_pluginPage_section' 
	);

	add_settings_field( 
		'iran_agency_map_bg_hover_color', 
		__( 'Hover map color', 'iran-agency-map' ), 
		'iran_agency_map_bg_hover_color_render', 
		'pluginPage', 
		'iran_agency_map_pluginPage_section' 
	);
		

}

function iran_agency_map_check_link_render(  ) { 

	$options = get_option( 'iran_agency_map_settings' );
	?>
	<input type="checkbox" name="iran_agency_map_settings[iran_agency_map_check_link]" value="1"<?php checked( isset( $options['iran_agency_map_check_link'] ) ); ?> />

	<?php
}

function iran_agency_map_centeral_agency_render(  ) { 

	$options = get_option( 'iran_agency_map_settings' );
	// $province_info = $wpdb->prefix . 'iam_province_info';
	global $wpdb;
    $agencies_info = $wpdb->prefix . 'iam_agencies_info';
    $central_agency_result = $wpdb->get_results( " SELECT DISTINCT agency_province_name FROM " . $agencies_info . " " );

	?>
	<select name='iran_agency_map_settings[iran_agency_map_centeral_agency]'>

	<?php 
		foreach ($central_agency_result as $row) {

			if($options['iran_agency_map_centeral_agency'] == $row->agency_province_name )
			{
				echo '<option selected="selected" value="' ;
			}
			else echo '<option value="' ;
			
			echo esc_attr("$row->agency_province_name");
			echo '">';
			echo esc_html_e( $row->agency_province_name, 'iran-agency-map' );
			echo '</option>';
		}
	?>
		

	</select>

<?php

}

function iran_agency_map_bg_color_render(  ) { 


	$options = get_option( 'iran_agency_map_settings' );
	if( !isset($options['iran_agency_map_bg_color']) )
	$options['iran_agency_map_bg_color'] = '#c7d7df';
	?>
	<input type="text" name='iran_agency_map_settings[iran_agency_map_bg_color]' data-default-color="<?php echo esc_attr($options['iran_agency_map_bg_color']); ?>" class="imap-color-picker" value='<?php echo esc_attr($options['iran_agency_map_bg_color']); ?>'>
	
	<?php
}
function iran_agency_map_bg_hover_color_render(  ) { 


	$options = get_option( 'iran_agency_map_settings' );
	if( !isset($options['iran_agency_map_bg_hover_color']) )
	$options['iran_agency_map_bg_hover_color'] = '#08da53';
	?>
	<input type="text" name='iran_agency_map_settings[iran_agency_map_bg_hover_color]' data-default-color="<?php echo esc_attr($options['iran_agency_map_bg_hover_color']); ?>" class="imap-color-picker" value='<?php echo esc_attr($options['iran_agency_map_bg_hover_color']); ?>'>
	
	<?php
}

function iran_agency_map_settings_section_callback(  ) { 


	$output = __( 'after save setting, you can copy below code to use as the shortcode:', 'iran-agency-map' ) . '<br>' . '<h2 class="imap-shortcode">' . __( '[iran-agency-map]', 'iran-agency-map' ) . '</h2>' . '<br>' . __( 'just copy the [iran-agency-map] and paste in new page.', 'iran-agency-map' );
	echo wp_kses_post($output);

}


function iran_agency_map_options_page(  ) { 

	?>
	<div class="imap-setting-page">
	<form action='options.php' method='post'>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
</div>
	<?php

}