<?php
/**
 * Post edit link
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>

<footer class="entry-footer">
	<?php edit_post_link( esc_html__( 'Edit Post', 'wpex-corporate' ), '<span class="edit-link clr">', '</span>' ); ?>
</footer><!-- .entry-footer -->