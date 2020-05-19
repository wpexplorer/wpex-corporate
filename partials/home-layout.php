<?php
/**
 * Homepage Layout
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Display homepage slides
get_template_part( 'partials/home-slider' );

// Display homepage content
get_template_part( 'partials/home-content' );

// Display homepage features
get_template_part( 'partials/home-features' );

// Display homepage portfolio items
get_template_part( 'partials/home-portfolio' );