<?php


// Add a menu item to the WordPress admin menu
function wpl_admin_menu()
{
    add_menu_page(
        'WPLite',  // Page title
        'WPLite',       // Menu title
        'manage_options',     // Capability required to access
        'wpl-admin',  // Menu slug
        'wpl_admin_page',  // Callback function to render the page
        'dashicons-media-document',  // Icon for the menu item (change as needed)
        100  // Menu position
    );
}
add_action('admin_menu', 'wpl_admin_menu', 1);

// Render the custom admin page
function wpl_admin_page()
{
    // pd(wpl_SOCIALMEDIA);
?>
    <div id="admin_page" class="wrap">
        <h2>WPLite Admin</h2>
        <div class="clearfix">&nbsp;</div>

        <form method="post" action="#" id="wpl_save_settings_form">
            <ul class="tabs">
                <li class="tab " onclick="showContent('tab1', this);">Basic Settings</li>

                <li class="tab" id="social_media_tab" onclick="showContent('tab2', this);">Social Media</li>

                <li class="tab" onclick="showContent('tab3', this);">Available Functions/Features List</li>
                <!-- <li class="tab" onclick="showContent('tab3', this);">Tab 3</li> -->
            </ul>



            <div id="tab1" class="content active">
                <?php
                include_once('pages/basic-settings.php');
                ?>
            </div>

            <div id="tab2" id="social_media_tab_content" class="content">
                <?php
                include_once('pages/social-media.php');
                ?>
            </div>


            <div id="tab3" id="available_features" class="content">
                <h2>Available Features List</h2>
                <?php
                include_once('pages/features-list.php');
                ?>
            </div>

            <!-- <div id="tab3" class="content">
                <h2>Content for Tab 3</h2>
                <p>This is the content for tab 3.</p>
            </div> -->
            <?php
            FORMBUILDER->field([
                'type' => 'button',
                'label' => 'Save Settings',
                'name' => 'wpl_save_settings',
                'id' => 'wpl_save_settings',
                'class' => 'button button-primary',
            ]); ?>
        </form>
        <div class="clearfix" id="target">
            <div id="loader" style="display: none;">&nbsp;</div>
        </div>
    </div>
    <?php include_once 'script.php'; ?>
<?php
}

/***
 * SET VALUES
 * ***/
add_action("wp_ajax_wpl_save_settings", "wpl_save_settings");
add_action("wp_ajax_nopriv_wpl_save_settings", "wpl_save_settings");
function wpl_save_settings()
{
    ob_start();
    $wpl_settings = [];
    $wpl_socialmedia = [];
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'sm_') === 0) {
            $wpl_socialmedia[$key] = $value;
        } else {
            $wpl_settings[$key] = $value;
        }
    }

    update_option('wpl_settings', $wpl_settings);
    update_option('wpl_socialmedia', $wpl_socialmedia);
?>
    <div id="setting-error-settings_updated" class="notice notice-success  is-dismissible">
        <p><strong>Settings updated.</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
    </div>
<?php

    $result = ob_get_clean();
    $status = 200;
    $message = 'Success';
    $return = json_encode(array('result' => $result, 'status' => $status, 'message' => $message, 'request' => $_REQUEST, 'args' => $args));
    echo $return;
    exit;
}
