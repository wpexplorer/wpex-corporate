<?php
/**
 * Portfolio single video
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Get video
$video_url = get_post_meta( get_the_ID(), 'wpex_post_video', true );

// Return if there isn't any video
if ( ! $video_url ) {
	return;
} ?>

<div class="post-video wpex-video-embed clr"><?php

	echo wp_oembed_get( $video_url );

?></div>