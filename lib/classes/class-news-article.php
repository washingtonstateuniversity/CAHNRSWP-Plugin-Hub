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

	public function set_by_wp_post_id( $post_id ) {

		$post = \get_post( $post_id );

		$this->title = $post->post_title;

		// Apparently \get_the_excerpt() is evil - switching to custom excerpt function.
		$this->excerpt = $this->get_excerpt_from_post( $post );

		$this->url = \get_permalink( $post_id );

		$this->img = \get_the_post_thumbnail_url( $post_id, 'full' );

		//$this->content = \get_the_content( $post_id );

	} // End set_by_wp_post_id


	/**
	* @desc  Get the excerpt from the post
	* @since 0.0.3
	*
	* @param WP_Post $post WP Post object
	*
	* @return string Post excerpt
	*/
	protected function get_excerpt_from_post( $post ) {

		// If this has an excerpt let's just use that
		if ( isset( $post->post_excerpt ) && ! empty( $post->post_excerpt ) ) {

			// bam done
			return $post->post_excerpt;

		} else { // OK so someone didn't set an excerpt, let's make one

			// We'll start with the post content
			$excerpt = $post->post_content;

			// Remove shortcodes but keep text inbetween ]...[/
			$excerpt = \preg_replace( '~(?:\[/?)[^/\]]+/?\]~s', '', $excerpt );

			// Remove HTML tags and script/style
			$excerpt = \wp_strip_all_tags( $excerpt );

			// Shorten to 35 words and convert special characters
			$excerpt = \htmlspecialchars( \wp_trim_words( $excerpt, 35 ) );

			return $excerpt;

		}// End if

	} // End get_excerpt_from_post


	public function set_from_rest_response( $response ) {

	} // set_from_rest_response


}
