<?php
/**
 * Post single media
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

// Return if password protected
if ( post_password_required() ) {
	return;
}

// Get post format
$format = get_post_format();

// Video
if ( 'video' == $format ) {
	get_template_part( 'partials/post-video' );
} elseif ( has_post_thumbnail() ) {
	get_template_part( 'partials/post-thumbnail' );
}