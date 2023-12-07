<?php 

/* * *********
 * REMOVING UNWANTED SCRIPTS
 */

 remove_action('wp_head', 'wp_generator');
 remove_action('wp_head', 'rsd_link');
 remove_action('wp_head', 'wlwmanifest_link');
 remove_action('wp_head', 'wp_generator');
 remove_action('wp_head', 'start_post_rel_link');
 remove_action('wp_head', 'index_rel_link');
 remove_action('wp_head', 'adjacent_posts_rel_link');
 remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
 remove_action('wp_head', 'bs_shortcodes-css');
 remove_action('wp_head', 'bs_bootstrap-css');
 remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
 remove_action('wp_head', 'start_post_rel_link', 10, 0);
 remove_action('wp_head', 'feed_links', 2);
 remove_action('wp_head', 'feed_links_extra', 3);
 remove_action('wp_head', 'parent_post_rel_link', 10, 0);


 /* * *********
 * Removing p Tags
 * * */
//remove_filter ('the_content',  'wpautop');
remove_filter('the_excerpt', 'wpautop');

//remove_filter ('acf_the_field', 'wpautop');
