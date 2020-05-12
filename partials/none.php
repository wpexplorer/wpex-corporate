<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */
?>

<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>
		<p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'corporate' ), admin_url( 'post-new.php' ) ); ?></p>
	<?php } elseif ( is_search() ) { ?>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'corporate' ); ?></p>
	<?php } elseif ( is_category() ) { ?>
		<p><?php esc_html_e( 'There aren\'t any posts currently published in this category.', 'corporate' ); ?></p>
	<?php } elseif ( is_tax() ) { ?>
		<p><?php esc_html_e( 'There aren\'t any posts currently published under this taxonomy.', 'corporate' ); ?></p>
	<?php } elseif ( is_tag() ) { ?>
		<p><?php esc_html_e( 'There aren\'t any posts currently published under this tag.', 'corporate' ); ?></p>
	<?php } else { ?>
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'corporate' ); ?></p>
	<?php } ?>
</div><!-- .page-content -->