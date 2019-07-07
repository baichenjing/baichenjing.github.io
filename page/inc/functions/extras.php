<?php
/**
 * Extra Functions
 *
 * @package Viable_Blog
 */

/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'viable_blog_fonts_url' ) ) :

    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function viable_blog_fonts_url()
    {

        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Roboto font: on or off', 'viable-blog')) {
            $fonts[] = 'Roboto:400,400i,500,500i,700,700i';
        }
        
        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Laila font: on or off', 'viable-blog')) {
            $fonts[] = 'Laila:400,500,600,700';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), '//fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/**
 * Fallback For Main Menu
 */
if ( !function_exists( 'viable_blog_navigation_fallback' ) ) :

    function viable_blog_navigation_fallback() {
        ?>
        <ul>
            <?php 
                wp_list_pages( array( 
                    'title_li' => '', 
                    'depth' => 1,
                ) ); 
            ?>
        </ul>
        <?php    
    }

endif;

/**
 * Banner Posts Query
 */
if( !function_exists( 'viable_blog_banner_posts_query' ) ) {

    function viable_blog_banner_posts_query() {

        $banner_categories = get_theme_mod( 'viable_blog_banner_posts_categories', '' );
        
        $banner_posts_no = get_theme_mod( 'viable_blog_banner_posts_no', 5 );

        $banner_args = array(
            'post_type' => 'post',
        );

        if( !empty( $banner_categories ) ) {
            $banner_args['cat'] = $banner_categories;
        }

        if( !empty( $banner_posts_no ) ) {
            $banner_args['posts_per_page'] = absint( $banner_posts_no );
        }

        $banner_query = new WP_Query( $banner_args );

        return $banner_query;
    }

}


/**
 * Global Left Sidebar
 */
if( !function_exists( 'viable_blog_global_left_sidebar' ) ) {

    function viable_blog_global_left_sidebar() {

        $sidebar_position = get_theme_mod( 'viable_blog_global_sidebar_position', 'right' );

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

        $sidebar_position = get_theme_mod( 'viable_blog_global_sidebar_position', 'right' );

        if( !is_active_sidebar( 'sidebar' ) || $sidebar_position != 'right' ) {
            return;
        } else {
            get_sidebar();
        }
        
    }
}


/**
 * Filters For Excerpt 
 *
 */
if( !function_exists( 'viable_blog_excerpt_more' ) ) :
    /*
     * Excerpt More
     */
    function viable_blog_excerpt_more( $more ) {

        if ( is_admin() ) {
            return $more;
        }

        return '..';

    }
endif;
add_filter( 'excerpt_more', 'viable_blog_excerpt_more' );


if( !function_exists( 'viable_blog_excerpt_length' ) ) :
    /*
     * Excerpt More
     */
    function viable_blog_excerpt_length( $length ) {

        if( is_admin() ) {
            return $length;
        }

        $excerpt_length = get_theme_mod( 'viable_blog_excerpt_length', 20 );

        if ( absint( $excerpt_length ) > 0 ) {
            $excerpt_length = absint( $excerpt_length );
        }

        return $excerpt_length;

    }
endif;
add_filter( 'excerpt_length', 'viable_blog_excerpt_length' );


/**
 * Filters For Search Form
 *
 */
if( !function_exists( 'viable_blog_search_form' ) ) :
    /**
     * Search form of the theme.
     *
     * @since 1.0.0
     */
    function viable_blog_search_form() {
        $form = '<form role="search" method="get" id="search-form" class="clearfix" action="' . esc_url( home_url( '/' ) ) . '"><input type="search" name="s" placeholder="' . esc_attr__( 'Type Something', 'viable-blog' ) . '" value"' . get_search_query() . '" ><input type="submit" id="submit" value="'. esc_attr__( 'Search', 'viable-blog' ).'"></form>';

        return $form;
    }
endif;
add_filter( 'get_search_form', 'viable_blog_search_form', 10 );