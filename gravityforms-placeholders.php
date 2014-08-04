<?php
/*
Plugin Name: JT Gravity Forms - Placeholders add-on
Plugin URI: http://github.com/jamesrtyler/gravity-forms-placeholders
Description: Adds HTML5 placeholder support to Gravity Forms' fields with a javascript fallback. Javascript & jQuery are required. Project forked from https://github.com/neojp/gravity-forms-placeholders
Version: 1.0.1
Author: James Tyler
Author URI: http://jamestyler.me

Instructions:
Just add a "gplaceholder" CSS classname to the required fields or form

*/

if ( isset( $GLOBALS['pagenow'] ) && $GLOBALS['pagenow'] == 'wp-login.php' )
	return;

add_action('wp_print_scripts', 'gf_placeholder_enqueue_scripts');

function gf_placeholder_enqueue_scripts() {
	$plugin_url = plugins_url( basename(dirname(__FILE__)) );
	echo "<script>var jquery_placeholder_url = '" . $plugin_url . "/jquery.placeholder-1.0.1.js';</script>";
	wp_enqueue_script('_gf_placeholders', $plugin_url . '/gf.placeholders.js', array('jquery'), '1.0' );
}

/* Adds visuallyhidden class to the head. Theme must be using wp_head for this to work. If your theme is missing wp_head, please copy the style below and add it to your main stylesheet.*/
add_action('wp_head','hook_gf_placeholder_css');
function hook_gf_placeholder_css()
{
$output="<style> 
		.visuallyhidden { 
		position: absolute; 
		overflow: hidden; 
		clip: rect(0 0 0 0); 
		height: 1px; width: 1px; 
		margin: -1px; padding: 0; border: 0; 
		}
	</style>";

echo $output;
}
