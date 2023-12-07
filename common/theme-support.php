<?php

/**ADD CSS CLASS TO BODY
 **/
function custom_body_classes($classes)
{
    global $post;

    if (isset($post) && !is_null($post)) {
        // Add post type and post name
        $classes[] = $post->post_type . '-' . $post->post_name;

        // Add category IDs
        foreach ((get_the_category($post->ID)) as $category) {
            $classes[] = 'cat-' . $category->cat_ID . '-id';
        }

        // Add custom post type
        if (is_singular() && get_post_type() !== 'post') {
            $classes[] = 'post-type-' . get_post_type();
        }

        // Add taxonomy
        $taxonomies = get_post_taxonomies($post->ID);
        foreach ($taxonomies as $taxonomy) {
            $terms = get_the_terms($post->ID, $taxonomy);
            if ($terms) {
                foreach ($terms as $term) {
                    $classes[] = 'taxonomy-' . $taxonomy . '-' . $term->slug;
                }
            }
        }

        // Check if it's a custom page template
        $page_template = get_page_template_slug();
        if ($page_template) {
            $template_name = pathinfo($page_template, PATHINFO_FILENAME);
            $classes[] = 'page-template-' . sanitize_html_class($template_name);
        }
    }

    // Add other checks as needed

    return $classes;
}

if (!is_404()) {
    add_filter('body_class', 'custom_body_classes');
}


/* * *********
 * DISABLING GUTENBURG 
 */

add_filter('use_block_editor_for_post', '__return_false', 10);
add_theme_support('block-templates');
// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter('gutenberg_use_widgets_block_editor', '__return_false');
// Disables the block editor from managing widgets.
add_filter('use_widgets_block_editor', '__return_false');




/* * *********
 * WIDGETS
 */

function create_widget($name, $id, $description)
{
    register_sidebar(array(
        'name' => __($name),
        'id' => $id,
        'description' => __($description),
        'before_widget' => '',
        'after_widget' => '',
        //            'before_title' => '',
        //            'after_title' => ''
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));
}

//create_widget( 'Default Header Right', 'default_header_right', 'On the right side of the header' );

create_widget('Page Sidebar', 'page', 'Appears on the side of pages with a sidebar');
create_widget('Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section');
create_widget('Work Sidebar', 'work', 'Displays on the side of pages in the work section');
create_widget('Service Sidebar', 'service', 'Displays on the side of pages in the service section');


create_widget(' Footer 1', 'footer_1', '');
create_widget(' Footer 2', 'footer_2', '');
create_widget(' Footer 3', 'footer_3', '');
create_widget(' Footer 4', 'footer_4', '');

/* Disable WordPress Admin Bar for all users but admins. */
add_filter('show_admin_bar', '__return_false');

/* * *********
 * ADDING FEATURED IMAGE THEME SUPPORT
 */
add_theme_support('post-thumbnails');


/**
 * Adds WooCommerce support to the theme.
 *
 * @throws None
 * @return void
 */
function wpl_add_woocommerce_support()
{
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ));
}
add_action('after_setup_theme', 'wpl_add_woocommerce_support');
