 <?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments and the comment
 * form. The actual display of comments is handled by a callback to
 * wpex_comment() which is located at functions/comments-callback.php
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */


// Bail if password protected and user hasn't entered password
if ( post_password_required() ) {
	return;
}

// Comments are closed and empty, do nothing
if ( ! comments_open() && get_comment_pages_count() == 0 ) {
	return;
} ?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) { ?>
		<h2 id="comments-title" class="heading">
			<span>
				<?php
				// Display Comments Title
				$comments_number = number_format_i18n( get_comments_number() );
				if ( '1' == $comments_number ) {
					$comments_title = esc_html__( 'This article has 1 comment', 'corporate' );
				} else {
					$comments_title = sprintf( esc_html__( 'This article has %s comments', 'corporate' ), $comments_number );
				}
				$comments_title = apply_filters( 'wpex_comments_title', $comments_title );
				echo $comments_title; ?>
			</span>
		</h2>
		<ol class="commentlist">
			<?php wp_list_comments( array(
				'callback'	=> 'wpex_comment',
			) ); ?>
		</ol><!-- .commentlist -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<nav class="navigation comment-navigation row clr" role="navigation">
				<h4 class="assistive-text section-heading heading"><span><?php esc_html_e( 'Comment navigation', 'corporate' ); ?></span></h4>
				<div class="nav-previous span_12 col clr-margin"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'corporate' ) ); ?></div>
				<div class="nav-next span_12 col"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'corporate' ) ); ?></div>
			</nav>
		<?php } ?>
	<?php } // have_comments() ?>
	<?php comment_form(); ?>
</div><!-- #comments -->