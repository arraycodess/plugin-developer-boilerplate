<?php
/**
 * EnqueueScripts Init
 *
 * @version 1.0.1
 * @package 'plugin-developer-boilerplate'
 */



/** Enqueue_scripts  */
add_action('wp_enqueue_scripts', 'enqueue_scripts');
add_action('wp_enqueue_scripts', 'enqueue_styles');

/**
 * Enqueue_scripts function
 */
function enqueue_scripts() {
	wp_enqueue_script('main-script-boilerplate', plugins_url('/assets/js/main-script-boilerplate.min.js', __FILE__), array(), '1.2', true);
}

/**
 * Enqueue_styles function
 */
function enqueue_styles()
{
	wp_enqueue_style('style-boilerplate', plugins_url('/assets/css/style-boilerplate.min.css', __FILE__), '', '1.1');
}
