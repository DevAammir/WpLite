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
    'Email' => 'email', // Not a social media platform, but often included in sharing options.
    // Add more as needed.
];

define('WPL_SOCIAL_MEDIA_PLATFORMS', $available_social_media_platforms);


$available_options_array = [
    'wpl_disable_gutenburg' => 'Disable Gutenburg',
    'wpl_enable_social_media' => 'Enable Social Media',
    'wpl_add_woocommerce_support' => 'Add Woocommerce Support',
    'wpl_add_classes_body' => 'Add CSS Classes to body',
    'wpl_error_reporting' => 'Turn error reporting on',
];

define('WPL_AVAILABLE_OPTIONS', $available_options_array);

$fb = new FormBuilder();
define('WPL_FORMBUILDER', $fb);

$wpl_settings = get_option('wpl_settings');
$wpl_socialmedia = get_option('wpl_socialmedia');
define('WPL_SETTINGS', $wpl_settings);
define('WPL_SOCIALMEDIA', $wpl_socialmedia);
