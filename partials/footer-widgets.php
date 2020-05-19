<?php
/**
 * Footer widgets
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>

<div id="footer-widgets" class="wpex-row clr">

	<div class="footer-box span_1_of_3 col col-1">
		<?php dynamic_sidebar( 'footer-one' ); ?>
	</div><!-- .footer-box -->

	<div class="footer-box span_1_of_3 col col-2">
		<?php dynamic_sidebar( 'footer-two' ); ?>
	</div><!-- .footer-box -->

	<div class="footer-box span_1_of_3 col col-3">
		<?php dynamic_sidebar( 'footer-three' ); ?>
	</div><!-- .footer-box -->
	
</div><!-- #footer-widgets -->