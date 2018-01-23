<?php

namespace WSUWP\CAHNRS_Plugin_Hub;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} // End if


/**
 * Starts things up.
 *
 * @since 0.0.1
 */
function bootstrap() {

	include_once get_plugin_dir_path( 'lib/classes/class-hub.php' );

	$cahnrswp_hub = new Hub();

} // End bootstrap


/**
 * @desc Get base directory path for plugin
 * @since 0.0.1
 *
 * @var string $path Optional path to append to base directory
 *
 * @return string Directory path with optional appended
 */
function get_plugin_dir_path( $path = '' ) {

	$dir = plugin_dir_path( dirname( __DIR__ ) );

	$dir .= $path;

	return $dir;

} // End get_plugin_dir_path
