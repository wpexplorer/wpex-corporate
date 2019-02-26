<?php
/**
 * Portfolio single meta
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<ul class="post-meta clr">
	<li class="meta-date">
		<?php esc_html_e( 'Posted on', 'wpex-corporate' ); ?>
		<span class="meta-date-text"><?php echo get_the_date(); ?></span>
	</li>
	<li class="meta-category">
		<span class="meta-seperator">/</span><?php esc_html_e( 'Under', 'wpex-corporate' ); ?>
		<?php wpex_list_post_terms( 'portfolio_category' ); ?>
	</li>
	<?php if ( comments_open() ) { ?>
		<li class="meta-comments comment-scroll">
			<span class="meta-seperator">/</span><?php esc_html_e( 'With', 'wpex-corporate' ); ?>
			<?php comments_popup_link( esc_html__( '0 Comments', 'wpex-corporate' ), esc_html__( '1 Comment',  'wpex-corporate' ), esc_html__( '% Comments', 'wpex-corporate' ), 'comments-link' ); ?>
		</li>
	<?php } ?>
</ul><!-- .post-meta -->