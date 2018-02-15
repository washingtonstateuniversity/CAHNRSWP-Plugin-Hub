<?php

namespace WSUWP\CAHNRS_Plugin_Hub;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} // End if

/**
 * @desc  Abstract News Article class
 * @since 0.0.1
 */
class News_Article extends Article {
	
	
	public function set_by_wp_post_id( $post_id ){
		
		$this->title = \get_the_title( $post_id );
		
		$this->excerpt = \get_the_excerpt( $post_id );
		
		$this->url = \get_permalink( $post_id );
		
		$this->img = \get_the_post_thumbnail_url( $post_id, 'full' );
		
		//$this->content = \get_the_content( $post_id );
		
	} // End set_by_wp_post_id
	
	
	public function set_from_rest_response( $response ){
		
	} // set_from_rest_response


}
