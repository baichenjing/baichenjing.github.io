<?php
/**
 * Custom Hooks
 *
 * @package Viable_Blog
 */

if( !function_exists( 'viable_blog_main_menu_action' ) ) {
    /**
     * Hook - Main Menu
     *
     * @since 1.0.0
     */
    function viable_blog_main_menu_action() {
        $menu_class = null;
        $header_layout = get_theme_mod( 'viable_blog_header_layout', 'header_one' );
        if( $header_layout == 'header_three' || $header_layout == 'header_four' ) {
            $menu_class = 'has_search';
        }
        ?>
        <div class="primary_navigation has_search <?php echo esc_attr( $menu_class ); ?>">
            <?php
                wp_nav_menu( array( 
                    'theme_location'    => 'main-menu',
                    'container'         => '',
                    'fallback_cb'       => 'viable_blog_navigation_fallback',
                 ) );
            ?>
        </div><!-- .primary_navigation -->
        <?php
    }
}
add_action( 'viable_blog_main_menu', 'viable_blog_main_menu_action', 1 );

if( !function_exists( 'viable_blog_menu_search_action' ) ) {
	/**
     * Hook - Main Menu
     *
     * @since 1.0.0
     */
	function viable_blog_menu_search_action() {
		?>
		<div class="header_search">
            <?php get_search_form(); ?>
        </div><!-- .header_search -->
		<?php
	}
}
add_action( 'viable_blog_menu_search', 'viable_blog_menu_search_action', 1 );


if( !function_exists( 'viable_blog_header_menu_action' ) ) {
	/**
     * Hook - Header Menu
     *
     * @since 1.0.0
     */
	function viable_blog_header_menu_action() {
		if( has_nav_menu( 'header-menu' ) ) :
			?>
			<div class="col nav_col">
				<div class="secondary_nav">
		            <?php
		            	wp_nav_menu( array( 
		        			'theme_location' 	=> 'header-menu',
		        			'container'			=> '',
		        		 ) );
		            ?>
		        </div><!-- .secondary_nav -->
		    </div><!-- .col.nav_col -->
			<?php
		endif;
	}
}
add_action( 'viable_blog_header_menu', 'viable_blog_header_menu_action', 1 );


