<?php
/**
 * Post single meta
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

<ul class="post-meta clr">

	<li class="meta-date">
		<?php esc_html_e( 'Posted on', 'corporate' ); ?>
		<span class="meta-date-text"><?php echo get_the_date(); ?></span>
	</li>

	<?php if ( $terms = wpex_list_post_terms( 'category', false ) ) : ?>
		<li class="meta-category">
			<span class="meta-seperator">/</span><?php esc_html_e( 'Under', 'corporate' ); ?>
			<?php echo $terms; ?>
		</li>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
		<li class="meta-comments comment-scroll">
			<span class="meta-seperator">/</span><?php esc_html_e( 'With', 'corporate' ); ?>
			<?php comments_popup_link( __( '0 Comments', 'corporate' ), __( '1 Comment',  'corporate' ), __( '% Comments', 'corporate' ), 'comments-link' ); ?>
		</li>
	<?php endif; ?>

</ul><!-- .post-meta -->