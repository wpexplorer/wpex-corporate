<?php
/**
 * Portfolio single layout
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<article class="clr">
	<?php get_template_part( 'partials/portfolio-single-media' ); ?>
	<?php get_template_part( 'partials/portfolio-single-header' ); ?>
	<?php get_template_part( 'partials/portfolio-single-content' ); ?>
	<?php get_template_part( 'partials/link-pages' ); ?>
	<?php get_template_part( 'partials/edit-post' ); ?>
	<?php if ( get_theme_mod( 'wpex_portfolio_comments' ) ) {
		comments_template();
	} ?>
	<?php get_template_part( 'partials/portfolio-single-related' ); ?>
</article><!-- .clr -->