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
    wp_enqueue_style('tpw_style', get_template_directory_uri() . '/dist/output.css', array(), _S_VERSION);
}

add_action('wp_enqueue_scripts', 'tpw_scripts');