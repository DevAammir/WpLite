<?php
$tags = get_the_tag_list('', ', ', '', $post->ID);
$categories = get_the_category_list(', ', '', $post->ID);
?>
<div class="meta-info ">
    <div class="the-date ">
        <label>Date: </label>
        
        <?php //_wpl_display_date($post->ID); ?>
    </div>
    <div class="the-author ">
        <label>Author: </label>
        <span class="meta-icon"><i class="far fa-user"></i></span>
        <?php // _wpl_author_info(); ?>
    </div>
    <?php /* if (!empty($categories)) : ?>
        <div class="the-categories ">
            <label>Categories: </label>
            <span class="meta-icon"><i class="far fa-folder-open"></i></span>
            <?php echo $categories; ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($tags)) : ?>
        <div class="the-tags ">
            <label>Tags:</label>
            <span class="meta-icon"><i class="fas fa-tags"></i></span>
            <?php echo $tags; ?>
        </div>
    <?php endif; */?>
</div>