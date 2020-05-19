<?php
/**
 * Template Name: Fullwidth
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

	<div id="primary" class="content-area clr">

		<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'partials/page-layout' ); ?>

			<?php endwhile; ?>

		</div><!-- #content -->

	</div><!-- #primary -->

<?php get_footer(); ?>