<?php

/* * *********
 * REMOVING UNWANTED SCRIPTS
 */




// Remove unnecessary meta tags
function remove_unnecessary()
{
    remove_action('wp_head', 'wp_generator'); // Remove WordPress version
    remove_action('wp_head', 'wlwmanifest_link'); // Remove Windows Live Writer manifest link
    remove_action('wp_head', 'rsd_link'); // Remove Really Simple Discovery link
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // Remove shortlink

    // Remove adjacent posts links (next and previous)
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');

    // Example of removing specific inline CSS (replace with actual function)
    remove_action('wp_head', 'bs_shortcodes-css');

    // Example of removing specific inline CSS (replace with actual function)
    remove_action('wp_head', 'bs_bootstrap-css');

    // Remove adjacent posts links added by Yoast SEO
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

    // Remove start post link added by Yoast SEO
    remove_action('wp_head', 'start_post_rel_link', 10, 0);

    // Remove feed links (rss, rss2, atom)
    remove_action('wp_head', 'feed_links', 2);

    // Remove additional feed links (comments-rss2, etc.)
    remove_action('wp_head', 'feed_links_extra', 3);

    // Remove parent post link (WordPress adds this for hierarchical post types)
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
}
add_action('init', 'remove_unnecessary');

/*IDENTIFY AND REMOVE
EXAMPLES:
*/
// function remove_inline_css() {
//     // Check if the style was enqueued using wp_enqueue_style
//     wp_dequeue_style('theme-inline-css-handle');
//     wp_deregister_style('theme-inline-css-handle');
// }
// add_action('wp_head', 'remove_inline_css', 1);

// // Remove inline JS added by a theme
// function remove_inline_js() {
//     // Check if the script was enqueued using wp_enqueue_script
//     wp_dequeue_script('theme-inline-js-handle');
//     wp_deregister_script('theme-inline-js-handle');
// }
// add_action('wp_footer', 'remove_inline_js', 1);


/* * *********
 * Removing p Tags
 * * */
//remove_filter ('the_content',  'wpautop');
remove_filter('the_excerpt', 'wpautop');

//remove_filter ('acf_the_field', 'wpautop');
