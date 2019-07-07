<?php
/**
 * Template part for displaying posts in masonry
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Viable_Blog
 */
?>
<div class="searchpage_contents_holder">
    <div class="vb_rp_brick_grids clearfix vb_post_formates">
        <?php
        while( have_posts() ) : the_post(); 
            ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class("card bricks_items"); ?>>
                <?php if( has_post_thumbnail() ) : ?>
                <div class="post_thumb imghover">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?></a>
                </div><!-- .post_thumb.imghover -->
                <?php endif; ?>
                <div class="card_content">
                    <?php viable_blog_post_categories(); ?>
                    <div class="post_title">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div><!-- .post_title -->
                    <div class="excerpt">
                        <?php the_excerpt(); ?>
                    </div><!-- .excerpt -->
                </div><!-- .card_contents -->
            </div><!-- .card.bricks_items -->
            <?php
        endwhile;
        ?>
    </div><!-- .vb_rp_grid_style.clearfix.vb_post_formates -->
    <?php 
    /**
     * Hook - viable_blog_pagination.
     *
     * @hooked viable_blog_pagination_action - 1
     */
    do_action( 'viable_blog_pagination' );
    ?>
</div><!-- .searchpage_contents_holder -->