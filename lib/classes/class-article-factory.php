<?php

namespace WSUWP\CAHNRS_Plugin_Hub;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} // End if

/**
 * @desc  Article Factory class
 * @since 0.0.1
 */
class Article_Factory {

	public function get_article( $type ) {

		include_once get_plugin_dir_path( 'lib/classes/class-article.php' );

		switch ( $type ) {

			case 'news-article':
				$article = $this->get_news_article();
				break;
			default:
				$article = false;
				break;

		}

		return $article;

	}


	protected function get_news_article() {

		include_once get_plugin_dir_path( 'lib/classes/class-news-article.php' );

		$article = new News_Article();

		return $article;

	}

} //end Article_Factory
