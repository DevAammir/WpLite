<?php 

function show_phone()
{
    global $options;
    return $options['phone'] . '!';
}

add_shortcode('phone', 'show_phone');

function show_email()
{
    global $options;
    return $options['email'];
}

add_shortcode('site_email', 'show_email');

function show_addr()
{
    global $options;
    return $options['address'];
}

add_shortcode('address', 'show_addr');

function show_map()
{
    global $options;
    return $options['map'];
}

add_shortcode('map', 'show_map');

/**
 * SOCIAL MEDIA LINKS SHORTCODES 
 * * */
function fb()
{
    global $options;
    return $options['facebook'];
}

add_shortcode('facebook', 'fb');

function tw()
{
    global $options;
    return $options['twitter'];
}

add_shortcode('twitter', 'tw');

function instagram()
{
    global $options;
    return $options['instagram'];
}

add_shortcode('instagram', 'instagram');

function pinterest()
{
    global $options;
    return $options['pinterest'];
}

add_shortcode('pinterest', 'pinterest');

function youtube()
{
    global $options;
    return $options['youtube'];
}

add_shortcode('youtube', 'youtube');