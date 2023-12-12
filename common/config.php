<?php
// define('WPL_AJAX', admin_url('admin-ajax.php'));
$available_social_media_platforms = [
    'Facebook' => 'facebook',
    'Twitter' => 'twitter',
    'LinkedIn' => 'linkedin',
    // 'Pinterest' => 'pinterest',
    'Reddit' => 'reddit',
    'Tumblr' => 'tumblr',
    'Instagram' => 'instagram',
    // 'Snapchat' => 'snapchat',
    'YouTube' => 'youtube',
    'Vimeo' => 'vimeo',
    // 'Telegram' => 'telegram',
    'WhatsApp' => 'whatsapp',
    'Email' => 'site_email', // Not a social media platform, but often included in sharing options.
    'Phone' => 'phone',
];

define('WPL_SOCIAL_MEDIA_PLATFORMS', $available_social_media_platforms);


$available_options_array = [
     'wpl_excerpt_length' => 'text',
];


$theme_features_array = [
    'site_logo' => 'wp_upload',
    // 'logo_max-width' => 'text',
    // 'logo_max-height' => 'text',
    'favicon' => 'wp_upload',
    'address' => 'textarea',
    'map' => 'textarea',
    'website_desc' => 'textarea',
    'author_desc' => 'textarea',
];

$theme_support_array['widgets'] =  [
    'Header' => 'header', 
    'Page Sidebar' => 'page', 
    'Blog Sidebar' => 'blog', 
    'Footer One' => 'footer_1', 
    'Footer Two' => 'footer_2',
    'Footer Three' => 'footer_3',
    'Footer Four' => 'footer_4'
];
$theme_support_array['nav_menu'] =  [
    'Primary Menu' => 'primary_menu', 
    'Secondary Menu' => 'secondary_menu', 
    'Footer Menu' => 'footer_menu'
];

// $theme_support_array['cpts'] = [];

define('WPL_AVAILABLE_OPTIONS', $available_options_array);
define('WPL_AVAILABLE_FEATURES', $theme_features_array);

$fb = new FormBuilder();
define('FORMBUILDER', $fb);

$wpl_settings = get_option('wpl_settings');
$wpl_socialmedia = get_option('wpl_socialmedia');

define('WPL_SETTINGS', $wpl_settings);
define('WPL_SOCIALMEDIA', $wpl_socialmedia); 


define('WPL_THEME_SUPPORT_OPTIONS',$theme_support_array);