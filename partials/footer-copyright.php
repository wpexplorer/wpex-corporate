<?php
/**
 * The default template for displaying the footer copyright
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get copyright text
$copy = get_theme_mod( 'wpex_copyright', 'Corporate <a href="http://www.wordpress.org" title="WordPress" target="_blank">WordPress</a> Theme Designed &amp; Developed by <a href="http://themeforest.net/user/WPExplorer?ref=WPExplorer" target="_blank" title="WPExplorer">WPExplorer</a>' ); ?>

<footer id="copyright-wrap" class="clear">
	<div id="copyright" role="contentinfo" class="clr">
		<?php
		// Display custom copyright
		if ( $copy ) {
			echo do_shortcode( $copy );
		// Copyright fallback
		} else { ?>
			&copy; <?php esc_html_e( 'Copyright', 'corporate' ); ?> <?php the_date( 'Y' ); ?> &middot; <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
		<?php } ?>
	</div><!-- #copyright -->
</footer><!-- #footer-wrap -->