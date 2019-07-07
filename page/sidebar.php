<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Viable_Blog
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
$sticky_class = null;
$enable_sticky_sidebar = get_theme_mod( 'viable_blog_enable_sticky_sidebar', 0 );
if( $enable_sticky_sidebar == 1 ) {
	$sticky_class = 'sticky_portion';
} 
?>
<div class="col-md-4 col-sm-12 col-xs-12 <?php echo esc_attr( $sticky_class ); ?>">
	<aside id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside><!-- #secondary -->
</div><!-- .col-*.sticky_portion -->
