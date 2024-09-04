<?php
/**
 * Portfolio single gallery
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Get gallery image ids
$attachments = wpex_get_gallery_ids();

// Return if there aren't any images
if ( ! $attachments ) {
	return;
}

wp_enqueue_script( 'wpex-post-slider' );

?>

<div class="post-slider-wrap clr flexslider-container">

	<div class="post-slider flexslider">

		<ul class="slides clr wpex-lightbox-gallery">

			<?php
			// Loop through each attachment ID
			foreach ( $attachments as $attachment ) :
				if ( $image = wp_get_attachment_image( $attachment, 'wpex-portfolio-post' ) ) { ?>
					<li><?php echo $image; ?></li>
				<?php
				}
			endforeach; ?>

		</ul><!-- .slides -->

	</div><!-- .post-slider .flexslider -->

</div><!-- .post-slider-wrap -->