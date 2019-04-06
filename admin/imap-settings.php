<?php
add_action( 'admin_init', 'imap_settings_init' );

function imap_settings_init(  ) { 

	register_setting( 'pluginPage', 'imap_settings' );

	add_settings_section(
		'imap_pluginPage_section', 
		__( 'Your section description', 'imap' ), 
		'imap_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'imap_text_field_0', 
		__( 'Settings field description', 'imap' ), 
		'imap_text_field_0_render', 
		'pluginPage', 
		'imap_pluginPage_section' 
	);

	add_settings_field( 
		'imap_text_field_1', 
		__( 'Settings field description', 'imap' ), 
		'imap_text_field_1_render', 
		'pluginPage', 
		'imap_pluginPage_section' 
	);

	add_settings_field( 
		'imap_select_field_2', 
		__( 'Settings field description', 'imap' ), 
		'imap_select_field_2_render', 
		'pluginPage', 
		'imap_pluginPage_section' 
	);

	add_settings_field( 
		'imap_textarea_field_3', 
		__( 'Settings field description', 'imap' ), 
		'imap_textarea_field_3_render', 
		'pluginPage', 
		'imap_pluginPage_section' 
	);
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

function imap_select_field_2_render(  ) { 

	$options = get_option( 'imap_settings' );
	?>
	<select name='imap_settings[imap_select_field_2]'>
		<option value='1' <?php selected( $options['imap_select_field_2'], 1 ); ?>>Option 1</option>
		<option value='2' <?php selected( $options['imap_select_field_2'], 2 ); ?>>Option 2</option>
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

	echo __( 'This section description', 'imap' );

}


function imap_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>imap</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}
?>