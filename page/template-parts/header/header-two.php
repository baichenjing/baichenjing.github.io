<?php
/**
 * Template part for displaying header four
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Viable_Blog
 */
?>
<header id="mastheader" class="mastheader header_style4">
    <?php if( has_header_image() ) : ?>
    <div class="site_idty_wrap" style="background-image: url(<?php header_image(); ?>)">
    <?php else : ?>
    <div class="site_idty_wrap">
    <?php endif; ?>
        <div class="vb_container">
            <?php 
            /**
             * Hook - viable_blog_logo.
             *
             * @hooked viable_blog_logo_action - 1
             */
            do_action( 'viable_blog_logo' ); 
            ?>
        </div><!-- .vb_container -->
        <div class="mask"></div><!-- .mask -->
    </div><!-- .site_idty_wrap -->
    <nav class="main_navigation ">
        <div class="vb_container">
            <?php 
            /**
             * Hook - viable_blog_main_menu.
             *
             * @hooked viable_blog_main_menu_action - 1
             */
            do_action( 'viable_blog_main_menu' ); 
            ?>
            <?php 
            /**
             * Hook - viable_blog_menu_search.
             *
             * @hooked viable_blog_menu_search_action - 1
             */
            do_action( 'viable_blog_menu_search' ); 
            ?>
        </div><!-- .vb_container -->
    </nav><!-- .main_navigation -->
</header><!-- #mastheader.mastheader.header_style4 -->