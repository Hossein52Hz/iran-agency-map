<?php
/**
    * PART 2. Defining Custom Table List
    * ============================================================================
    *
    * In this part you are going to define custom table list class,
    * that will display your database records in nice looking table
    *
    * http://codex.wordpress.org/Class_Reference/WP_List_Table
    * http://wordpress.org/extend/plugins/custom-list-table-example/
    */

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

/**
    * iran_agency_map_List_Table class that will display our custom table
    * records in nice table
    */
class iran_agency_map_List_Table extends WP_List_Table
{
    /**
        * [REQUIRED] You must declare constructor and give some basic params
        */
    function __construct()
    {
        global $status, $page;

        parent::__construct(array(
            'singular' => 'agency',
            'plural' => 'agencies',
        ));
    }

    /**
        * [REQUIRED] this is a default column renderer
        *
        * @param $item - row (key, value array)
        * @param $column_name - string (key)
        * @return HTML
        */
    function column_default($item, $column_name)
    {
        return $item[$column_name];
    }

    /**
        * [OPTIONAL] this is example, how to render specific column
        *
        * method name must be like this: "column_[column_name]"
        *
        * @param $item - row (key, value array)
        * @return HTML
        */
    // function column_iran_agency_map_province_name($item)
    // {
    //     return '<em>' . $item['agency_province_name'] . '</em>';
    // }

    /**
        * [OPTIONAL] this is example, how to render column with actions,
        * when you hover row "Edit | Delete" links showed
        *
        * @param $item - row (key, value array)
        * @return HTML
        */
    function column_name($item)
    {
        // links going to /admin.php?page=[your_plugin_page][&other_params]
        // notice how we used $_REQUEST['page'], so action will be done on curren page
        // also notice how we use $this->_args['singular'] so in this example it will
        // be something like &agency=2
        // $actions = array(
        //     'edit' => sprintf('<a href="?page=agencies_form&id=%s">%s</a>', $item['id'], __('Edit', 'iran-agency-map' )),
        //     'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Delete', 'iran-agency-map' )),
        // );

        // return sprintf('%s %s',
        //     $item['agency_province_name'],
        //     $this->row_actions($actions)
        // );
    }

    function column_agency_province_name($item) {
        $actions = array(
            'edit' => sprintf('<a href="?page=agencies_form&id=%s">%s</a>', $item['id'], __('Edit', 'iran-agency-map' )),
            'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Delete', 'iran-agency-map' )),
        );

        return sprintf('%s %s',
            $item['agency_province_name'],
            $this->row_actions($actions)
        );
      }

    /**
        * [REQUIRED] this is how checkbox column renders
        *
        * @param $item - row (key, value array)
        * @return HTML
        */
    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />',
            $item['id']
        );
    }

    /**
        * [REQUIRED] This method return columns to display in table
        * you can skip columns that you do not want to show
        * like content, or description
        *
        * @return array
        */
    function get_columns()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />', //Render a checkbox instead of text
            'agency_province_name' => __('agency_province_name', 'iran-agency-map' ),
            'agency_city_name' =>   __('agency_city_name', 'iran-agency-map' ),
            'agency_name' =>    __('agency_name', 'iran-agency-map' ),
            'agency_full_name' =>   __('agency_full_name', 'iran-agency-map' ),
            'agency_tell' =>    __('agency_tell', 'iran-agency-map' ),
            'agency_mobile' =>  __('agency_mobile', 'iran-agency-map' ),
            'agency_address' => __('agency_address', 'iran-agency-map' ),
            // 'agency_url_logo' =>    __('agency_url_logo', 'iran-agency-map' ),
        );
        return $columns;
    }

    /**
        * [OPTIONAL] This method return columns that may be used to sort table
        * all strings in array - is column names
        * notice that true on name column means that its default sort
        *
        * @return array
        */
    function get_sortable_columns()
    {
        $sortable_columns = array(
            'agency_province_name' => array('agency_province_name',true ),
            'agency_city_name' =>   array('agency_city_name',false ),
            'agency_name' =>    array('agency_name',false ),
            'agency_full_name' =>   array('agency_full_name',false ),
            'agency_tell' =>    array('agency_tell',false ),
            'agency_mobile' =>  array('agency_mobile',false ),
            'agency_address' => array('agency_address',false ),
            // 'agency_url_logo' =>    array('agency_url_logo',false ),
        );
        return $sortable_columns;
    }

    /**
        * [OPTIONAL] Return array of bult actions if has any
        *
        * @return array
        */
    function get_bulk_actions()
    {
        $actions = array(
            'delete' => 'Delete'
        );
        return $actions;
    }

    /**
        * [OPTIONAL] This method processes bulk actions
        * it can be outside of class
        * it can not use wp_redirect coz there is output already
        * in this example we are processing delete action
        * message about successful deletion will be shown on page in next part
        */
    function process_bulk_action()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'imap'; // do not forget about tables prefix

        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
                $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
            }
        }
    }

    /**
        * [REQUIRED] This is the most important method
        *
        * It will get rows from database and prepare them to be showed in table
        */
    function prepare_items()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'imap'; // do not forget about tables prefix

        $per_page = 20; // constant, how much records will be shown per page

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        // here we configure table headers, defined in our methods
        $this->_column_headers = array($columns, $hidden, $sortable);

        // [OPTIONAL] process bulk action if any
        $this->process_bulk_action();

        // will be used in pagination settings
        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");

        // prepare query params, as usual current page, order by and order direction
        $paged = isset($_REQUEST['paged']) ? ($per_page * max(0, intval($_REQUEST['paged']) - 1)) : 0;
        $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'agency_province_name';
        $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'asc';

        // [REQUIRED] define $items array
        // notice that last argument is ARRAY_A, so we will retrieve array
        $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);

        // [REQUIRED] configure pagination
        $this->set_pagination_args(array(
            'total_items' => $total_items, // total items defined above
            'per_page' => $per_page, // per page constant defined at top of method
            'total_pages' => ceil($total_items / $per_page) // calculate pages count
        ));
    }
}