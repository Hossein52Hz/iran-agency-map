<?php
add_action( 'admin_init', 'imap_settings_init' );

function imap_settings_init(  ) { 

	register_setting( 'pluginPage', 'imap_settings' );

	add_settings_section(
		'imap_pluginPage_section', 
		__( 'imap setting section', 'imap' ), 
		'imap_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'imap_check_link', 
		__( 'active links', 'imap' ), 
		'imap_check_link_render', 
		'pluginPage', 
		'imap_pluginPage_section' 
	);

	add_settings_field( 
		'imap_centeral_agency', 
		__( 'central agency', 'imap' ), 
		'imap_centeral_agency_render', 
		'pluginPage', 
		'imap_pluginPage_section' 
	);

	add_settings_field( 
		'imap_bg_color', 
		__( 'Background color', 'imap' ), 
		'imap_bg_color_render', 
		'pluginPage', 
		'imap_pluginPage_section' 
	);

	add_settings_field( 
		'imap_bg_hover_color', 
		__( 'Background color', 'imap' ), 
		'imap_bg_hover_color_render', 
		'pluginPage', 
		'imap_pluginPage_section' 
	);
		

}

function imap_check_link_render(  ) { 

	$options = get_option( 'imap_settings' );
	?>
	<input type="checkbox" name="imap_settings[imap_check_link]" value="1"<?php checked( isset( $options['imap_check_link'] ) ); ?> />

	<?php
}

function imap_centeral_agency_render(  ) { 

	$options = get_option( 'imap_settings' );
	global $wpdb;
    $central_agency_result = $wpdb->get_results( ' SELECT DISTINCT `agency_province_name` FROM wp_imap ' );

	?>
	<select name='imap_settings[imap_centeral_agency]'>

	<?php 
		foreach ($central_agency_result as $row) {

			if($options['imap_centeral_agency'] == $row->agency_province_name )
			{
				echo '<option selected="selected" value="' ;
			}
			else echo '<option value="' ;
			
			echo "$row->agency_province_name";
			echo '">';
			echo _e( $row->agency_province_name, 'imap' );
			echo '</option>';
		}
	?>
		

	</select>

<?php

}

function imap_bg_color_render(  ) { 


	$options = get_option( 'imap_settings' );
	if( !isset($options['imap_bg_color']) )
	$options['imap_bg_color'] = '#c7d7df';
	?>
	<input type="text" name='imap_settings[imap_bg_color]' data-default-color="<?php echo $options['imap_bg_color']; ?>" class="imap-color-picker" value='<?php echo $options['imap_bg_color']; ?>'>
	
	<?php
}
function imap_bg_hover_color_render(  ) { 


	$options = get_option( 'imap_settings' );
	if( !isset($options['imap_bg_hover_color']) )
	$options['imap_bg_hover_color'] = '#08da53';
	?>
	<input type="text" name='imap_settings[imap_bg_hover_color]' data-default-color="<?php echo $options['imap_bg_hover_color']; ?>" class="imap-color-picker" value='<?php echo $options['imap_bg_hover_color']; ?>'>
	
	<?php
}

function imap_settings_section_callback(  ) { 

	echo __( 'after save setting, you can copy below code to use as the shortcode:', 'imap' );
	echo "<br>";
	echo '<h2 class="imap-shortcode">' . __( '[imap]', 'imap' ) . '</h2>';
	echo "<br>";
	echo __( 'just copy the [imap] and paste in new page.', 'imap' );

}


function imap_options_page(  ) { 

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