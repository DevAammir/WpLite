<?php get_header();?>
<?php if (have_posts()): while (have_posts()): the_post();?>

		    <!-- Page Content -->
		    <div class="container">

		      <h1 class="my-4"><?php the_title();?></h1>

		      <!-- Marketing Icons Section -->
		      <div class="row">
		        <div class="col-md-12">
		        <div class="post-featured"><?php if (has_post_thumbnail()) {?><?=the_post_thumbnail();?><?php }?></div>
		        <?php the_content();?>
		        <?php edit_post_link('edit', '<p>', '</p><br/>');?>
		      </div>
		      </div>
		    </div>
		    <?php endwhile; 
			endif;
?>
    <!-- /.container -->
    <!-- Footer -->
    <?php get_footer();?>
