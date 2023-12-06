<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!-- Page Content -->
		<div class="container">

			<h1 class="my-4"><?php the_title(); ?></h1>

			<!-- Marketing Icons Section -->
			<div class="row">
				<?php get_template_part('inc/content'); ?>
				<?php get_sidebar(); ?>
			</div>
			<div class="row">
				<p>Post Visits: <strong><?php the_post_views(); ?><strong></p>
			</div>
			<?php echo wpl_related_posts(); ?>
		</div>
<?php endwhile;
endif;
?>
<!-- /.container -->

<!-- Footer -->
<?php get_footer(); ?>