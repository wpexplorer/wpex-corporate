<?php
/**
 * Homepage Slider
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

// Return if disabled
if ( ! get_theme_mod( 'wpex_homepage_slider', true ) ) {
    return;
}
					
// Query slides
$wpex_query = new WP_Query( array(
	'post_type'      => 'slides',
	'posts_per_page' => '-1',
	'no_found_rows'  => true,
) );

// Display slides if we find some
if ( $wpex_query->posts ) : ?>

	<div id="homepage-slider-wrap" class="clr flexslider-container">

		<div id="homepage-slider" class="flexslider">

			<ul class="slides clr">

				<?php
				// Loop through posts
				foreach( $wpex_query->posts as $post ) : setup_postdata( $post );

				// Get slider url
				$url = get_post_meta( get_the_ID(), 'wpex_slide_url', true ); ?>

					<li>
						<?php
						// Open link tag
						if ( $url ) { ?>
							<a href="<?php echo esc_url( $url ); ?>" title="<?php wpex_esc_title(); ?>">
						<?php } ?>

						<?php
						// Display post thumbnail
						the_post_thumbnail( 'wpex-home-slider', array(
							'alt'	=> wpex_get_esc_title(),
						) ); ?>

						<?php
						// Close link tag
						if ( $url ) echo '</a>'; ?>

					</li>

				<?php endforeach; ?>

			</ul><!-- .slides -->

		</div><!-- .flexslider -->

	</div><!-- #homepage-slider" -->

<?php endif;

// Reset post data to prevent conflicts with the main query
wp_reset_postdata();