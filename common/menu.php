<?php 

include(get_template_directory() . '/inc/walker.php');
include(get_template_directory() . '/inc/walker_mobile.php');
add_theme_support('menus');

function register_theme_menus()
{
    register_nav_menus(
        array('primary_menu' => _('Primary Menu'))
    );
    register_nav_menus(
        array('secondary_menu' => _('Secondary Menu'))
    );
}
add_action('init', 'register_theme_menus');