<?php get_header(); ?>

<!-- Page Content -->
<div class="container">

  <h1 class="my-4"><?php echo  __('Our latest blog articles', TD); ?></h1>


  <div class="row">
    <div class="col-md-12">
      <div class="content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="row border-bottom mb-2 mt-2 pb-4 pt-4 pb-2">
              <div class="col-md-2"><?php if (has_post_thumbnail()) { ?>
                  <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                  <a href="<?= the_permalink(); ?>" class="entry__thumb-link pt-2 pb-2">
                    <img src="<?php echo $image[0]; ?>" class="img-fluid" /></a><?php } ?>
              </div>
              <div class="col-md-10">
                <h5 class="pt-3 pb-2 heading-sm-b"><a href="<?= the_permalink(); ?>" class="the-link"><?php the_title(); ?></a></h5>
                <div class="pt-2 pb-2"><?php the_excerpt(); ?></div>
                <?php get_template_part('inc/meta_info'); ?>
              </div>
            </div>
        <?php endwhile;
        endif; ?>
        <div class="row pt-2 pb-2">
          <div class="col-md-12"><?php wplight_pagination(); ?></div>
        </div>
      </div>
    </div>
  </div>

  <!-- /.row -->


</div>
<!-- Footer -->
<?php get_footer(); ?>