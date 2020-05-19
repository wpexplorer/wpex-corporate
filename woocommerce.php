<?php
get_header(); ?>

	<div id="primary" class="content-area clr">
		<main id="content" class="site-content left-content" role="main">
			<?php woocommerce_content() ?>
		</main><!-- #content -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->
<?php get_footer(); ?>