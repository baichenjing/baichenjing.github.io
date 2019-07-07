<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Viable_Blog
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( "postpage_entry" ); ?>>
    <div class="post_title">
    	<?php the_title( '<h2>', '</h2>' ); ?>
    </div><!-- .post_title -->
    <?php if( has_post_thumbnail() ) : ?>
    <div class="post_thumb post_media">
        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
    </div><!-- .post_thumb.post_media -->
	<?php endif; ?>
    <div class="editor_contents">
        <?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'viable-blog' ),
			'after'  => '</div>',
		) );

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'viable-blog' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
		?>
    </div><!-- .editor_contents -->
</div><!-- #post-<?php the_ID(); ?> -->