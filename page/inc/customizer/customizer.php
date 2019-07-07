<?php
/**
 * Viable Blog Theme Customizer
 *
 * @package Viable_Blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function viable_blog_customize_register( $wp_customize ) {

	/**
	 * Custom Customize Control
	 */
	require get_template_directory() . '/inc/customizer/customize-controls.php';

	/**
	 * Sanitization Functions
	 */
	require get_template_directory() . '/inc/customizer/sanitize-callback.php';

	/**
	 * Customizer Options
	 */
	require get_template_directory() . '/inc/customizer/customizer-options.php';


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'viable_blog_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'viable_blog_customize_partial_blogdescription',
		) );
	}


}
add_action( 'customize_register', 'viable_blog_customize_register' );

/**
 * Load Customizer Option Choices
 */
require get_template_directory() . '/inc/customizer/option-choices.php';

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function viable_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function viable_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function viable_blog_customize_preview_js() {
	wp_enqueue_script( 'viable-blog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'viable_blog_customize_preview_js' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function viable_blog_customizer_script() {
	wp_enqueue_style( 'chosen', get_template_directory_uri() .'/assets/admin/css/chosen.css');
	wp_enqueue_style( 'viable-blog-custom', get_template_directory_uri() .'/assets/admin/css/custom.css' );
	wp_enqueue_script( 'chosen-jquery', get_template_directory_uri() .'/assets/admin/js/chosen.jquery.js', array( 'jquery' ),'1.8.3', true  );
	wp_enqueue_script( 'viable-blog-custom', get_template_directory_uri() .'/assets/admin/js/custom.js', array( 'jquery' ),'1.0.0', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'viable_blog_customizer_script' );
