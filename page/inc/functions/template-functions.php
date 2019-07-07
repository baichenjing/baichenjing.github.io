<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Viable_Blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if( !function_exists( 'viable_blog_body_classes' ) ) {
	function viable_blog_body_classes( $classes ) {

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		if( get_background_image() || get_background_color() != 'ffffff'  ) {
			$classes[] = 'boxed';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'viable_blog_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
if( !function_exists( 'viable_blog_pingback_header' ) ) {
	function viable_blog_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
}
add_action( 'wp_head', 'viable_blog_pingback_header' );


/**
 * Selects header template according to the customizer's header option
 */
if( !function_exists( 'viable_blog_header_template' ) ) {

	function viable_blog_header_template() {

		$header_layout = get_theme_mod( 'viable_blog_header_layout', 'header_one' );

		if( $header_layout == 'header_one' ) {
			get_template_part( 'template-parts/header/header', 'one' );
		}

		if( $header_layout == 'header_two' ) {
			get_template_part( 'template-parts/header/header', 'two' );
		}

	}
}

/**
 * Selects banner template according to the customizer's banner option
 */
if( !function_exists( 'viable_blog_banner_template' ) ) {

	function viable_blog_banner_template() {

		$enable_banner = get_theme_mod( 'viable_blog_enable_banner', 0 );

		$banner_layout = get_theme_mod( 'viable_blog_banner_layout', 'banner_one' );

		if( $enable_banner == 1 ) {

			if( $banner_layout == 'banner_one' ) {
				get_template_part( 'template-parts/banner/banner', 'one' );
			}

			if( $banner_layout == 'banner_two' ) {
				get_template_part( 'template-parts/banner/banner', 'two' );
			}

		}
	}
}


/**
 * Class for container listing posts in index.php
 */
if( !function_exists( 'viable_blog_post_list_class' ) ) {

	function viable_blog_post_list_class() {
		$sticky_class = null;
		$enable_sticky_sidebar = get_theme_mod( 'viable_blog_enable_sticky_sidebar', 0 );
		if( $enable_sticky_sidebar == 1 ) {
			$sticky_class = 'sticky_portion';
		}
		$sidebar_position = get_theme_mod( 'viable_blog_global_sidebar_position', 'right' );
		$container_class = null;
		if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar' ) ) {
			$container_class = 'col-md-12 col-sm-12 col-xs-12';
		} else {
			$container_class = 'col-md-8 col-sm-12 col-xs-12 ' . $sticky_class;
		}

		return $container_class;
	}
}


/**
 * Class for main container listing posts in index.php
 */
if( !function_exists( 'viable_blog_main_post_list_class' ) ) {

	function viable_blog_main_post_list_class() {
		$sidebar_position = get_theme_mod( 'viable_blog_global_sidebar_position', 'right' );
		$container_class = null;
		if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar' ) ) {
			$container_class = 'no_sidebar';
		}

		return $container_class;
	}
}

/**
 * Class for main container displaying content of post and page
 */
if( !function_exists( 'viable_blog_post_page_container_class' ) ) {

	function viable_blog_post_page_container_class() {

		$sticky_class = null;

		$enable_sticky_sidebar = get_theme_mod( 'viable_blog_enable_sticky_sidebar', 0 );
		if( $enable_sticky_sidebar == 1 ) {
			$sticky_class = 'sticky_portion';
		}

    	$sidebar_position = viable_blog_global_sidebar_position();

    	if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar' ) ) {
			$container_class = 'col-md-12 col-sm-12 col-xs-12';
		} else {
			$container_class = 'col-md-8 col-sm-12 col-xs-12 ' . $sticky_class;
		}

		return $container_class;
	}
}


/**
 * Function to determine sidebar position for single post or page.
 */
if( !function_exists( 'viable_blog_global_sidebar_position' ) ) {

	function viable_blog_global_sidebar_position() {

		$sidebar_position = get_theme_mod( 'viable_blog_global_sidebar_position', 'right' );

		if( empty( $sidebar_position ) ) {
    		$sidebar_position = 'right';
    	}

    	return $sidebar_position;
	}
}

/**
 * Global Left Sidebar
 */
if( !function_exists( 'viable_blog_global_left_sidebar' ) ) {

    function viable_blog_global_left_sidebar() {

        $sidebar_position = viable_blog_global_sidebar_position();

        if( !is_active_sidebar( 'sidebar' ) || $sidebar_position != 'left' ) {
            return;
        } else {
            get_sidebar();
        }
        
    }
}

/**
 * Global Right Sidebar
 */
if( !function_exists( 'viable_blog_global_right_sidebar' ) ) {

    function viable_blog_global_right_sidebar() {

        $sidebar_position = viable_blog_global_sidebar_position();

        if( !is_active_sidebar( 'sidebar' ) || $sidebar_position != 'right' ) {
            return;
        } else {
            get_sidebar();
        }
        
    }
}







