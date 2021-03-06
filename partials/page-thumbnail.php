<?php
/**
 * Displays the page thumbnail
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Return if there isn't a thumbnail defined
if ( ! has_post_thumbnail() ) {
	return;
} ?>

<div class="page-thumbnail clr">
	<?php the_post_thumbnail( 'wpex-page-thumbnail' ); ?>
</div><!-- .page-thumbnail -->