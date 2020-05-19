<?php
/**
 * Template Name: Homepage
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

get_header(); ?>

	<div id="primary" class="content-area clr">

		<main id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article class="homepage-wrap clr">

					<?php get_template_part( 'partials/home-layout' ); ?>

				</article><!-- #post -->

			<?php endwhile; ?>

		</main><!-- #content -->

	</div><!-- #primary -->

<?php get_footer(); ?>