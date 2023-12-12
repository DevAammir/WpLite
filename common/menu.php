<?php

include(get_template_directory() . '/inc/walker.php');
include(get_template_directory() . '/inc/walker_mobile.php');
add_theme_support('menus');

function register_theme_menus()
{
    foreach (WPL_THEME_SUPPORT_OPTIONS['nav_menu'] as $key => $value) {
        register_nav_menus(
            array($value => _($key))
        );
    }
}
add_action('init', 'register_theme_menus');
