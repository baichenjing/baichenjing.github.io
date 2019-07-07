<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Viable_Blog
 */

?>
<div class="nfpage_entry">
    <div class="page_title lined_page_title">
        <h2><?php esc_html_e( 'Nothing Found', 'viable-blog' ); ?></h2>
    </div><!-- .page_title.lined_page_title -->
    <div class="nf_message">
        <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'viable-blog' ); ?></p>
    </div><!-- .nf_message -->
    <div class="nf_action">
        <div class="nf_search">
            <?php get_search_form(); ?>
        </div><!-- .nf_search -->
    </div><!-- .nf_action -->
</div><!-- .nfpage_entry -->

