<?php
/**
 * Template part for displaying posts in grid full
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Viable_Blog
 */
?>
<section class="recent_posts_holder">
    <div class="row">
    	<?php 
	    $i = 0;
	    while( have_posts() ) : the_post();
	        if( $i < 2 ) {
	            ?>
	            <article id="post-<?php the_ID(); ?>" <?php post_class("box first_article matchheight"); ?>>
	                <div class="top_box_content">
	                    <?php viable_blog_post_categories(); ?>
	                    <div class="post_title">
	                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	                    </div><!-- .post_title -->
	                    <div class="meta">
	                        <ul class="post_meta">
	                            <li class="posted_date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></li>
	                        </ul><!-- .post_meta -->
	                    </div><!-- .meta -->
	                </div><!-- .top_box_content -->
	                <?php if( has_post_thumbnail() ) : ?>
	                <div class="post-thumb imghover">
	                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'viable-blog-thubmnail-1', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?></a>
	                </div><!-- .post-thumb.imghover -->
	                <?php endif; ?>
	                <div class="btm_box_content">
	                    <div class="excerpt">
	                        <?php  the_excerpt(); ?>
	                    </div><!-- .excerpt -->
	                    <?php
	                    $button_title = get_theme_mod( 'viable_blog_post_button_title', 'Continue Reading' );
	                    if( !empty( $button_title ) ) {
	                        ?>
	                        <div class="the_permalink">
	                            <a href="<?php the_permalink(); ?>" class="btn_general"><?php echo esc_html( $button_title ); ?></a>
	                        </div><!-- .the_permalink -->
	                        <?php
	                    }
	                    ?>
	                    <div class="extra">
	                        <div class="row">
	                            <div class="col">
	                                <div class="meta">
	                                    <ul class="post_meta">
	                                        <li class="posted_by"><span><?php esc_html_e( 'By: ', 'viable-blog' ); ?></span><a href="<?php the_permalink(); ?>"><?php echo get_the_author(); ?></a></li>
	                                    </ul><!-- .post_meta -->
	                                </div><!-- .meta -->
	                            </div><!-- .col -->
	                        </div><!-- .row -->
	                    </div><!-- .extra -->
	                </div><!-- .btm_box_content -->
	            </article><!-- #post-<?php the_ID(); ?> -->
	            <?php
	        }
	        $i++;
	    endwhile;
	    ?>
    </div><!-- .row -->
    <div class="vb_rp_grid_style vb_post_formates">
        <div class="row">
        	<?php
        	$break = 0;
	        $i = 0;
	        while( have_posts() ) : the_post();
	        	if( $i >= 2 ) :
	        		if( $break%3 == 0 && $break > 0 ) {
		                ?>
		                <div class="row clearfix hidden-sm hidden-xs"></div>
		                <?php
		            }
		            if( $break%2 == 0 && $break > 0 ) {
		                ?>
		                <div class="row clearfix hidden-lg hidden-md hidden-xs"></div>
		                <?php
		            }
		        	?>
		            <div id="post-<?php the_ID(); ?>" <?php post_class("col-md-4 col-sm-6 col-xs-12"); ?>>
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
	        	endif;
	        	$i++;
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
    ?>
</section><!-- .recent_posts_holder -->