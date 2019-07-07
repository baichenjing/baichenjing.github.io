<div id="post-<?php the_ID(); ?>" <?php post_class( "postpage_entry" ); ?>>
    <div class="post_title">
        <?php the_title( '<h2>', '</h2>' ); ?>
    </div><!-- .post_title -->
    <div class="meta">
        <ul class="post_meta">
            <li class="posted_date"><?php viable_blog_posted_on(); ?></li>
            <li class="posted_by"><?php viable_blog_posted_by(); ?></li>
            <li class="posted_in"><?php viable_blog_single_post_categories(); ?></a></li>
        </ul><!-- .post_meta -->
    </div><!-- .meta -->
    <?php if( has_post_thumbnail() ) : ?>
    <div class="post_thumb post_media">
        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
    </div><!-- .post_thumb.post_media -->
    <?php endif; ?>
    <div class="editor_contents">
        <?php 
        the_content( sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'viable-blog' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ) );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'viable-blog' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .editor_contents -->
    <?php viable_blog_single_post_tags(); ?>

    <?php $enable_author_desc = get_theme_mod( 'viable_blog_enable_author_section', 0 ); ?>
    <?php if( $enable_author_desc == 1 ) : ?>
    <div class="author_box">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="author_thumb">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 300 ); ?>
                </div><!-- .author_thumb -->
            </div><!-- .col-* -->
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="author_details">
                    <div class="author_name">
                        <h3><?php echo esc_html( get_the_author() ); ?></h3>
                    </div><!-- .author_name -->
                    <div class="author_desc">
                        <p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
                    </div><!-- .author_desc -->
                </div><!-- .author_details -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .author_box -->
    <?php endif; ?>

    <?php the_post_navigation(); ?>

    <?php get_template_part( 'template-parts/content', 'related' ); ?>

</div><!-- .postpage_entry -->