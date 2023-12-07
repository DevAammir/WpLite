<div class="row">
    <div class="col-md-12">
    <?php if (have_posts()) :?>
        <?php $i = 0; ?>
        <div class="content">
            <?php while (have_posts()) : the_post(); $i++;?>
                    <div class="row border-bottom mb-2 mt-2 pb-4 pt-4 pb-2 pos-<?php echo $i; ?>?>">
                        <div class="col-md-2"><?php if (has_post_thumbnail()) { ?>
                                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID(  )), 'full'); ?>
                                <a href="<?= the_permalink(); ?>" class="entry__thumb-link pt-2 pb-2">
                                    <img src="<?php echo $image[0]; ?>" class="img-fluid" /></a><?php } ?>
                        </div>
                        <div class="col-md-10">
                            <h5 class="pb-2 heading-sm-b"><a href="<?= the_permalink(); ?>" class="the-link"><?php the_title(); ?></a></h5>
                            <div class="pt-2 pb-2"><?php echo get_the_excerpt(); ?></div>
                            <?php get_template_part('inc/meta_info'); ?>
                        </div>
                    </div>
            <?php endwhile;?>
            
            <div class="row pt-2 pb-2">
                <div class="col-md-12"><?php wplight_pagination(); ?></div>
            </div>
            <?php else: ?>
                <?php get_template_part('inc/not-found');?>
            <?php endif; ?>
        </div>
    </div>
</div><!-- /.row -->