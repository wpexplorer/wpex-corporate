<?php
/**
 * The Template for displaying your single portfolio posts
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div id="primary" class="content-area clr">

		<main id="content" class="site-content" role="main">

			<?php get_template_part( 'partials/portfolio-single' ); ?>

		</main><!-- #content -->

	</div><!-- #primary -->

<?php endwhile; ?>

<?php get_footer(); ?>