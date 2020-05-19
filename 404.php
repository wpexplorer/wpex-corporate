<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

	<div id="primary" class="content-area clr">

		<main id="content" class="site-content clr" role="main">

			<div id="error-page" class="clr">

				<h1 id="error-page-title"><?php echo esc_html__( '404', 'wpex-corporate' ); ?></h1>

				<p id="error-page-text">
					<?php esc_html_e( 'Unfortunately, the page you tried accessing could not be retrieved.', 'wpex-corporate' ); ?>
				</p>

			</div><!-- #error-page -->

		</main><!-- #content -->

	</div><!-- #primary -->

<?php get_footer(); ?>