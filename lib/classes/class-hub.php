<?php

namespace WSUWP\CAHNRS_Plugin_Hub;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} // Ebd if


class Hub {


	public function __construct() {

		$this->add_post_types();

	} // End __construct


	/**
	* @desc Add custom post types
	* @since 0.0.1
	*/
	protected function add_post_types() {

		$path = get_plugin_dir_path( 'lib/post-types/article/post-type-article.php' );

		include_once $path;

		$article_post_type = new Post_Type_Article();

	} // End add_post_types


	/**
	* @desc Add shortcodes
	* @since 0.0.1
	*/
	protected function add_shortcodes() {

	} // End add_shortcodes


	/**
	* @desc Add widgets
	* @since 0.0.1
	*/
	protected function add_widgets() {

	} // End add_widgets


	/**
	* @desc Add public style and scripts
	* @since 0.0.1
	*/
	protected function enqueue_scripts() {

	} // End enqueue_scripts


} // End hub
