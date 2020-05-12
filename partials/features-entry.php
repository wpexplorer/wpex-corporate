<?php
/**
 * The default template for displaying features entries
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

// Get and sanitize feature URL
$url	= get_post_meta( get_the_ID(), 'wpex_feature_url', true );
$url	= esc_attr( $url );
$url	= $url ? '<a href="'. $url .'" title="'. wpex_get_esc_title() .'" target="_blank">' : ''; ?>

<article id="id-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	// Display Thumbnail
	if ( has_post_thumbnail() ) : ?>

		<div class="feature-thumbnail">
			<?php if ( $url ) echo $url; ?>
			<?php
			// Display post thumbnail
			the_post_thumbnail( 'full', array(
				'alt'	=> wpex_get_esc_title(),
			) ); ?>
			<?php if ( $url ) echo '</a>'; ?>
		</div><!-- .feature-thumbnail -->

	<?php endif; ?>

	<header class="feature-entry-header clr">

		<h2 class="feature-entry-title">
			<?php
			// Display icon if defined
			if ( $icon = get_post_meta( get_the_ID(), 'wpex_icon_font', true ) ) { ?>
				<span class="feature-icon-font"><span class="fa fa-<?php echo $icon; ?>"></span></span>
			<?php } ?>
			<?php
			// Display title with URL
			if ( $url ) {
				echo $url . get_the_title() .'</a>';
			}
			// Display plain title
			else {
				the_title();
			} ?>
		</h2>

	</header><!-- .feature-entry-header -->

	<div class="feature-entry-content entry clr">

		<?php the_content(); ?>
		
	</div><!-- .feature-entry-content -->

</article>