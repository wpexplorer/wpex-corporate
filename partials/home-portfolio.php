<?php
/**
 * Homepage Portfolio
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
if ( ! get_theme_mod( 'wpex_homepage_portfolio', true ) ) {
	return;
}

// Query posts
$args = apply_filters( 'wpex_homepage_portfolio_args', array(
	'post_type'			=> 'portfolio',
	'posts_per_page'	=> get_theme_mod('wpex_home_portfolio_count', '4'),
	'no_found_rows'		=> true,
) );
$wpex_query = new WP_Query( $args );

// Display portfolio posts
if ( $wpex_query->posts ) : ?>

	<div id="homepage-portfolio" class="clr">

		<h2 class="heading"><span><?php echo get_theme_mod( 'wpex_homepage_portfolio_heading', esc_html__( 'Recent Work', 'corporate' ) ); ?></span></h2>

		<div class="wpex-row clr">
			<?php
			$wpex_count=0;
			foreach( $wpex_query->posts as $post ) : setup_postdata( $post );
				$wpex_count++;
				get_template_part( 'partials/portfolio-entry', get_post_format() );
				if ( '4' == $wpex_count ) {
					$wpex_count=0;
				}
			endforeach; ?>
		</div><!-- .wpex-row -->

	</div><!-- #homepage-portfolio -->

<?php
// End posts check
endif;

// Reset post data
wp_reset_postdata();