<?php
/**
 * Portfolio single video
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! has_post_thumbnail() ) {
	return;
} ?>

<div class="post-thumbnail clr">
	<?php the_post_thumbnail( 'wpex-portfolio-post' ); ?>
</div><!-- .post-thumbnail -->