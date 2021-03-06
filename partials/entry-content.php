<?php
/**
 * Displays post entry content
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="loop-entry-content entry clr">

	<?php
	// Display full content
	if ( get_theme_mod( 'wpex_entry_content_excerpt','excerpt' ) == 'content' ) {
		the_content();
	}
	// Display custom excerpt
	else {
		wpex_excerpt( 93, get_theme_mod( 'wpex_blog_readmore', true ) );
	} ?>

</div><!-- .loop-entry-content -->