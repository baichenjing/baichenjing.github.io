<?php
/**
 * Customizer Options Declaration
 *
 * @package Viable_Blog
 */

/*-----------------------------------------------------------------------------
							HEADER SECTION OPTIONS
-----------------------------------------------------------------------------*/

// Section - Header
$wp_customize->add_section( 'viable_blog_header_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Header Section', 'viable-blog' ),
) );

// Option - Header Layout
$wp_customize->add_setting( 'viable_blog_header_layout', array(
	'sanitize_callback'	=> 'viable_blog_sanitize_select',
	'default'			=> 'header_one',
) );

$wp_customize->add_control( 'viable_blog_header_layout', array(
	'label'				=> esc_html__( 'Select Header Layout', 'viable-blog' ),
	'section'			=> 'viable_blog_header_options',
	'type'				=> 'select',
	'choices'			=> array(
		'header_one' => esc_html__( 'Header Layout One', 'viable-blog' ),
		'header_two' => esc_html__( 'Header Layout Two', 'viable-blog' ),
	),
) );

/*-----------------------------------------------------------------------------
							BANNER SECTION OPTIONS
-----------------------------------------------------------------------------*/

// Section - Banner
$wp_customize->add_section( 'viable_blog_banner_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Banner Section', 'viable-blog' ),
) );

// Option - Enable Banner Section
$wp_customize->add_setting( 'viable_blog_enable_banner', array(
	'sanitize_callback'	=> 'viable_blog_sanitize_checkbox',
	'default'			=> 0,
) );

$wp_customize->add_control( 'viable_blog_enable_banner', array(
	'label'				=> esc_html__( 'Enable Banner Section', 'viable-blog' ),
	'section'			=> 'viable_blog_banner_options',
	'type'				=> 'checkbox',
) );

// Option - Banner Layout
$wp_customize->add_setting( 'viable_blog_banner_layout', array(
	'sanitize_callback'	=> 'viable_blog_sanitize_select',
	'default'			=> 'banner_one',
) );

$wp_customize->add_control( 'viable_blog_banner_layout', array(
	'label'				=> esc_html__( 'Select Banner Layout', 'viable-blog' ),
	'section'			=> 'viable_blog_banner_options',
	'type'				=> 'select',
	'choices'			=> array(
		'banner_one' => esc_html__( 'Banner Layout One', 'viable-blog' ),
		'banner_two' => esc_html__( 'Banner Layout Two', 'viable-blog' ),
	),
	'active_callback' => 'viable_blog_is_active_banner',
) );

// Option - Banner Posts Category
$wp_customize->add_setting( 'viable_blog_banner_posts_categories', array(
	'sanitize_callback'	=> 'viable_blog_sanitize_choices',
	'default' => '',
) );

$wp_customize->add_control( new Viable_Blog_Dropdown_Multiple_Select( $wp_customize, 'viable_blog_banner_posts_categories', array(
	'label'				=> esc_html__( 'Select Post Category/Categories', 'viable-blog' ),
	'description'		=> esc_html__( 'Select one or more than one categories', 'viable-blog' ),
	'section'			=> 'viable_blog_banner_options',
	'type'				=> 'select',
	'choices'			=> viable_blog_categories_array(),
	'active_callback' => 'viable_blog_is_active_banner',
) ) );

// Option - Banner Posts Number
$wp_customize->add_setting( 'viable_blog_banner_posts_no', array(
	'sanitize_callback'		=> 'viable_blog_sanitize_number',
	'default'				=> 5, 
) ); 

$wp_customize->add_control( 'viable_blog_banner_posts_no', array(
	'label'					=> esc_html__( 'Number of Posts', 'viable-blog' ),
	'section'				=> 'viable_blog_banner_options',
	'type'					=> 'number',
	'active_callback' => 'viable_blog_is_active_banner',
) );

// Option - Banner Button Title
$wp_customize->add_setting( 'viable_blog_banner_button_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> 'Read More',
) );

$wp_customize->add_control( 'viable_blog_banner_button_title', array(
	'label'				=> esc_html__( 'Button Title', 'viable-blog' ),
	'section'			=> 'viable_blog_banner_options',
	'type'				=> 'text',
	'active_callback' => 'viable_blog_is_active_banner',
) );



/*-----------------------------------------------------------------------------
							POST LISTING OPTIONS
-----------------------------------------------------------------------------*/

// Section - Blog Posts
$wp_customize->add_section( 'viable_blog_post_listing_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Blog Posts Section', 'viable-blog' ),
) );

// Option - Banner Button Title
$wp_customize->add_setting( 'viable_blog_post_button_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> 'Continue Reading',
) );

$wp_customize->add_control( 'viable_blog_post_button_title', array(
	'label'				=> esc_html__( 'Button Title', 'viable-blog' ),
	'section'			=> 'viable_blog_post_listing_options',
	'type'				=> 'text',
) );


