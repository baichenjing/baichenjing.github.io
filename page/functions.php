<?php
/**
 * Viable Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Viable_Blog
 */

if ( ! function_exists( 'viable_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function viable_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Viable Blog, use a find and replace
		 * to change 'viable-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'viable-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'viable-blog-thubmnail-1', 800, 500, true ); // Grid/List Large Thumbnail
		add_image_size( 'viable-blog-thubmnail-2', 707, 442, true ); // Grid/List Small Thumbnail
		add_image_size( 'viable-blog-thubmnail-3', 800, 600, true ); // Author Thumbnail
		add_image_size( 'viable-blog-thubmnail-6', 1311, 600, true ); // Slider Three Thumbnail( Fullwidth )
		add_image_size( 'viable-blog-thubmnail-7', 500, 700, true ); // Slider Four Thumbnail
		add_image_size( 'viable-blog-thubmnail-10', 300, 300, true ); // Widget Post Thumbnail


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'viable-blog' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'viable-blog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'viable_blog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'viable_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function viable_blog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'viable_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'viable_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function viable_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'viable-blog' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget"><div class="%2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'viable-blog' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<div class="col-md-4 col-sm-12 col-xs-12"><div id="%1$s" class="widget"><div class="%2$s">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	if( get_theme_mod( 'viable_blog_header_layout', 'header_one' ) == 'header_one' ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Header Advertisement', 'viable-blog' ),
			'id'            => 'header-advertisement',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget"><div class="advt_widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '',
			'after_title'   => '',
		) );
	}
	
}
add_action( 'widgets_init', 'viable_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function viable_blog_scripts() {
	
	wp_enqueue_style( 'viable-blog-style', get_stylesheet_uri() );

	wp_enqueue_style( 'viable-blog-font', viable_blog_fonts_url() );

	wp_enqueue_style( 'viable-blog-main', get_template_directory_uri() . '/assets/dist/css/main.css' );

	wp_enqueue_script( 'viable-blog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0.0', true );

	wp_enqueue_script( 'viable-blog-bundle', get_template_directory_uri() . '/assets/dist/js/bundle.min.js', array( 'jquery', 'masonry' ), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'viable_blog_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/functions/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/functions/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/functions/template-functions.php';

/**
 * Breadcrumbs.
 */
require get_template_directory() . '/inc/functions/breadcrumbs.php';

/**
 * Extra Functions.
 */
require get_template_directory() . '/inc/functions/extras.php';

/**
 * Custom Hooks
 */
require get_template_directory() . '/inc/functions/hooks.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Customizer Active Callback.
 */
require get_template_directory() . '/inc/customizer/active-callback.php';

/**
 * Load Widgets.
 */
require get_template_directory() . '/inc/widgets/widget-init.php';