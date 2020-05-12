<?php
/**
 * Post edit link
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

<footer class="entry-footer">
	<?php edit_post_link( esc_html__( 'Edit Post', 'corporate' ), '<span class="edit-link clr">', '</span>' ); ?>
</footer><!-- .entry-footer -->