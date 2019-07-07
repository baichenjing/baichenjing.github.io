<?php
/**
 * One Hive Widget Initialization and Registration
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Viable_Blog
 */

/**
 * Load Widgets.
 */
require get_template_directory() . '/inc/widgets/author-widget.php';
require get_template_directory() . '/inc/widgets/post-widget.php';


/**
 * Enqueue Scripts and Styles In Admin Backend
 */
if ( ! function_exists( 'viable_blog_admin_scripts' ) ) {

    function viable_blog_admin_scripts( $hook ) {

        if ( 'widgets.php' == $hook || is_admin() ) {

        	wp_enqueue_script( 'media-upload' );

			wp_enqueue_media();

			wp_enqueue_style( 'viable-blog-admin-widget', get_template_directory_uri() . '/assets/admin/css/admin-widget.css' );

			wp_enqueue_script( 'viable-blog-admin-widget', get_template_directory_uri() . '/assets/admin/js/admin-widget.js', array( 'jquery' ), '1.0.0' );
		}
    }
}
add_action('admin_enqueue_scripts', 'viable_blog_admin_scripts');

/**
 * Register widgets.
 *
 */
function viable_blog_register_widgets() {

	register_widget( 'Viable_Blog_Author_Widget' );

	register_widget( 'Viable_Blog_Post_Widget' );
}
add_action( 'widgets_init', 'viable_blog_register_widgets' );