<?php
/**
 * Default post entry layout
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'partials/entry-thumbnail' ); ?>

	<div class="loop-entry-text clr">

		<?php
		// Display entry header
		get_template_part( 'partials/entry-header' ); ?>

		<?php
		// Display entry content
		get_template_part( 'partials/entry-content' ); ?>

	</div><!-- .loop-entry-text -->

</article><!-- .loop-entry -->