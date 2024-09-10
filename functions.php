<?php
/**
 * The Points World functions and definition
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * 
 * @package thepointsworld
 */

 if(!defined('_S_VERSION')) {
    // Replace the version number of the theme of each resease
    define('_S_VERSION', '1.0.0');
 }


/**
 * Enque scripts and styles
 */
function tpw_scripts() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
    wp_enqueue_style('tpw_tailwind_style', get_template_directory_uri() . '/dist/output.css', array(), _S_VERSION);
    wp_enqueue_style('tpw_custom_style', get_template_directory_uri() . '/style.css', array(), _S_VERSION);

    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), _S_VERSION, true );

    // Localize script to pass the AJAX URL
    wp_localize_script('script', 'review_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}

add_action('wp_enqueue_scripts', 'tpw_scripts');


/**
 * Register Menus
 */
function register_menus() {
    register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_menus');

/**
 * Tailwind_Nav_Walker
 */
class Tailwind_Nav_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu tpw-bg-gray-800 tpw-text-white\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'tpw-text-gray-300 tpw-hover:tpw-text-white';

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= '<li' . $class_names .'>';

        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) .'"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn)    .'"' : '';
        $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url)   .'"' : '';

        // Add link_class from args if it exists
        $link_class = isset($args->link_class) ? ' class="' . esc_attr($args->link_class) . '"' : '';
        $attributes .= $link_class;

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

function customize_my_account_menu_links($menu_links) {
    // Remove specific items
    unset($menu_links['downloads']);
    // Add or remove other items as needed
    // unset($menu_links['orders']); // Example to remove 'Orders'
    // unset($menu_links['edit-address']); // Example to remove 'Addresses'

    return $menu_links;
}
add_filter('woocommerce_account_menu_items', 'customize_my_account_menu_links');

// Handle course reviews
add_action('wp_ajax_submit_review', 'handle_ajax_review_submission');
add_action('wp_ajax_nopriv_submit_review', 'handle_ajax_review_submission');

function handle_ajax_review_submission() {
    if (isset($_POST['review_content']) && isset($_POST['review_rating']) && is_user_logged_in()) {
        $course_id = intval($_POST['course_id']);
        $review_content = sanitize_textarea_field($_POST['review_content']);
        $review_rating = intval($_POST['review_rating']);
        $user_id = get_current_user_id();

        $review_post_id = wp_insert_post(array(
            'post_type' => 'course_review',
            'post_title' => 'Review for ' . get_the_title($course_id),
            'post_content' => $review_content,
            'post_status' => 'publish',
            'post_author' => $user_id,
            'meta_input' => array(
                'course_id' => $course_id,
                'review_rating' => $review_rating,
            ),
        ));

        if ($review_post_id) {
            wp_send_json_success();
        } else {
            wp_send_json_error();
        }
    } else {
        wp_send_json_error();
    }
}

// Theme Supports
add_theme_support( 'custom-logo' );