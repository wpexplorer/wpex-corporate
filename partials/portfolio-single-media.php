<?php
/**
 * Portfolio single media
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Return if password protected
if ( post_password_required() ) {
	return;
}

// Get post format
$format = get_post_format();

// Portfolio Gallery
if ( 'gallery' == $format ) {
	get_template_part( 'partials/portfolio-single-gallery' );
} elseif ( 'video' == $format ) {
	get_template_part( 'partials/portfolio-single-video' );
} else {
	get_template_part( 'partials/portfolio-single-thumbnail' );
}