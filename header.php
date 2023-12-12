<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="WPL_AJAX" content="<?php echo WPL_AJAX; ?>">
    <meta name="description" content="<?=(isset(WPL_SETTINGS['site_dsec']) ? WPL_SETTINGS['site_dsec']: '');?>">
<meta name="author" content="<?=(isset(WPL_SETTINGS['author_desc']) ? WPL_SETTINGS['author_desc']: '');?>">
<?php if(!is_front_page()){$page_title = wp_title('', false).' | '; }else{$page_title = 'Home | ';}?>
<title> <?php echo $page_title;?><?php bloginfo('name'); ?> </title>

    <link rel="shortcut icon" href="<?= (isset(WPL_SETTINGS['favicon']) ? WPL_SETTINGS['favicon'] : ''); ?>" type="image/x-icon">
<link rel="icon" href="<?= (isset(WPL_SETTINGS['favicon']) ? WPL_SETTINGS['favicon'] : ''); ?>" type="image/x-icon">
        <!-- Main Stylesheet File -->
        <?php wp_head();?>
  </head>
  <body <?php body_class(); ?>>
  <header>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
      <a href="<?= site_url(); ?>" class="navbar-brand">
       <img src="<?php echo isset(WPL_SETTINGS['site_logo'])?WPL_SETTINGS['site_logo']:''; ?>" alt="<?php bloginfo('name'); ?>" class="img-fluid logo"/>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
                <?php
                    $args = array(
                        'theme_location' => 'primary_menu',
                        'menu' => 'primary_menu',
                        'container' => 'false',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => 'menu',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul class="navbar-nav ml-auto">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new Walker_Nav_Primary(), // This controls the display of the Bootstrap Navbar
                        'fallback_cb' => 'Walker::fallback', // For menu fallback
                    );
                    ?>
                    <?php wp_nav_menu($args); ?>  
        </div>
        <div class="ml-auto pl-2">
          <?php dynamic_sidebar('header_widget'); ?>
        </div>
      </div>
    </nav>    
    </header>