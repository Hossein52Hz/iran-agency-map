<?php
/**
    * PART 3. Admin page
    * ============================================================================
    *
    * In this part you are going to add admin page for custom table
    *
    * http://codex.wordpress.org/Administration_Menus
    */

/**
    * admin_menu hook implementation, will add pages to list agencies and to add new one
    */
function imap_agency_admin_menu()
{
    add_menu_page(__('agencies', 'imap'), __('agencies', 'imap'), 'activate_plugins', 'agencies', 'imap_agency_agencies_page_handler');
    add_submenu_page('agencies', __('agencies', 'imap'), __('agencies', 'imap'), 'activate_plugins', 'agencies', 'imap_agency_agencies_page_handler');
    add_submenu_page('agencies', __('Add new', 'imap'), __('Add new', 'imap'), 'activate_plugins', 'agencies_form', 'imap_agency_form_page_handler');
    add_submenu_page('agencies', __('Settings', 'imap'), __('Settings', 'imap'), 'manage_options', 'agencies_setting', 'imap_options_page' );
}

add_action('admin_menu', 'imap_agency_admin_menu');
?>