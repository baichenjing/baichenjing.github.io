<?php
/**
 * Template part for displaying banner four
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Viable_Blog
 */
$banner_query = viable_blog_banner_posts_query();
if( $banner_query->have_posts() ) :
    ?>
    <section class="vb_banner">
        <div class="vb_container">
            <div class="owl-carousel vb_banner_style_4">
                <?php while( $banner_query->have_posts() ) : $banner_query->the_post(); ?>
                <?php if( has_post_thumbnail() ) : ?>
                <div class="item">
                    <div class="card">
                        <div class="post_thumb" style="background-image: url(<?php esc_url( the_post_thumbnail_url( 'viable-blog-thubmnail-7' ) ); ?>)">
                            <div class="card_content">
                                <?php viable_blog_post_categories(); ?>
                                <div class="post_title">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </div><!-- .title -->
                            </div><!-- .card_content -->
                            <div class="mask"></div><!-- .mask -->
                        </div><!-- .post_thumb -->
                    </div><!-- .card -->
                </div><!-- .item -->
                <?php endif; ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div><!-- .owl-carousel.vb_banner_style_4 -->
        </div><!-- .vb_container -->
    </section><!-- .vb_banner -->
    <?php
endif;