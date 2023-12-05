<?php 

function theme_enqueue_scripts()
{
    //css
    wp_register_style('Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css');
    wp_enqueue_style('Font_Awesome');

    wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap');

    wp_register_style('theme-style', get_template_directory_uri() . '/css/theme.css');
    wp_enqueue_style('theme-style');

    wp_register_style('style-css', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('style-css');

    //js
    wp_enqueue_script('jquery');
    // wp_register_script('bootstrap', get_template_directory_uri() . '', array('jquery'));
    wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('bootstrap');

    wp_enqueue_script('functions-handle', get_template_directory_uri() . '/js/functions.js', array('jquery'));
}
if (!is_admin()) :
    add_action('init', 'theme_enqueue_scripts');
endif;