/*-----------------------------------------------------------------------------
						FOOTER SECTION OPTIONS
-----------------------------------------------------------------------------*/

// Section - Footer
$wp_customize->add_section( 'viable_blog_footer_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Footer Section', 'viable-blog' ),
) );

// Option - Enable Footer Social Links
$wp_customize->add_setting( 'viable_blog_enable_footer_social_links', array(
	'sanitize_callback'	=> 'viable_blog_sanitize_checkbox',
	'default'			=> 0,
) );

$wp_customize->add_control( 'viable_blog_enable_footer_social_links', array(
	'label'				=> esc_html__( 'Enable Footer Social Links', 'viable-blog' ),
	'section'			=> 'viable_blog_footer_options',
	'type'				=> 'checkbox',
) );

// Option - Footer Copyright
$wp_customize->add_setting( 'viable_blog_copyright_text', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> '',
) );

$wp_customize->add_control( 'viable_blog_copyright_text', array(
	'label'				=> esc_html__( 'Copyright Text', 'viable-blog' ),
	'type' 				=> 'text',
	'section'			=> 'viable_blog_footer_options',
) );


/*-----------------------------------------------------------------------------
							SOCIAL LINKS OPTIONS
-----------------------------------------------------------------------------*/

// Section - Social Links
$wp_customize->add_section( 'viable_blog_social_link_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Social Links', 'viable-blog' ),
) );

// Option - Facebook Link
$wp_customize->add_setting( 'viable_blog_facebook_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> '',
) );

$wp_customize->add_control( 'viable_blog_facebook_link', array(
	'label'				=> esc_html__( 'Facebook Link', 'viable-blog' ),
	'section'			=> 'viable_blog_social_link_options',
	'type'				=> 'url',
) );

// Option - Twitter Link
$wp_customize->add_setting( 'viable_blog_twitter_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> '',
) );

$wp_customize->add_control( 'viable_blog_twitter_link', array(
	'label'				=> esc_html__( 'Twitter Link', 'viable-blog' ),
	'section'			=> 'viable_blog_social_link_options',
	'type'				=> 'url',
) );

// Option - Google Plus Link
$wp_customize->add_setting( 'viable_blog_google_plus_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> '',
) );

$wp_customize->add_control( 'viable_blog_google_plus_link', array(
	'label'				=> esc_html__( 'Google Plus Link', 'viable-blog' ),
	'section'			=> 'viable_blog_social_link_options',
	'type'				=> 'url',
) );

// Option - Pinterest Link
$wp_customize->add_setting( 'viable_blog_pinterest_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> '',
) );

$wp_customize->add_control( 'viable_blog_pinterest_link', array(
	'label'				=> esc_html__( 'Pinterest Link', 'viable-blog' ),
	'section'			=> 'viable_blog_social_link_options',
	'type'				=> 'url',
) );

// Option - Instagram Link
$wp_customize->add_setting( 'viable_blog_instagram_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> '',
) );

$wp_customize->add_control( 'viable_blog_instagram_link', array(
	'label'				=> esc_html__( 'Instagram Link', 'viable-blog' ),
	'section'			=> 'viable_blog_social_link_options',
	'type'				=> 'url',
) );

// Option - VK Link
$wp_customize->add_setting( 'viable_blog_vk_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> '',
) );

$wp_customize->add_control( 'viable_blog_vk_link', array(
	'label'				=> esc_html__( 'VK Link', 'viable-blog' ),
	'section'			=> 'viable_blog_social_link_options',
	'type'				=> 'url',
) );

// Option - Youtube Link
$wp_customize->add_setting( 'viable_blog_youtube_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> '',
) );

$wp_customize->add_control( 'viable_blog_youtube_link', array(
	'label'				=> esc_html__( 'Youtube Link', 'viable-blog' ),
	'section'			=> 'viable_blog_social_link_options',
	'type'				=> 'url',
) );


/*-----------------------------------------------------------------------------
							SIDEBAR OPTIONS
-----------------------------------------------------------------------------*/

// Section - Sidebar
$wp_customize->add_section( 'viable_blog_sidebar_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Sidebar', 'viable-blog' ),
) );

// Option - Enable Sticky Sidebar
$wp_customize->add_setting( 'viable_blog_enable_sticky_sidebar', array(
	'sanitize_callback'	=> 'viable_blog_sanitize_checkbox',
	'default'			=> 0,
) );

$wp_customize->add_control( 'viable_blog_enable_sticky_sidebar', array(
	'label'				=> esc_html__( 'Enable Sticky Sidebar', 'viable-blog' ),
	'section'			=> 'viable_blog_sidebar_options',
	'type'				=> 'checkbox',
) );

// Option - Sidebar Position
$wp_customize->add_setting( 'viable_blog_global_sidebar_position', array(
	'sanitize_callback'	=> 'viable_blog_sanitize_select',
	'default'			=> 'right',
) );

