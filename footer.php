<footer class="pt-5 pb-1 bg-dark">
    <div class="footer-top pb-3">
        <div class="container">
            <div class="row">

                <div class="col-md-5 footer-info">
                    <?php dynamic_sidebar('footer_1'); ?>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <?php dynamic_sidebar('footer_2'); ?>
                </div>

                <div class="col-md-2 footer-links">
                    <?php dynamic_sidebar('footer_3'); ?>
                </div>
                <div class="col-md-3 footer-contact text-white">
                <?php dynamic_sidebar('footer_4'); ?>
                    <h4><?php echo __('Contact Us', TD);
                        ?></h4>
                    <p><strong><?php echo __('Phone', TD);
                                ?>:</strong> <?php echo  WPL_SOCIALMEDIA['sm_phone'];
                                                ?><br>
                        <strong><?php echo __('Email', 'wpl22');
                                ?>:</strong> <?php echo WPL_SOCIALMEDIA['sm_site_email'];
                                                ?><br>
                    </p>

                    <div class="social-links">
                        <?php $socialMedia = WPL_SOCIAL_MEDIA_PLATFORMS;

                        foreach ($socialMedia as $name => $key) {
                            $url = WPL_SOCIALMEDIA['sm_' . $key];
                            $fontAwesomeClass = 'fab fa-' . $key . ' text-white';
                            if (!empty($url)) :
                        ?>
                                <a href="<?php echo $url; ?>" class="<?php echo $key; ?>" title="<?php echo $name; ?>"><i class="<?php echo $fontAwesomeClass; ?>"></i></a>
                        <?php endif;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="m-0 text-white">
                        <?php echo bloginfo('name'); ?> / <?php echo  bloginfo('description'); ?> © All Rights Reserved</p>
                </div>
                <div class="col">
                <p class="m-0 text-white text-right">Copyright © <strong><?php echo bloginfo('name'); ?></strong> <?php echo date("Y"); ?></p>
                </div>
            </div>
        </div>

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
        <?php wp_footer(); ?>
</footer>
</body>

</html>