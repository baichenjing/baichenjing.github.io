<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Viable_Blog
 */

get_header();
?>
	<div class="vb_container">
        <div class="mid_portion_wrap search_page_mid_wrap <?php echo esc_attr( viable_blog_main_post_list_class() ); ?>">
            <?php 
                /**
                 * Hook - viable_blog_breadcrumb.
                 *
                 * @hooked viable_blog_breadcrumb_action - 1
                 */
                do_action( 'viable_blog_breadcrumb' );
            ?>
            <div class="row">
                <?php viable_blog_global_left_sidebar(); ?>
                <div class="<?php echo esc_attr( viable_blog_post_list_class() ); ?>">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <?php if ( have_posts() ) : ?>
                            <div class="searchpage_entry">
                                <div class="page_title lined_page_title">
                                	<h2>
	                                    <?php
										/* translators: %s: search query. */
										printf( esc_html__( 'Search Results for: %s', 'viable-blog' ), '<span>' . get_search_query() . '</span>' );
										?>
									</h2>
                                </div><!-- .page_title.lined_page_title -->
                                <div class="searchpage_contents_holder">
                                    <?php
                                        get_template_part( 'template-parts/archive/layout', 'masonry' );
                                    ?>
                                </div><!-- .searchpage_contents_holder -->
                            </div><!-- .searchpage_entry -->
                            <?php  
                            else :  
                                get_template_part( 'template-parts/content', 'none' );
                            endif;
                            ?>
                        </main><!-- #main.site-main -->
                    </div><!-- #primary.content-area -->
                </div>
                <?php viable_blog_global_right_sidebar(); ?>
            </div><!-- .main row -->
        </div><!-- .mid_portion_wrap.search_page_mid_wrap -->
    </div><!-- .vb_container -->

<?php
get_footer();
