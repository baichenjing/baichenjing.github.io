<?php
/**
 * Customizer Options Choices
 *
 * @package Viable_Blog
 */

if( !function_exists( 'viable_blog_categories_array' ) ) :
	/*
	 * Function to get blog categories
	 */
	function viable_blog_categories_array() {

		$taxonomy = 'category';

		$terms = get_terms( $taxonomy );

		$blog_cat = array();

		foreach( $terms as $term ) {
			$blog_cat[$term->term_id] = $term->name;
		}

		return $blog_cat;

	}
endif;