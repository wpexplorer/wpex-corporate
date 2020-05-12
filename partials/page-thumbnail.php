<?php
/**
 * Displays the page thumbnail
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Return if there isn't a thumbnail defined
if ( ! has_post_thumbnail() ) {
	return;
} ?>

<div class="page-thumbnail clr">
	<?php the_post_thumbnail( 'wpex-page-thumbnail', array( 'alt' => wpex_get_esc_title(), ) ); ?>
</div><!-- .page-thumbnail -->