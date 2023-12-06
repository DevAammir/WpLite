<?php 
/**
 * Generate the function comment for the given function body.
 *
 * @param array $atts An associative array of attributes.
 *     - string $atts['no_icon'] Whether to display the icon or not.
 *     - string $atts['for'] The name to be displayed.
 *     - string $atts['icon'] The custom icon to be displayed.
 *     - string $atts['extra_icon_class'] The extra class for the icon.
 *     - string $atts['platform'] The platform for the social media.
 *
 * @throws Some_Exception_Class This function may throw a Some_Exception_Class
 *     if something goes wrong.
 *
 * @return string The HTML code for the social media link.
 */
function show_social_media($atts)
{
    
    // pd(WPL_SOCIALMEDIA );
    // pd($atts,true );

    $no_icon = !empty($atts['no_icon']) ? $atts['no_icon'] : '';
    $name = $atts['for'];
    $custom_icon = !empty($atts['icon']) ? $atts['icon'] : '';
    $extra_icon_class = !empty($atts['extra_icon_class']) ? $atts['extra_icon_class'] : '';
    $fontAwesomeClass = 'fab fa-' . $name;
    
    // Check if the key exists in WPL_SOCIALMEDIA array
    $url = (isset(WPL_SOCIALMEDIA['sm_'.$name]) && !empty(WPL_SOCIALMEDIA['sm_'.$name])) ? WPL_SOCIALMEDIA['sm_'.$name] : '';
    
    $icon = empty($custom_icon) ? '<i class="'. $fontAwesomeClass.' '.$extra_icon_class.'"></i>' : $custom_icon;

    $with_icon = '<a href="'.$url .'" class="'.$name.'" title="'.$name.'">'. $icon .'</a>';
    $without_icon = '<label>'.ucfirst(str_replace("site_", "", $name)).'</label> : <a href="'.$url .'" class="'.$name.'" title="'.$name.'">'. $url .'</a>';
    
    $return = $no_icon ? $without_icon : $with_icon;

    return !empty($url) ? $return : '.';
}

add_shortcode('wpl_sm', 'show_social_media');




/**
 * Generates HTML code for displaying social media links.
 *
 * @param array|null $atts The attributes for the function. Defaults to null.
 * @return string The HTML code for displaying the social media links.
 */
function show_social_media_links($atts=null)
{
    $extra_class_for_icon = !empty($atts['extra_icon_class']) ? $atts['extra_icon_class'] : '';
    $socialMedia = WPL_SOCIAL_MEDIA_PLATFORMS;
    $output = '<div class="wpl-social-links"><ul>';

    foreach ($socialMedia as $name => $key) {
        $url = WPL_SOCIALMEDIA['sm_' . $key];
        $fontAwesomeClass = 'fab fa-' . $key . ' ' . $extra_class_for_icon;
        
        if (!empty($url)) {
            $output .= '<li><a href="' . $url . '" class="' . $key . '" title="' . $name . '"><i class="' . $fontAwesomeClass . '"></i></a></li>';
        }
    }

    $output .= '<ul></div>';
    return $output;
}

add_shortcode('wpl_sm_links', 'show_social_media_links');

 
/**
 * Generates the function comment for the given function body.
 *
 * @param array $atts the shortcode attributes
 * @param string|null $content the shortcode content
 * @throws Some_Exception_Class description of exception
 * @return string the generated HTML output
 */
function bootstrap_container_shortcode($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'class' => '',
            'id' => '',
        ),
        $atts,
        'bootstrap_container'
    );

    $class = !empty($atts['class']) ? ' ' . esc_attr($atts['class']) : '';
    $id = !empty($atts['id']) ? ' id="' . esc_attr($atts['id']) . '"' : '';

    $output = '<div class="container' . $class . '"' . $id . '>' . $content . '</div>';

    return $output;
}
add_shortcode('container', 'bootstrap_container_shortcode');


 
/**
 * Generate the function comment for the given function body.
 *
 * @param array $atts The attributes passed to the shortcode.
 * @param string|null $content The content within the shortcode.
 * @throws None
 * @return string The generated output. That is <div class="row">
 */
function bootstrap_row_shortcode($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'class' => '',
            'id' => '',
        ),
        $atts,
        'bootstrap_row'
    );

    $class = !empty($atts['class']) ? ' ' . esc_attr($atts['class']) : '';
    $id = !empty($atts['id']) ? ' id="' . esc_attr($atts['id']) . '"' : '';

    $output = '<div class="row' . $class . '"' . $id . '>' . do_shortcode($content) . '</div>';

    return $output;
}
add_shortcode('row', 'bootstrap_row_shortcode');



function bootstrap_col_shortcode($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'class' => '',
            'id' => '',
            'size' => '', // Default size is an empty string
        ),
        $atts,
        'bootstrap_col'
    );

    $class = !empty($atts['class']) ? ' ' . esc_attr($atts['class']) : '';
    $id = !empty($atts['id']) ? ' id="' . esc_attr($atts['id']) . '"' : '';
    $size = !empty($atts['size']) ? 'col-' . esc_attr($atts['size']) : 'col';

    $output = '<div class="' . $size . $class . '"' . $id . '>' . do_shortcode($content) . '</div>';

    return $output;
}
add_shortcode('col', 'bootstrap_col_shortcode');
