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
        if (isset($_POST['nonce']) && wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__))) {
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
        add_meta_box('agencies_form_meta_box', __('agency form registration', 'imap'), 'imap_agency_agencies_form_meta_box_handler', 'agency', 'normal', 'default');
    
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
    
        <form id="form" class="add-new-agency" method="POST">
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>"/>
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
                <option value="alborz"> <?php _e( 'alborz', 'imap' ); ?> </option>
                <option value="ardabil"> <?php _e( 'ardabil', 'imap' ); ?> </option>
                <option value="east-azerbaijan"> <?php _e( 'east-azerbaijan', 'imap' ); ?> </option>
                <option value="west-azerbaijan"> <?php _e( 'west-azerbaijan', 'imap' ); ?> </option>
                <option value="bushehr"> <?php _e( 'bushehr', 'imap' ); ?> </option>
                <option value="chaharmahal-and-bakhtiari"> <?php _e( 'chaharmahal-and-bakhtiari', 'imap' ); ?> </option>
                <option value="fars"> <?php _e( 'fars', 'imap' ); ?> </option>
                <option value="gilan"> <?php _e( 'gilan', 'imap' ); ?> </option>
                <option value="golestan"> <?php _e( 'golestan', 'imap' ); ?> </option>
                <option value="hamadan"> <?php _e( 'hamadan', 'imap' ); ?> </option>
                <option value="hormozgan"> <?php _e( 'hormozgan', 'imap' ); ?> </option>
                <option value="ilam"> <?php _e( 'ilam', 'imap' ); ?> </option>
                <option value="isfahan"> <?php _e( 'isfahan', 'imap' ); ?> </option>
                <option value="kerman"> <?php _e( 'kerman', 'imap' ); ?> </option>
                <option value="kermanshah"> <?php _e( 'kermanshah', 'imap' ); ?> </option>
                <option value="north-khorasan"> <?php _e( 'north-khorasan', 'imap' ); ?> </option>
                <option value="khorasan-razavi"> <?php _e( 'khorasan-razavi', 'imap' ); ?> </option>
                <option value="south-khorasan"> <?php _e( 'south-khorasan', 'imap' ); ?> </option>
                <option value="khuzestan"> <?php _e( 'khuzestan', 'imap' ); ?> </option>
                <option value="kohgiluyeh-and-boyer-ahmad"> <?php _e( 'kohgiluyeh-and-boyer-ahmad', 'imap' ); ?> </option>
                <option value="kurdistan"> <?php _e( 'kurdistan', 'imap' ); ?> </option>
                <option value="lorestan"> <?php _e( 'lorestan', 'imap' ); ?> </option>
                <option value="markazi"> <?php _e( 'markazi', 'imap' ); ?> </option>
                <option value="mazandaran"> <?php _e( 'mazandaran', 'imap' ); ?> </option>
                <option value="qazvin"> <?php _e( 'qazvin', 'imap' ); ?> </option>
                <option value="qom"> <?php _e( 'qom', 'imap' ); ?> </option>
                <option value="semnan"> <?php _e( 'semnan', 'imap' ); ?> </option>
                <option value="sistan-baluchestan"> <?php _e( 'sistan-baluchestan', 'imap' ); ?> </option>
                <option value="tehran"> <?php _e( 'tehran', 'imap' ); ?> </option>
                <option value="yazd"> <?php _e( 'yazd', 'imap' ); ?> </option>
                <option value="zanjan"> <?php _e( 'zanjan', 'imap' ); ?> </option>
                <!-- <option value="caspian"> <?php _e( 'caspian', 'imap' ); ?> </option>
                <option value="persian-gulf"> <?php _e( 'persian-gulf', 'imap' ); ?> </option>
                <option value="urmia"> <?php _e( 'urmia', 'imap' ); ?> </option> -->
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
            <input id="agency-address" name="agency_address" type="text" style="width: 95%" value="<?php echo esc_attr($item['agency_address'])?>"
                     class="code" placeholder="<?php _e('agency address', 'imap')?>" >
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