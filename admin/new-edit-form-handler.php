<?php
/**
    * PART 4. Form for adding andor editing row
    * ============================================================================
    *
    * In this part you are going to add admin page for adding andor editing items
    * You cant put all form into this function, but in this example form will
    * be placed into meta box, and if you want you can split your form into
    * as many meta boxes as you want
    *
    * http://codex.wordpress.org/Data_Validation
    * http://codex.wordpress.org/Function_Reference/selected
    */

/**
    * Form page handler checks is there some data posted and tries to save it
    * Also it renders basic wrapper in which we are callin meta box render
    */
    function imap_agency_form_page_handler()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'imap'; // do not forget about tables prefix
    
        $message = '';
        $notice = '';
    
        // this is default $item which will be used for new records
        $default = array(
            'id' => 0,
            'agency_province_name' => '',
            'agency_city_name' => '',
            'agency_name' => '',
            'agency_full_name' => '',
            'agency_tell' => '',
            'agency_mobile' => '',
            'agency_address' => '',
            'agency_url_logo' => '',
        );
    
        // here we are verifying does this request is post back and have correct nonce
        if (wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__))) {
            // combine our default item with request params
            $item = shortcode_atts($default, $_REQUEST);
            // validate data, and if all ok save item to database
            // if id is zero insert otherwise update
            $item_valid = imap_agency_validate_agency($item);
            if ($item_valid === true) {
                if ($item['id'] == 0) {
                    $result = $wpdb->insert($table_name, $item);
                    $item['id'] = $wpdb->insert_id;
                    if ($result) {
                        $message = __('Item was successfully saved', 'imap');
                    } else {
                        $notice = __('There was an error while saving item', 'imap');
                    }
                } else {
                    $result = $wpdb->update($table_name, $item, array('id' => $item['id']));
                    if ($result) {
                        $message = __('Item was successfully updated', 'imap');
                    } else {
                        $notice = __('There was an error while updating item', 'imap');
                    }
                }
            } else {
                // if $item_valid not true it contains error message(s)
                $notice = $item_valid;
            }
        }
        else {
            // if this is not post back we load item to edit or give new one to create
            $item = $default;
            if (isset($_REQUEST['id'])) {
                $item = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $_REQUEST['id']), ARRAY_A);
                if (!$item) {
                    $item = $default;
                    $notice = __('Item not found', 'imap');
                }
            }
        }
    
        // here we adding our custom meta box
        add_meta_box('agencies_form_meta_box', 'agency data', 'imap_agency_agencies_form_meta_box_handler', 'agency', 'normal', 'default');
    
        ?>
    <div class="wrap">
        <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
        <h2><?php _e('agency', 'imap')?> <a class="add-new-h2"
                                    href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=agencies');?>"><?php _e('back to list', 'imap')?></a>
        </h2>
    
        <?php if (!empty($notice)): ?>
        <div id="notice" class="error"><p><?php echo $notice ?></p></div>
        <?php endif;?>
        <?php if (!empty($message)): ?>
        <div id="message" class="updated"><p><?php echo $message ?></p></div>
        <?php endif;?>
    
        <form id="form" method="POST">
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>
            <?php /* NOTICE: here we storing id to determine will be item added or updated */ ?>
            <input type="hidden" name="id" value="<?php echo $item['id'] ?>"/>
    
            <div class="metabox-holder" id="poststuff">
                <div id="post-body">
                    <div id="post-body-content">
                        <?php /* And here we call our custom meta box */ ?>
                        <?php do_meta_boxes('agency', 'normal', $item); ?>
                        <input type="submit" value="<?php _e('Save', 'imap')?>" id="submit" class="button-primary" name="submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    }
    
    /**
        * This function renders our custom meta box
        * $item is row
        *
        * @param $item
        */
    function imap_agency_agencies_form_meta_box_handler($item)
    {
        ?>
    
    <table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
        <tbody>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="agency-province-name"><?php _e('agency province name', 'imap')?></label>
            </th>
            <td>
        <select id="agency-province-name" name="agency_province_name" style="width: 95%" value="<?php echo esc_attr($item['agency_province_name'])?>"
              class="code">
              <option value="<?php _e( 'alborz', 'imap' ); ?>" > <?php _e( 'alborz', 'imap' ); ?></option> 
                <option value="<?php _e( 'ardabil', 'imap' ); ?>" > <?php _e( 'ardabil', 'imap' ); ?></option> 
                <option value="<?php _e( 'east-azerbaijan', 'imap' ); ?>" > <?php _e( 'east-azerbaijan', 'imap' ); ?></option> 
                <option value="<?php _e( 'west-azerbaijan', 'imap' ); ?>" > <?php _e( 'west-azerbaijan', 'imap' ); ?></option> 
                <option value="<?php _e( 'bushehr', 'imap' ); ?>" > <?php _e( 'bushehr', 'imap' ); ?></option> 
                <option value="<?php _e( 'chaharmahal-and-bakhtiari', 'imap' ); ?>" > <?php _e( 'chaharmahal-and-bakhtiari', 'imap' ); ?></option> 
                <option value="<?php _e( 'fars', 'imap' ); ?>" > <?php _e( 'fars', 'imap' ); ?></option> 
                <option value="<?php _e( 'gilan', 'imap' ); ?>" > <?php _e( 'gilan', 'imap' ); ?></option> 
                <option value="<?php _e( 'golestan', 'imap' ); ?>" > <?php _e( 'golestan', 'imap' ); ?></option> 
                <option value="<?php _e( 'hamadan', 'imap' ); ?>" > <?php _e( 'hamadan', 'imap' ); ?></option> 
                <option value="<?php _e( 'hormozgan', 'imap' ); ?>" > <?php _e( 'hormozgan', 'imap' ); ?></option> 
                <option value="<?php _e( 'ilam', 'imap' ); ?>" > <?php _e( 'ilam', 'imap' ); ?></option> 
                <option value="<?php _e( 'isfahan', 'imap' ); ?>" > <?php _e( 'isfahan', 'imap' ); ?></option> 
                <option value="<?php _e( 'kerman', 'imap' ); ?>" > <?php _e( 'kerman', 'imap' ); ?></option> 
                <option value="<?php _e( 'kermanshah', 'imap' ); ?>" > <?php _e( 'kermanshah', 'imap' ); ?></option> 
                <option value="<?php _e( 'north-khorasan', 'imap' ); ?>" > <?php _e( 'north-khorasan', 'imap' ); ?></option> 
                <option value="<?php _e( 'khorasan-razavi', 'imap' ); ?>" > <?php _e( 'khorasan-razavi', 'imap' ); ?></option> 
                <option value="<?php _e( 'south-khorasan', 'imap' ); ?>" > <?php _e( 'south-khorasan', 'imap' ); ?></option> 
                <option value="<?php _e( 'khuzestan', 'imap' ); ?>" > <?php _e( 'khuzestan', 'imap' ); ?></option> 
                <option value="<?php _e( 'kohgiluyeh-and-boyer-ahmad', 'imap' ); ?>" > <?php _e( 'kohgiluyeh-and-boyer-ahmad', 'imap' ); ?></option> 
                <option value="<?php _e( 'kurdistan', 'imap' ); ?>" > <?php _e( 'kurdistan', 'imap' ); ?></option> 
                <option value="<?php _e( 'lorestan', 'imap' ); ?>" > <?php _e( 'lorestan', 'imap' ); ?></option> 
                <option value="<?php _e( 'markazi', 'imap' ); ?>" > <?php _e( 'markazi', 'imap' ); ?></option> 
                <option value="<?php _e( 'mazandaran', 'imap' ); ?>" > <?php _e( 'mazandaran', 'imap' ); ?></option> 
                <option value="<?php _e( 'qazvin', 'imap' ); ?>" > <?php _e( 'qazvin', 'imap' ); ?></option> 
                <option value="<?php _e( 'qom', 'imap' ); ?>" > <?php _e( 'qom', 'imap' ); ?></option> 
                <option value="<?php _e( 'semnan', 'imap' ); ?>" > <?php _e( 'semnan', 'imap' ); ?></option> 
                <option value="<?php _e( 'sistan-baluchestan', 'imap' ); ?>" > <?php _e( 'sistan-baluchestan', 'imap' ); ?></option> 
                <option value="<?php _e( 'tehran', 'imap' ); ?>" > <?php _e( 'tehran', 'imap' ); ?></option> 
                <option value="<?php _e( 'yazd', 'imap' ); ?>" > <?php _e( 'yazd', 'imap' ); ?></option> 
                <option value="<?php _e( 'zanjan', 'imap' ); ?>" > <?php _e( 'zanjan', 'imap' ); ?></option> 
                <option value="<?php _e( 'caspian', 'imap' ); ?>" > <?php _e( 'caspian', 'imap' ); ?></option> 
                <option value="<?php _e( 'persian-gulf', 'imap' ); ?>" > <?php _e( 'persian-gulf', 'imap' ); ?></option> 
                <option value="<?php _e( 'urmia', 'imap' ); ?>" > <?php _e( 'urmia', 'imap' ); ?></option> 
            </select>
               
            </td>
        </tr>
    
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="agency-city-name"><?php _e('agency city name', 'imap')?></label>
            </th>
            <td>
                <input id="agency-city-name" name="agency_city_name" type="text" style="width: 95%" value="<?php echo esc_attr($item['agency_city_name'])?>"
                        size="50" class="code" placeholder="<?php _e('agency city name', 'imap')?>" required>
            </td>
        </tr>
    
        <tr class="form-field">
        <th valign="top" scope="row">
            <label for="agency-name"><?php _e('agency name', 'imap')?></label>
        </th>
        <td>
            <input id="agency-name" name="agency_name" type="text" style="width: 95%" value="<?php echo esc_attr($item['agency_name'])?>"
                    size="50" class="code" placeholder="<?php _e('agency name', 'imap')?>" required>
        </td>
    </tr>
    
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="agency-full-name"><?php _e('agency full-name', 'imap')?></label>
        </th>
        <td>
            <input id="agency-full-name" name="agency_full_name" type="text" style="width: 95%" value="<?php echo esc_attr($item['agency_full_name'])?>"
                    size="50" class="code" placeholder="<?php _e('agency full-name', 'imap')?>" required>
        </td>
    </tr>
    
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="agency-tell"><?php _e('agency tell', 'imap')?></label>
        </th>
        <td>
            <input id="agency-tell" name="agency_tell" type="text" style="width: 95%" value="<?php echo esc_attr($item['agency_tell'])?>"
                    size="50" class="code" placeholder="<?php _e('agency tell', 'imap')?>" required>
        </td>
    </tr>
    
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="agency-mobile"><?php _e('agency mobile', 'imap')?></label>
        </th>
        <td>
            <input id="agency-mobile" name="agency_mobile" type="text" style="width: 95%" value="<?php echo esc_attr($item['agency_mobile'])?>"
                    size="50" class="code" placeholder="<?php _e('agency mobile', 'imap')?>" required>
        </td>
    </tr>
    
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="agency-address"><?php _e('agency address', 'imap')?></label>
        </th>
        <td>
            <textarea id="agency-address" name="agency_address" type="textarea" style="width: 95%" value="<?php echo esc_attr($item['agency_address'])?>"
                     class="code" placeholder="<?php _e('agency address', 'imap')?>" required> </textarea>
        </td>
    </tr>
    
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="agency-url-logo"><?php _e('agency url logo', 'imap')?></label>
        </th>
        <td>
        <input type="text" name="agency_url_logo" id="agency-url-logo" class="code" value="<?php echo esc_attr($item['agency_url_logo'])?>">
    <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
            
        </td>
    </tr>
    
    <?php
    // jQuery
    wp_enqueue_script('jquery');
    // This will enqueue the Media Uploader script
    wp_enqueue_media();
    ?>  
    
    <script type="text/javascript">
    jQuery(document).ready(function($){
        $('#upload-btn').click(function(e) {
            e.preventDefault();
            var image = wp.media({ 
                title: 'Upload Image',
                // mutiple: true if you want to upload multiple files at once
                multiple: false
            }).open()
            .on('select', function(e){
                // This will return the selected image from the Media Uploader, the result is an object
                var uploaded_image = image.state().get('selection').first();
                // We convert uploaded_image to a JSON object to make accessing it easier
                // Output to the console uploaded_image
                console.log(uploaded_image);
                var image_url = uploaded_image.toJSON().url;
                // Let's assign the url value to the input field
                $('#agency-url-logo').val(image_url);
            });
        });
    });
    </script>
    <?php
    // UPLOAD ENGINE
    function load_wp_media_files() {
        wp_enqueue_media();
    }
    add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );
    
    ?>
        </tbody>
    </table>
    <?php
    }
    
    /**
        * Simple function that validates data and retrieve bool on success
        * and error message(s) on error
        *
        * @param $item
        * @return bool|string
        */
    function imap_agency_validate_agency($item)
    {
        $messages = array();
    
        if (empty($item['agency_province_name'])) $messages[] = __('agency province name is required', 'imap');
        // if (!empty($item['email']) && !is_email($item['email'])) $messages[] = __('E-Mail is in wrong format', 'imap');
        // if (!ctype_digit($item['age'])) $messages[] = __('Age in wrong format', 'imap');
        //if(!empty($item['age']) && !absint(intval($item['age'])))  $messages[] = __('Age can not be less than zero');
        //if(!empty($item['age']) && !preg_match('/[0-9]+/', $item['age'])) $messages[] = __('Age must be number');
        //...
    
        if (empty($messages)) return true;
        return implode('<br />', $messages);
    }
?>