<?php
/**
 * The default template for displaying the footer copyright
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get copyright text
$copy = get_theme_mod( 'wpex_copyright' );
$copy = $copy ? $copy : '<a href="https://www.wpexplorer.com/corporate-free-wordpress-theme/" title="Corporate WordPress Theme">Corporate Theme</a> by <a href="https://www.wpexplorer.com" title="WPExplorer Themes">WPExplorer</a> Powered by <a href="https://wordpress.org/" title="WordPress">WordPress</a>'; ?>

<footer id="copyright-wrap" class="clear">
	<div id="copyright" role="contentinfo" class="clr">
		<?php echo do_shortcode( wp_kses_post( $copy ) );?>
	</div><!-- #copyright -->
</footer><!-- #footer-wrap -->