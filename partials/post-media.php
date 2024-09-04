<?php
/**
 * Post single media
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

get_template_part( 'partials/post-thumbnail' );
