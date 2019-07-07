<?php
/**
 * Template part for displaying header two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Viable_Blog
 */
?>
<header id="mastheader" class="mastheader header_style2">
    <div class="header_top">
        <div class="vb_container">
            <div class="header_top_entry">
                <div class="row">
                    <div class="col nav_col">
                        <nav class="main_navigation">
                            <?php 
                            /**
                             * Hook - viable_blog_main_menu.
                             *
                             * @hooked viable_blog_main_menu_action - 1
                             */
                            do_action( 'viable_blog_main_menu' ); 
                            ?>
                        </nav><!-- .main_navigation -->
                    </div><!-- .col.nav_col -->

                    <?php 
                    /**
                     * Hook - viable_blog_header_social_links.
                     *
                     * @hooked viable_blog_header_social_links_action - 1
                     */
                    do_action( 'viable_blog_header_social_links' ); 
                    ?>

                </div><!-- .row -->
            </div><!-- .header_top_entry -->
        </div><!-- .vb_container -->
    </div><!-- .header_top -->
    <div class="site_idty_wrap">
        <div class="vb_container">
            <div class="row">
                <div class="col left_col">
                    <?php 
                    /**
                     * Hook - viable_blog_logo.
                     *
                     * @hooked viable_blog_logo_action - 1
                     */
                    do_action( 'viable_blog_logo' ); 
                    ?>
                </div><!-- .col -->
                <?php if( is_active_sidebar( 'header-advertisement' ) ) : ?>
                <div class="col right_col">
                    <?php dynamic_sidebar( 'header-advertisement' ); ?>
                </div><!-- .col.right_col -->
                <?php endif; ?>
            </div><!-- .row -->
        </div><!-- .vb_container -->
    </div><!-- .site_idty_wrap -->
</header><!-- #mastheader.mastheader.header_style2 -->