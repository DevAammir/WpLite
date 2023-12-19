<?php
////////////////////////////
////||UPLOAD LOGO
////////////////////////////
//function themeslug_theme_customizer( $wp_customize ) {
/* First, we'll create a new section for our logo upload. Note that the description will not be displayed when using the Theme Customizer; it is simply used for the section heading's title attribute. */
/* $wp_customize->add_section( 'themeslug_logo_section' , array(
  'title'       => __( 'Logo', 'themeslug' ),
  'priority'    => 30,
  'description' => 'Upload a logo to replace the default site name and description in the header',
  ) ); */
/* Next, we register our new setting. It doesn't get any easier than this: */
//$wp_customize->add_setting( 'themeslug_logo' );
/* Lastly, we tell the Theme Customizer to let us use an image uploader for setting our logo: */
/* $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
  'label'    => __( 'Logo', 'themeslug' ),
  'section'  => 'themeslug_logo_section',
  'settings' => 'themeslug_logo',
  ) ) ); */

//}

/* * ***
 * * ADDING BLOG HOME TO NAVIGATION IF CREATING BLOG
 * * */

function childtheme_menu_args($args)
{
    $args = array(
        'show_home' => 'Home',
        'sort_column' => 'menu_order',
        'menu_class' => 'menu',
        'echo' => true
    );
    return $args;
}

add_filter('wp_page_menu_args', 'childtheme_menu_args');

////////////////////////////
// ESCAPE HTML ENTITIES IN COMMENTS
///////////////////////////
function encode_code_in_comment($source)
{
    $encoded = preg_replace_callback('/<code>(.*?)<\/code>/ims', function ($matches) {
        $matches[1] = preg_replace(array("/^[\r|\n]+/i", "/[\r|\n]+$/i"), "", $matches[1]); 
        return "<code>" . htmlentities($matches[1]) . "</code>";
    }, $source);

    return $encoded !== null ? $encoded : $source;
}

add_filter('pre_comment_content', 'encode_code_in_comment');

/**
 * Display the formatted date for a given post.
 *
 * @param int $id The ID of the post.
 * @throws None
 * @return void
 */
function _wpl_display_date($id)
{
    $post_date = get_the_date('j F, Y', $id);
    $day_link = get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));
    $month_link = get_month_link(get_post_time('Y'), get_post_time('m'));
    $year_link = get_year_link(get_post_time('Y')); ?>
    <span class="date-full"><a class="date-day" href="<?php echo esc_url($day_link); ?>"> <?php echo get_the_date('j'); ?> </a> <a class="date-month" href="<?php echo esc_url($month_link); ?>"> <?php echo get_the_date('F'); ?></a>, <a class="date-year" href="<?php echo esc_url($year_link); ?>"> <?php echo get_the_date('Y'); ?></a> </span>
<?php
}

function _wpl_author_info()
{
    // Get author information
    $author_id = get_the_author_meta('ID');
    $author_name = get_the_author();
    $author_email = get_the_author_meta('user_email');
    $author_description = get_the_author_meta('description');
    $author_url = get_author_posts_url($author_id);
    echo '<a class="the_author" href="' . esc_url($author_url) . '">' . esc_html($author_name) . '</a>';
}



/**
 * Display debugging information in a formatted HTML block.
 *
 * @param mixed $data The data to be displayed.
 * @param mixed $exit (optional) If set, the function will exit after displaying the data.
 * @throws None
 * @return None
 */

function pd($data, $exit = null)
{
?>
    <div class="row my-4" style="z-index:99999;">
        <pre>TESTING MODE</pre>
        <pre>
        <?php print_r($data); ?> 
    </pre>
    </div>
    <?php
    if (isset($exit)) {
        exit;
    }
}




function the_post_views()
{

    $postID = get_the_ID();
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    } else {
        $count++;
        update_post_meta($postID, $countKey, $count);
    }

    $views = get_post_meta($postID, $countKey, true);
    echo $views;
}

/* * *********
 * NUMBERED PAGINATION
 */
function wplight_pagination()
{
    echo "<style>  .pagination a, .pagination span {    position: relative;    float: left;    padding: 6px 12px;    margin-left: -1px;    line-height: 1.42857143;    color: #337ab7;    text-decoration: none;    background-color: #fff;    border: 1px solid #ddd;}</style>";
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    echo '<ul class="pagination">' . paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    )) . '</ul>';
}

function custom_serach_form()
{
    ?>
    <form role="search" method="get" class="search-form wpl-search-form" action="<?php echo home_url('/'); ?>">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Type Something...." value="<?php echo get_search_query() ?>" name="s">
            <div class="input-group-append">
                <button class="btn button" type="submit">Search</button>
            </div>
        </div>
    </form>
    <?php
}

/* CUSTOM EXCERPT LENGTH */

function custom_excerpt_length($excerpt) {
    $wpl_excerpt_length = !empty(WPL_SETTINGS['wpl_excerpt_length']) ? WPL_SETTINGS['wpl_excerpt_length'] : 0; 
    $excerpt = wp_trim_words($excerpt, $wpl_excerpt_length); 
    $excerpt = preg_replace('/(?:\W|&hellip;)+$/', '', $excerpt);  
    return $excerpt;
}

add_filter('get_the_excerpt', 'custom_excerpt_length');







function wpl_related_posts()
{
    global $post;

    // Get post tags
    $post_tags = wp_get_post_tags($post->ID);

    // If there are tags, get related posts
    if ($post_tags) {
        $tag_ids = array();
        foreach ($post_tags as $tag) {
            $tag_ids[] = $tag->term_id;
        }

        $args = array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page' => -1, // Display all related posts
            'ignore_sticky_posts' => 1,
            'orderby' => 'rand', // You can change the orderby parameter as needed
        );

        $related_query = new WP_Query($args);

        // Start output buffering
        ob_start();

        // Display related posts cards
        if ($related_query->have_posts()) {
    ?>
            <div id="related-posts-cards" class="row">
                <div class="col-md-12">
                    <?php
                    $custom_post_type = get_post_type(); // Replace this with the actual custom post type variable or name

                    $post_type_object = get_post_type_object($custom_post_type);

                    if ($post_type_object) {
                        $post_type_name = $post_type_object->labels->singular_name;
                    ?>
                        <h3>Related <?php echo esc_html($post_type_name); ?></h3>
                    <?php
                    } else {
                    ?>

                        <h3>Related Posts</h3>
                    <?php } ?>
                </div>
                <?php

                while ($related_query->have_posts()) {
                    $related_query->the_post();
                ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <?php
                            $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'large');

                            if ($thumbnail_url) { ?>
                                <div class="card-img img-container-270">
                                    <img src="<?php echo esc_url($thumbnail_url); ?>" class="card-img-top img-fluid" alt="<?php echo esc_attr(get_the_title()); ?>">
                                </div>
                            <?php }
                            ?>

                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php echo get_permalink(); ?>" class="text-normal"><?php echo get_the_title(); ?></a></h5>
                                <!-- <p class="card-text"><?php //echo get_the_excerpt(); 
                                                            ?></p> -->
                                <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>

                <?php
                }

                ?>
            </div>
<?php

            wp_reset_postdata();
        } else {
            echo '<p>No related posts found.</p>';
        }

        // End output buffering and return the content
        return ob_get_clean();
    } else {
        return '<p>No tags found.</p>';
    }
}
