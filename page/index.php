<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Viable_Blog
 */

get_header();

viable_blog_banner_template();
?>
	<div class="vb_container">
		
		<div class="mid_portion_wrap frontpage_mid_wrap <?php echo esc_attr( viable_blog_main_post_list_class() ); ?>">
            <div class="row">
            	<?php viable_blog_global_left_sidebar(); ?>
                <div class="<?php echo esc_attr( viable_blog_post_list_class() ); ?>">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
	                        <?php
							if( have_posts() ) {
								$sidebar_position = get_theme_mod( 'viable_blog_global_sidebar_position', 'right' );
								if( $sidebar_position != 'none' && is_active_sidebar( 'sidebar' ) ) {
									get_template_part( 'template-parts/layout/layout', 'grid' );
								} else {
									get_template_part( 'template-parts/layout/layout', 'gridfull' );
								}
							} else {
								get_template_part( 'template-parts/content', 'none' );
							}
							?>
						</main><!-- #main.site-main -->
					</div><!-- #primary.content-area -->
				</div><!--  -->
				<?php viable_blog_global_right_sidebar(); ?>
			</div><!-- .row -->
		</div><!-- .mid_portion_wrap.frontpage_mid_wrap -->
	</div><!-- .vb_container -->
<?php
get_footer();
