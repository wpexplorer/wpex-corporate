<?php
/**
 * The default template for displaying features entries
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

// Get and sanitize feature URL
$url = get_post_meta( get_the_ID(), 'wpex_feature_url', true ); ?>

<article id="id-<?php the_ID(); ?>" <?php post_class( 'feature-entry' ); ?>>

	<?php if ( $url ) {
		echo '<a href="' . esc_url( $url ) . '"';

			if ( true === wp_validate_boolean( get_post_meta( get_the_ID(), 'wpex_feature_url_target', true ) ) ) {

				echo ' target="_blank" rel="noopener noreferrer"';

			}

		echo '>';
	} ?>

	<?php
	// Display Thumbnail
	if ( has_post_thumbnail() ) : ?>

		<div class="feature-thumbnail">
			<?php the_post_thumbnail( 'full' ); ?>
		</div><!-- .feature-thumbnail -->

	<?php endif; ?>

	<header class="feature-entry-header clr">

		<h2 class="feature-entry-title">
			<?php
			// Display icon if defined
			if ( $icon = get_post_meta( get_the_ID(), 'wpex_icon_font', true ) ) {
				if ( true !== wp_validate_boolean( get_post_meta( get_the_ID(), 'wpex_custom_icon_class', true ) ) ) {
					$icon = str_replace( 'fa-', '', $icon );
					$icon = str_replace( 'fa ', '', $icon );
					$icon = 'fa fa-' . $icon;
				} ?>
				<span class="feature-icon-font"><span class="<?php echo esc_attr( $icon ); ?>" aria-hidden="true"></span></span>
			<?php } ?>
			<?php the_title(); ?>
		</h2>

	</header><!-- .feature-entry-header -->

	<?php if ( $url ) echo '</a>'; ?>

	<div class="feature-entry-content entry clr">

		<?php the_content(); ?>
		
	</div><!-- .feature-entry-content -->

</article>