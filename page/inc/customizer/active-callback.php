<?php
/**
 * Active Callback Functions For Customizer Options
 *
 * @package Viable_Blog
 */


/*
 *	Active Callback For Banner
 */
if( ! function_exists( 'viable_blog_is_active_banner' ) ) {

	function viable_blog_is_active_banner( $control ) {
		if( $control->manager->get_setting( 'viable_blog_enable_banner' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}

/*
 *	Active Callback For Related Posts
 */
if( ! function_exists( 'viable_blog_is_active_related_posts' ) ) {

	function viable_blog_is_active_related_posts( $control ) {
		if( $control->manager->get_setting( 'viable_blog_enable_related_posts' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}

/*
 *	Active Callback For Breadcrumb
 */
if( ! function_exists( 'viable_blog_is_active_breadcrumb' ) ) {

	function viable_blog_is_active_breadcrumb( $control ) {
		if( $control->manager->get_setting( 'viable_blog_enable_breadcrumb' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}