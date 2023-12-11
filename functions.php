<?php
$textdomain = 'wpl';
define('TD', $textdomain);

/***********************
 *  ADDITIONAL SUPPORT
 **********************/

include 'common/form-builder.php';

/***********************
 *  SETTINGS
 **********************/
include_once 'common/config.php';
include_once 'admin/admin.php';

/********************  
 * enqueue CSS AND JS 
 *********************/
include_once 'common/enqueue.php';
/********************** 
 * ADD MENU 
 **********************/
include_once 'common/menu.php';

/********************** 
 * THEME SUPPORT
 **********************/
include_once 'common/theme-support.php';
/********************** 
 * ADMIN SCRIPTS 
 **********************/
 include_once 'common/admin-scripts.php';
/********************** 
 * CUSTOM SERCH FORM 
 **********************/
add_shortcode('wpl_search', 'custom_serach_form');
/********************** 
 * REMOVE UNWANTED SCRIPTS 
 **********************/
include_once 'common/remove-unwanted.php'; 
/***********************
 *  SHORTCODES
 **********************/
include_once 'common/shortcodes.php'; 
/***********************
 *  FEATURES
 **********************/
include_once 'common/features.php';

define('WPL_AJAX', admin_url('admin-ajax.php'));

/***********************
 *  CUSTOM FUNCTIONS
 **********************/
include_once 'inc/custom_functions.php';

