<?php
/**
 * The default template for displaying portfolio entries
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="portfolio-entry-media clr">
			<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>" class="overlayparent">
				<?php
				// Display post thumbnail
				the_post_thumbnail( 'wpex-portfolio-entry', array(
					'alt'	=> wpex_get_esc_title(),
					'class'	=> 'portfolio-entry-img',
				) ); ?>
				<div class="overlay"><h3><?php the_title(); ?></h3></div>
			</a>
		</div><!-- .portfolio-entry-media -->
	<?php } ?>
</article><!-- .portfolio-entry -->