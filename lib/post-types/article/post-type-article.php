<?php

namespace WSUWP\CAHNRS_Plugin_Hub;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} // End if

/**
 * @desc  Post Type Article
 * @since 0.0.1
 */
class Post_Type_Article {

	public function __construct() {

		$this->add_actions();

		$this->add_filters();

	}

	protected function add_actions() {

		add_action( 'wp_head', array( $this, 'add_social_metadata' ), 1 );

		add_action( 'edit_form_after_title', array( $this, 'add_mediaform' ) );

		add_action ( 'save_post_article', array( $this, 'save_mediaform' ) );

	}

	protected function add_filters() {

		add_filter( 'language_attributes', array( $this, 'add_opengraph' ), 10, 2 );

		add_filter( 'the_content', array( $this, 'add_socialbuttons' ), 12 );

		add_filter( 'the_content', array( $this, 'add_mediacontact' ), 11 );

	}

	public function add_opengraph( $output, $doctype ) {

		if ( is_singular( 'article' ) ) {

			$output .= ' prefix="og: http://ogp.me/ns#"';

		}

		return $output;

	}

	public function add_socialbuttons( $content ) {

		if ( is_singular( 'article' ) ) {

			remove_filter( 'the_content', array( $this, 'add_socialbuttons' ), 12 );

			include_once get_plugin_dir_path( 'lib/classes/class-article-factory.php' );

			$article_factory = new Article_Factory();

			$article = $article_factory->get_article( 'news-article' );

			$post_id = \get_the_ID();

			$article->set_by_wp_post_id( $post_id );

			$title = $article->get_title();

			$url = $article->get_url();

			$utf_url = rawurlencode( $url );

			ob_start();

			include get_plugin_dir_path( 'lib/displays/social/buttons/social-buttons.php' );

			$social_buttons = ob_get_clean();

			$content = $content . $social_buttons;

		}

		return $content;

	}

	public function add_social_metadata() {

		if ( is_singular( 'article' ) ) {

			include_once get_plugin_dir_path( 'lib/classes/class-article-factory.php' );

			$article_factory = new Article_Factory();

			$article = $article_factory->get_article( 'news-article' );

			$post_id = \get_the_ID();

			$article->set_by_wp_post_id( $post_id );

			$title = $article->get_title();

			$meta_title = esc_html( spine_get_title() );

			$url = $article->get_url();

			$img = $article->get_img();

			$unit_name = esc_html( \get_bloginfo( 'name' ) );

			$fbadmin = $article->get_fbadmin();

			$excerpt = $article->get_excerpt();

			include get_plugin_dir_path( 'lib/displays/social/metadata/metadata.php' );

		} // End if

	}

	public function add_mediacontact( $content ) {

		if ( is_singular( 'article' ) ) {

			remove_filter( 'the_content', array( $this, 'add_mediacontact' ), 11 );

			$post_id = \get_the_ID();

			$mediacontact = '<span class="media-contact"><span class="media">Media Contact</span>:<br/>';		

			for ( $i=1; $i<6; $i++ ) {

				$firstname = get_post_meta( $post_id, '_firstname_' . $i, true );

				if( ! empty( $firstname ) ) {

					$lastname = get_post_meta( $post_id, '_lastname_' . $i, true );
			
					$title = get_post_meta( $post_id, '_title_' . $i, true );
			
					$email = get_post_meta( $post_id, '_email_' . $i, true );
			
					$phone = get_post_meta( $post_id, '_phone_' . $i, true );
					
					ob_start();

					include get_plugin_dir_path( 'lib/displays/contact/media/media-contact.php' );

					$mediacontact .= ob_get_clean();

				}

			}

			$mediacontact .= '</span>';

			$content = $content . $mediacontact;

		}

		return $content;

	}

	public function add_mediaform( $post ) {

		echo '<h2>Media Contacts</h2><style> .hidden-media {display:none;}</style>';

		for($i = 1; $i < 6; $i++ ) {
			
			$firstname = get_post_meta( $post->ID, '_firstname_' . $i, true );

			$lastname = get_post_meta( $post->ID, '_lastname_' . $i, true );
	
			$title = get_post_meta( $post->ID, '_title_' . $i, true );
	
			$email = get_post_meta( $post->ID, '_email_' . $i, true );
	
			$phone = get_post_meta( $post->ID, '_phone_' . $i, true );

			$class = ( $i === 1 || ! empty( $firstname ) ) ? '' : 'hidden-media';

			include get_plugin_dir_path( 'lib/displays/contact/media/media-form.php' );

		}

		echo '<button class="add-media">Add Contact</button>';

		echo '<script>';

		include get_plugin_dir_path( 'lib/js/article.js' );

		echo '</script>';

	}


	public function save_mediaform( $post_id ) {

		for ( $i=1; $i<6; $i++ ) {
			
			$media_keys = array(
				'_firstname_' .$i,
				'_lastname_' .$i,
				'_title_' .$i,
				'_email_' .$i,
				'_phone_' .$i,
			);

			foreach ( $media_keys as $index => $key ) {

				if ( empty( $_POST[ $key ] ) ){

					$value = $_POST[ $key ];
		 
					update_post_meta( $post_id, $key, $value );
		
				}

			}

		}

	}

}
