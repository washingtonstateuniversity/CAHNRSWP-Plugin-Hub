<?php
/*
Plugin Name: CAHNRSWP Hub
Version: 0.0.2
Description: News Content Hub for CAHNRS Sites
Author: CAHNRS Communications, Lesa McPeak, Danial Bleile
Author URI: https://cahnrs.wsu.edu/communications
Plugin URI: https://github.com/washingtonstateuniversity/CAHNRSWP-Plugin-Hub
Text Domain: cahnrswp-plugin-hub
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// This plugin uses namespaces and requires PHP 5.3 or greater.
if ( version_compare( PHP_VERSION, '5.3', '<' ) ) {
	add_action( 'admin_notices', create_function( '', // @codingStandardsIgnoreLine
	"echo '<div class=\"error\"><p>" . __( 'CAHNRSWP Plugin Hub requires PHP 5.3 to function properly. Please upgrade PHP or deactivate the plugin.', 'cahnrswp-plugin-hub' ) . "</p></div>';" ) );
	return;
} else {

	include_once 'lib/functions/globals.php';

	add_action( 'after_setup_theme', 'WSUWP\CAHNRS_Plugin_Hub\bootstrap' );

} // End if