if( !function_exists( 'viable_blog_header_social_links_action' ) ) {
	/**
     * Hook - Header Social Links
     *
     * @since 1.0.0
     */
	function viable_blog_header_social_links_action() {
		?>
		<div class="col">
            <div class="header_extra">
                <div class="social">
                    <ul class="social_icons_list">
                    	<?php 
                        $facebook_link = get_theme_mod( 'viable_blog_facebook_link', '' );
                        if( !empty( $facebook_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $facebook_link ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php
                        $twitter_link = get_theme_mod( 'viable_blog_twitter_link', '' );
                        if( !empty( $twitter_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $twitter_link ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php 
                        $googleplus_link = get_theme_mod( 'viable_blog_google_plus_link', '' );
                        if( !empty( $googleplus_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $googleplus_link ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php 
                        $pinterest_link = get_theme_mod( 'viable_blog_pinterest_link', '' );
                        if( !empty( $pinterest_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $pinterest_link ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php 
                        $instagram_link = get_theme_mod( 'viable_blog_instagram_link', '' );
                        if( !empty( $instagram_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $instagram_link ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php 
                        $vk_link = get_theme_mod( 'viable_blog_vk_link', '' );
                        if( !empty( $vk_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $vk_link ); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php 
                        $youtube_link = get_theme_mod( 'viable_blog_youtube_link', '' );
                        if( !empty( $youtube_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $youtube_link ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                    </ul><!-- .social_icons_list -->
                </div><!-- .social_icons -->
            </div><!-- .header_extra -->
        </div><!-- .col -->
		<?php
	}
}
add_action( 'viable_blog_header_social_links', 'viable_blog_header_social_links_action', 1 );


if( !function_exists( 'viable_blog_logo_action' ) ) {
    /**
     * Hook - Logo
     *
     * @since 1.0.0
     */
    function viable_blog_logo_action() {
        ?>
        <div class="site_idty_entry">
            <div class="logo">
                <?php if( has_custom_logo() ) : the_custom_logo(); else : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php 
                $viable_blog_description = get_bloginfo( 'description', 'display' );
                if ( $viable_blog_description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo esc_html( $viable_blog_description ); /* WPCS: xss ok. */ ?></p>
                <?php endif; endif; ?>
            </div><!-- .logo -->
        </div><!-- .site_idty_entry -->
        <?php
    }
}
add_action( 'viable_blog_logo', 'viable_blog_logo_action', 1 );

if( !function_exists( 'viable_blog_breadcrumb_action' ) ) {
    /**
     * Hook - Breadcrumb
     *
     * @since 1.0.0
     */
    function viable_blog_breadcrumb_action() {

        $enable_breadcrumb = get_theme_mod( 'viable_blog_enable_breadcrumb', 0 );
        ?>
        <div class="vb_breadcrumb breadtrails_style3">
            <?php
                $breadcrumb_args = array(
                    'show_browse' => false,
                );
                viable_blog_breadcrumb_trail( $breadcrumb_args );
            ?>
        </div><!-- .vb_breadcrumb.breadtrails_style3 -->
        <?php
    }
}
add_action( 'viable_blog_breadcrumb', 'viable_blog_breadcrumb_action', 1 );

if( !function_exists( 'viable_blog_pagination_action' ) ) {
	/**
     * Hook - Pagination
     *
     * @since 1.0.0
     */
	function viable_blog_pagination_action() {
        ?>        
        <div class="vb_pagination">
            <div class="pagi_style3">
                <?php
                    the_posts_pagination( array(
                        'mid_size' => 3,
                        'prev_text' => esc_html__( 'Prev', 'viable-blog' ),
                        'next_text' => esc_html__( 'Next', 'viable-blog' ),
                    ) );
                ?>
            </div><!-- .pagi_style3 -->
        </div><!-- .vb_pagination -->
		<?php
	}
}
add_action( 'viable_blog_pagination', 'viable_blog_pagination_action', 1 );


if( !function_exists( 'viable_blog_copyright_text_action' ) ) {
	/**
     * Hook - Copyright Text
     *
     * @since 1.0.0
     */
	function viable_blog_copyright_text_action() {
		$copyright_text = get_theme_mod( 'viable_blog_copyright_text', '' );        
		?>
		<div class="col left_col">
            <div class="copyright">
                <p>
                    <?php 
                    if( !empty( $copyright_text ) ) {
                        /* translators: 1: Copyright Text, 2: Theme Name, 3:  WordPress.org URL. */
                        printf( esc_html__( '%1$s %2$s Powered By %3$s ', 'viable-blog' ), $copyright_text, 'Viable Blog', '<a href="https://wordpress.org" target="_blank">WordPress</a>' );
                    } else {
                        /* translators: 1: WordPress.org URL. */
                        printf( esc_html__( '%1$s Powered By %2$s ', 'viable-blog' ), 'Viable Blog', '<a href="https://wordpress.org" target="_blank">WordPress</a>' );
                    }
                    ?>
                </p>
            </div><!-- .copyright -->
        </div><!-- .col.left_col -->
		<?php
	}
}
add_action( 'viable_blog_copyright_text', 'viable_blog_copyright_text_action', 1 );

if( !function_exists( 'viable_blog_footer_menu_action' ) ) {
	/**
     * Hook - Footer Menu
     *
     * @since 1.0.0
     */
	function viable_blog_footer_menu_action() {
		if( has_nav_menu( 'footer-menu' ) ) :
			?>
			<div class="col right_col">
				<div class="footer_nav">
		            <?php
		            	wp_nav_menu( array( 
		        			'theme_location' 	=> 'footer-menu',
		        			'container'			=> '',
		        		 ) );
		            ?>
		        </div><!-- .footer_nav -->
		    </div><!-- .col.right_col -->
			<?php
		endif;
	}
}
add_action( 'viable_blog_footer_menu', 'viable_blog_footer_menu_action', 1 );