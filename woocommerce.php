<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

	<div id="primary" class="content-area clr">
		
		<main id="content" class="site-content left-content" role="main">
			<?php woocommerce_content() ?>
		</main><!-- #content -->
		
		<?php get_sidebar(); ?>
	
	</div><!-- #primary -->

<?php get_footer(); ?>