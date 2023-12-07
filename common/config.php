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
    'logo' => 'wp_upload',
    // 'logo_max-width' => 'text',
    // 'logo_max-height' => 'text',
    'favicon' => 'wp_upload',
    'address' => 'textarea',
    'map' => 'textarea',
    'website_desc' => 'textarea',
    'author_desc' => 'textarea',
];


 


define('WPL_AVAILABLE_OPTIONS', $available_options_array);
define('WPL_AVAILABLE_FEATURES', $theme_features_array);

$fb = new FormBuilder();
define('WPL_FORMBUILDER', $fb);

$wpl_settings = get_option('wpl_settings');
$wpl_socialmedia = get_option('wpl_socialmedia');

define('WPL_SETTINGS', $wpl_settings);
define('WPL_SOCIALMEDIA', $wpl_socialmedia); 
