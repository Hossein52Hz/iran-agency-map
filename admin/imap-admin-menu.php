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
function iran_agency_map_admin_menu()
{
    add_menu_page(__('agencies', 'iran-agency-map' ), __('agencies', 'iran-agency-map' ), 'activate_plugins', 'agencies', 'iran_agency_map_agencies_page_handler');
    add_submenu_page('agencies', __('agencies', 'iran-agency-map' ), __('agencies', 'iran-agency-map' ), 'activate_plugins', 'agencies', 'iran_agency_map_agencies_page_handler');
    add_submenu_page('agencies', __('Add new', 'iran-agency-map' ), __('Add new', 'iran-agency-map' ), 'activate_plugins', 'agencies_form', 'iran_agency_map_form_page_handler');
    add_submenu_page('agencies', __('Settings', 'iran-agency-map' ), __('Settings', 'iran-agency-map' ), 'manage_options', 'agencies_setting', 'iran_agency_map_options_page' );
}

add_action('admin_menu', 'iran_agency_map_admin_menu');