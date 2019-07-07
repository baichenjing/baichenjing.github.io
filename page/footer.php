<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Viable_Blog
 */
$enable_social_links = get_theme_mod( 'viable_blog_enable_footer_social_links', 0 );

?>  
	<footer class="footer dark">
        <div class="vb_container">
        	<?php if( $enable_social_links == 1 ) : ?>
            <div class="vb_topfooter">
                <div class="social">
                    <ul class="social_icons_list">
                    	<?php 
                        $facebook_link = get_theme_mod( 'viable_blog_facebook_link', '' );
                        if( !empty( $facebook_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $facebook_link ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i> <?php esc_html_e( 'Facebook', 'viable-blog' ); ?></a></li>
                        <?php endif; ?>
                    	<?php
                        $twitter_link = get_theme_mod( 'viable_blog_twitter_link', '' );
                        if( !empty( $twitter_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $twitter_link ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i> <?php esc_html_e( 'Twitter', 'viable-blog' ); ?></a></li>
                        <?php endif; ?>
                    	<?php 
                        $googleplus_link = get_theme_mod( 'viable_blog_google_plus_link', '' );
                        if( !empty( $googleplus_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $googleplus_link ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i> <?php esc_html_e( 'Google +', 'viable-blog' ); ?></a></li>
                        <?php endif; ?>
                    	<?php 
                        $pinterest_link = get_theme_mod( 'viable_blog_pinterest_link', '' );
                        if( !empty( $pinterest_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $pinterest_link ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i> <?php esc_html_e( 'Pinterest', 'viable-blog' ); ?></a></li>
                        <?php endif; ?>
                    	<?php 
                        $instagram_link = get_theme_mod( 'viable_blog_instagram_link', '' );
                        if( !empty( $instagram_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $instagram_link ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i> <?php esc_html_e( 'Instagram', 'viable-blog' ); ?></a></li>
                        <?php endif; ?>
                    	<?php 
                        $vk_link = get_theme_mod( 'viable_blog_vk_link', '' );
                        if( !empty( $vk_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $vk_link ); ?>"><i class="fa fa-vk" aria-hidden="true"></i> <?php esc_html_e( 'Vk', 'viable-blog' ); ?></a></li>
                        <?php endif; ?>
                    	<?php 
                        $youtube_link = get_theme_mod( 'viable_blog_youtube_link', '' );
                        if( !empty( $youtube_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $youtube_link ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i> <?php esc_html_e( 'Youtube', 'viable-blog' ); ?></a></li>
                        <?php endif; ?>
                    </ul><!-- .social_icons_list -->
                </div><!-- .social -->
            </div><!-- .vb_topfooter -->
        	<?php endif; ?>
        	<?php if( is_active_sidebar( 'footer' ) ) : ?>
            <div class="vb_midfooter">
                <div class="row">
                	<?php dynamic_sidebar( 'footer' ); ?>
                </div><!-- .row -->
            </div><!-- .vb_midfooter -->
        	<?php endif; ?>
        </div><!-- .vb_container -->
        <?php if( get_theme_mod( 'viable_blog_copyright_text', '' ) || has_nav_menu( 'footer-menu' ) ) : ?>
        <div class="vb_bottomfooter">
            <div class="vb_container">
                <div class="row">
                	<?php 
                	/**
                     * Hook - viable_blog_copyright_text.
                     *
                     * @hooked viable_blog_copyright_text_action - 1
                     */
                    do_action( 'viable_blog_copyright_text' ); 

                	/**
                     * Hook - viable_blog_footer_menu.
                     *
                     * @hooked viable_blog_footer_menu_action - 1
                     */
                    do_action( 'viable_blog_footer_menu' ); 
                	?>
                </div>
                <!-- // row -->
            </div>
            <!-- // vb_container -->
        </div><!-- .vb_bottomfooter -->
        <?php endif; ?>
    </footer><!-- .footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
