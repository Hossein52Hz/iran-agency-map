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

	// add_settings_field( 
	// 	'imap_text_field_0', 
	// 	__( 'Settings field description', 'imap' ), 
	// 	'imap_text_field_0_render', 
	// 	'pluginPage', 
	// 	'imap_pluginPage_section' 
	// );

	// add_settings_field( 
	// 	'imap_text_field_1', 
	// 	__( 'Settings field description', 'imap' ), 
	// 	'imap_text_field_1_render', 
	// 	'pluginPage', 
	// 	'imap_pluginPage_section' 
	// );

	add_settings_field( 
		'imap_centeral_agency_name', 
		__( 'central agency', 'imap' ), 
		'imap_centeral_agency_render', 
		'pluginPage', 
		'imap_pluginPage_section' 
	);

	// add_settings_field( 
	// 	'imap_textarea_field_3', 
	// 	__( 'Settings field description', 'imap' ), 
	// 	'imap_textarea_field_3_render', 
	// 	'pluginPage', 
	// 	'imap_pluginPage_section' 
	// );
}

function imap_text_field_0_render(  ) { 

	$options = get_option( 'imap_settings' );
	?>
	<input type='text' name='imap_settings[imap_text_field_0]' value='<?php echo $options['imap_text_field_0']; ?>'>
	<?php

}

function imap_text_field_1_render(  ) { 

	$options = get_option( 'imap_settings' );
	?>
	<input type='text' name='imap_settings[imap_text_field_1]' value='<?php echo $options['imap_text_field_1']; ?>'>
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

function imap_textarea_field_3_render(  ) { 

	$options = get_option( 'imap_settings' );
	?>
	<textarea cols='40' rows='5' name='imap_settings[imap_textarea_field_3]'> 
		<?php echo $options['imap_textarea_field_3']; ?>
 	</textarea>
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
?>