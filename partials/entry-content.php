<?php
/**
 * Displays post entry content
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get excerpt length
$length = get_theme_mod( 'wpex_blog_excerpt_length', 90 ); ?>

<div class="loop-entry-content entry clr">

	<?php if ( '-1' == $length || get_theme_mod( 'wpex_entry_content_excerpt', 'excerpt' ) == 'content' ) {
		the_content();
	} else {
		wpex_excerpt( $length, get_theme_mod( 'wpex_blog_readmore', true ) );
	} ?>

</div><!-- .loop-entry-content -->