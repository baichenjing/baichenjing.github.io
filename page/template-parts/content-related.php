<?php
/**
 * Template part for displaying related blog post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Viable_Blog
 */
$enable_related_posts = get_theme_mod( 'viable_blog_enable_related_posts', 0 );
$related_post_no = get_theme_mod( 'viable_blog_related_posts_no', 4 );

$related_args = array(
	'post_type' => 'post',
	'no_found_rows'       => true,
	'ignore_sticky_posts' => true,
);

if( !empty( $related_post_no ) ) {
	$related_args['posts_per_page'] = absint( $related_post_no );
}

$current_object = get_queried_object();

if ( $current_object instanceof WP_Post ) {

	$current_id = $current_object->ID;

	if ( absint( $current_id ) > 0 ) {
		// Exclude current post.
		$related_args['post__not_in'] = array( absint( $current_id ) );

		// Include current posts categories.
		$categories = wp_get_post_categories( $current_id );
		if ( ! empty( $categories ) ) {
			$related_args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $categories,
					'operator' => 'IN',
					)
				);
		}
	}
}

$related_query = new WP_Query( $related_args );

$sidebar_position = viable_blog_global_sidebar_position();
$item_class = null;
if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar' ) ) {
    $item_class = 'col-md-4 col-sm-6 col-xs-12';
} else {
    $item_class = 'col-md-6 col-sm-6 col-xs-12';
}

$section_title  = get_theme_mod( 'viable_blog_related_posts_section_title', '' );

if( $related_query->have_posts() && $enable_related_posts == 1 ) :
	?>
	<section class="related_posts">
        <div class="section_title">
        	<?php if( !empty( $section_title ) ) : ?>
            <span><?php echo esc_html( $section_title ); ?></span>
        	<?php endif; ?>
        </div><!-- .section_title -->
        <div class="vb_rp_grid_style vb_post_formates">
            <div class="row">
            	<?php
		        $break = 0;
		        while( $related_query->have_posts() ) : $related_query->the_post();
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
		            <div class="<?php echo esc_attr( $item_class); ?>">
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
            </div>
            <!-- // row -->
        </div>
    </section><!-- .related_posts -->
	<?php
endif;