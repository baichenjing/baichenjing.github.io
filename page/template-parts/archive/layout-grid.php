<?php
/**
 * Template part for displaying posts in grid
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Viable_Blog
 */
$sidebar_position = get_theme_mod( 'viable_blog_global_sidebar_position', 'right' );
$item_class = null;
if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar' ) ) {
    $item_class = 'col-md-4 col-sm-6 col-xs-12';
} else {
    $item_class = 'col-md-6 col-sm-6 col-xs-12';
}
?>
<div class="vb_rp_grid_style vb_post_formates">
    <div class="row">
        <?php
        $break = 0;
        while( have_posts() ) : the_post();
            if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar' ) ) {
                if( $break%3 == 0 ) {
                    ?>
                    <div class="row clearfix hidden-sm hidden-xs"></div>
                    <?php
                }
                if( $break%2 == 0 ) {
                    ?>
                    <div class="row clearfix hidden-lg hidden-md hidden-xs"></div>
                    <?php
                }
            } else {
                if( $break%2 == 0 ) {
                    ?>
                    <div class="row clearfix hidden-xs"></div>
                    <?php
                }
            }            
            
            ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class( $item_class ); ?>>
                <div class="card">
                    <?php if( has_post_thumbnail() ) : ?>
                    <div class="post_media standard imghover">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'viable-blog-thubmnail-2', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?></a>
                    </div><!-- .post_media.standard.imghover -->
                    <?php endif; ?>
                    <div class="card_content">
                        <?php viable_blog_post_categories(); ?>
                        <div class="post_title">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div><!-- .post_title -->
                        <div class="excerpt">
                            <?php the_excerpt(); ?>
                        </div><!-- .excerpt -->
                    </div><!-- .card_content -->
                </div><!-- .card -->
            </div><!-- .col-* -->
            <?php
            $break++;
        endwhile;
        ?>   
    </div><!-- .row -->         
</div><!-- .vb_rp_grid_style.vb_post_formates -->
<?php 
/**
 * Hook - viable_blog_pagination.
 *
 * @hooked viable_blog_pagination_action - 1
 */
do_action( 'viable_blog_pagination' );