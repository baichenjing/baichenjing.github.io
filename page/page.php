<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Viable_Blog
 */

get_header();
?>
	<div class="vb_container">
        <div class="mid_portion_wrap standard_page_mid_wrap">
            <?php 
                /**
                 * Hook - viable_blog_breadcrumb.
                 *
                 * @hooked viable_blog_breadcrumb_action - 1
                 */
                do_action( 'viable_blog_breadcrumb' );
            ?>
            <div class="row">
            	<?php
            	$container_class = viable_blog_post_page_container_class();

				viable_blog_global_left_sidebar();

            	?>
                <div class="<?php echo esc_attr( $container_class ); ?>">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <?php
                            while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
                            ?>
                        </main><!-- #main.site-main -->
                    </div><!-- #primary.content-area -->
                </div>
                <?php viable_blog_global_right_sidebar(); ?>
            </div><!-- .row -->
        </div><!-- .mid_portion_wrap.standard_page_mid_wrap -->
    </div><!-- .vb_container -->

<?php
get_footer();
