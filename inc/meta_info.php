<?php
$tags = get_the_tag_list('', ', ', '', $post->ID);
$categories = get_the_category_list(', ', '', $post->ID);
?>
<div class="meta-info row pt-3 pb-3">
    <div class="the-date col">
        <label>Date:</label>
        <span class="meta-icon date-icon"><i class="far fa-calendar-alt"></i></span>
        <?php _wpl_display_date($post->ID); ?>
    </div>
    <div class="the-author col">
        <label>Author:</label>
        <span class="meta-icon author-icon"><i class="far fa-user"></i></span>
        <?php echo _wpl_author_info(); ?>
    </div>
    <?php if (!empty($categories)) : ?>
    <div class="the-categories col">
        <label>Categories:</label>
        <span class="meta-icon category-icon"><i class="far fa-folder-open"></i></span>
        <?php echo $categories; ?>
    </div><?php endif; ?>
    <?php if (!empty($tags)) : ?>
    <div class="the-tags col">
        <label>Tags:</label>
        <span class="meta-icon tag-icon"><i class="fas fa-tags"></i></span>
        <?php echo $tags; ?>
    </div>
    <?php endif; ?>
</div>