<?php

namespace WSUWP\CAHNRS_Plugin_Hub;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} // End if

/**
 * @desc  Abstract Article class
 * @since 0.0.1
 */
class Article {

	// @var string Article title
	protected $title = '';

	// @var string Article excerpt
	protected $except = '';

	// @var string Article content
	protected $content = '';


	/**
	 * @desc Get article title
	 * @since 0.0.1
	 * @return string Article title
	 */
	public function get_title() {

		return $this->title;

	} // End get_title

	/**
	* @desc Get article excerpt
	* @since 0.0.1
	* @return string Article excerpt
	*/
	public function get_excerpt() {

		return $this->excerpt;

	} //end get_excerpt

	//[TO DO] Add content

}
