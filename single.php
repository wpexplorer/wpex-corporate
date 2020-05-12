<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div id="primary" class="content-area clr">

		<main id="content" class="site-content left-content clr" role="main">

			<?php include( locate_template( 'partials/post-layout.php' ) ); ?>
			
		</main><!-- #content -->

		<?php get_sidebar(); ?>

	</div><!-- #primary -->

<?php endwhile; ?>

<?php get_footer(); ?>