$wp_customize->add_control( 'viable_blog_global_sidebar_position', array(
	'label'				=> esc_html__( 'Global Sidebar Position', 'viable-blog' ),
	'section'			=> 'viable_blog_sidebar_options',
	'type'				=> 'select',
	'choices'			=> array(
		'left' => esc_html__( 'Left Sidebar', 'viable-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'viable-blog' ),
		'none' => esc_html__( 'No Sidebar', 'viable-blog' ),
	),
) );

/*-----------------------------------------------------------------------------
							BREADCRUMB OPTIONS
-----------------------------------------------------------------------------*/

// Section - Breadcrumb
$wp_customize->add_section( 'viable_blog_breadcrumb_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Breadcrumb', 'viable-blog' ),
) );

// Option - Enable Breadcrumb
$wp_customize->add_setting( 'viable_blog_enable_breadcrumb', array(
	'sanitize_callback'	=> 'viable_blog_sanitize_checkbox',
	'default'			=> 0,
) );

$wp_customize->add_control( 'viable_blog_enable_breadcrumb', array(
	'label'				=> esc_html__( 'Enable Breadcrumb', 'viable-blog' ),
	'section'			=> 'viable_blog_breadcrumb_options',
	'type'				=> 'checkbox',
) );


/*-----------------------------------------------------------------------------
							RELATED POSTS
-----------------------------------------------------------------------------*/

// Section - Related Posts
$wp_customize->add_section( 'viable_blog_related_posts_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Related Posts', 'viable-blog' ),
	'description'	=> esc_html__( 'Related posts are displayed in blog post page. Customize the related posts section with different options below.', 'viable-blog' ),
) );

// Option - Enable Related Posts
$wp_customize->add_setting( 'viable_blog_enable_related_posts', array(
	'sanitize_callback'	=> 'viable_blog_sanitize_checkbox',
	'default'			=> 0,
) );

$wp_customize->add_control( 'viable_blog_enable_related_posts', array(
	'label'				=> esc_html__( 'Enable Related Posts', 'viable-blog' ),
	'section'			=> 'viable_blog_related_posts_options',
	'type'				=> 'checkbox',
) );

// Option - Related Posts Section Title
$wp_customize->add_setting( 'viable_blog_related_posts_section_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> '',
) );

$wp_customize->add_control( 'viable_blog_related_posts_section_title', array(
	'label'				=> esc_html__( 'Section Title', 'viable-blog' ),
	'section'			=> 'viable_blog_related_posts_options',
	'type'				=> 'text',
	'active_callback' 	=> 'viable_blog_is_active_related_posts',
) );

// Option - Related Posts Number
$wp_customize->add_setting( 'viable_blog_related_posts_no', array(
	'sanitize_callback'		=> 'viable_blog_sanitize_number',
	'default'				=> 4, 
) ); 

$wp_customize->add_control( 'viable_blog_related_posts_no', array(
	'label'					=> esc_html__( 'Number of Posts', 'viable-blog' ),
	'section'				=> 'viable_blog_related_posts_options',
	'type'					=> 'number',
	'active_callback' 		=> 'viable_blog_is_active_related_posts',
) );


/*-----------------------------------------------------------------------------
							AUTHOR SECTION
-----------------------------------------------------------------------------*/

// Section - Author Section
$wp_customize->add_section( 'viable_blog_author_section_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Author Info', 'viable-blog' ),
	'description'	=> esc_html__( 'Author description is displayed in blog post page. Customize the author section with different options below.', 'viable-blog' ),
) );

// Option - Enable Author Info
$wp_customize->add_setting( 'viable_blog_enable_author_section', array(
	'sanitize_callback'	=> 'viable_blog_sanitize_checkbox',
	'default'			=> 0,
) );

$wp_customize->add_control( 'viable_blog_enable_author_section', array(
	'label'				=> esc_html__( 'Enable Author Info', 'viable-blog' ),
	'section'			=> 'viable_blog_author_section_options',
	'type'				=> 'checkbox',
) );


/*-----------------------------------------------------------------------------
							OTHER OPTIONS
-----------------------------------------------------------------------------*/

// Section - Other
$wp_customize->add_section( 'viable_blog_other_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Other Options', 'viable-blog' ),
) );

// Option - Default Excerpt Length
$wp_customize->add_setting( 'viable_blog_excerpt_length', array(
	'sanitize_callback'		=> 'viable_blog_sanitize_number',
	'default'				=> 20, 
) );

$wp_customize->add_control( 'viable_blog_excerpt_length', array(
	'label'					=> esc_html__( 'Excerpt Length', 'viable-blog' ),
	'description'			=> esc_html__( 'Excerpt is the short post content. Excerpt length sets the number of words that the excerpt can contain. This is the default excerpt length used for other pages too.', 'viable-blog' ),
	'section'				=> 'viable_blog_other_options',
	'type'					=> 'number',
) );