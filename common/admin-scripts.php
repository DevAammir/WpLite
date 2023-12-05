<?php


function wplite_admin_scripts($hook)
{

    if (is_admin()) {

        // Add the color picker css file       
        wp_enqueue_style('wp-color-picker');

        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script('wp-colorpicker', get_template_directory_uri() . '/js/custom-script.js', array('wp-color-picker'), false, true);

        wp_enqueue_script('functions-handle', get_template_directory_uri() . '/js/functions.js', array('jquery'));
    }
}
// add_action('admin_enqueue_scripts', 'wplite_admin_scripts');
add_action('admin_footer', 'wplite_admin_scripts');


add_action('admin_footer', 'colorPicker_scripts');

function colorPicker_scripts()
{
?>
    <script>
        (function($) {

            // Add Color Picker to all inputs that have 'color-field' class
            $(function() {
                $('.color-field').wpColorPicker();
            });

        })(jQuery);
    </script>
<?php

}


/**
 * CSS FOR ACF PAGE TEMPLATE BACKEND
 * * */
add_action('admin_head', 'admin_custom_css');

function admin_custom_css()
{
?><style>
        .special,
        .special * {
            background: #EEE;
        }

        .form_builder_row {
            clear: both;
        }

        textarea {
            min-width: 40%;
        }
    </style><?php
        }


        /**
         * WORDPRESS ADMIN MEDIA UPLOAD ENQUEUE
         * * */
        function enqueue_media_uploader()
        {
            if (is_admin()) {
                wp_enqueue_media();
            }
        }
        add_action('admin_enqueue_scripts', 'enqueue_media_uploader');
