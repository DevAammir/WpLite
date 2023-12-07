<?php
/* * *
 * CUSTOM SEARCH FORM FOR THE WEBSITE
 * * */
function wpl_search_form()
{
    ob_start(); ?>
    <form class="form-inline" action="<?php echo esc_url(home_url('/')); ?>">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>
<?php $html = ob_get_clean();
    return $html;
}

/* * *
 * FILTER TO ADD FORM TO LAST li OF nav
 * * */
add_filter('wp_nav_menu_items', 'add_search_box_to_primary_menu', 10, 2);
function add_search_box_to_primary_menu($items, $args)
{
    if ($args->theme_location == 'primary_menu') {
        $items .= '<li class="nav-item">';
        $items .= wpl_search_form();
        $items .= '</li>';
    }
    return $items;
}
