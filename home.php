<?php get_header(); ?>
<!-- Page Content -->
<div class="container blog">

  <h1 class="my-4"><?php echo  __('Our latest blog articles', TD); ?></h1>

  <?php get_template_part('inc/loop'); ?>

</div>
<!-- Footer -->
<?php get_footer(); ?>