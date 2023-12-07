<?php
get_header();

$author_id = get_query_var('author');
$author_data = get_userdata($author_id);

if ($author_data) :
?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 author-profile">
                <h1>About <?php echo $author_data->display_name; ?></h1>
                <p><?php echo $author_data->user_description; ?></p>
            </div>
        </div>
    </div>
    <div class="container author-posts">
        <?php
        // Display author posts
        $args = array(
            'author'      => $author_id,
            'post_status' => 'publish',
        );

        $author_posts = new WP_Query($args);
        ?>
        <div class="row">
            <h3>By <?php echo $author_data->display_name; ?>:</h3>
        </div>
    <?php
    wpl_get_posts_loop($author_posts);

endif;
    ?>
    </div>
    <?php
    get_footer();
    ?>