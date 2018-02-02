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
class Post_Type_Article  {
	
	public function __construct() {
		
		$this->add_actions();
		
		$this->add_filters();		

	}
	
	protected function add_actions(){
		
		add_action( 'wp_head', array( $this, 'add_social_metadata' )  );
		
	}
	
	protected function add_filters(){
		
		
	}
	
	
	function add_social_metadata (){
		
		if ( is_singular('article') ){
			
			include_once get_plugin_dir_path( 'lib/classes/class-article-factory.php' );
			
			$article_factory = new Article_Factory();
			
			$article = $article_factory->get_article ( 'news-article' );
			
			$post_id = \get_the_ID();
			
			$article->set_by_wp_post_id( $post_id );
			
			$title = esc_html( $article->get_title() );
			
			$meta_title = esc_html( spine_get_title() ); 
			
			$url = $article->get_url();
			
			$img = $article->get_img();
			
			$unit_name = esc_html( \get_bloginfo( 'name' ) );
			

			
			$excerpt = $article->get_excerpt();
			
			var_dump( $post_id );
			
				var_dump($article);
			
			include get_plugin_dir_path( 'lib/displays/social/metadata/metadata.php' );
			
		} // End if
		
	}
	
}

?>