<?php
/**
 * Homepage Layout
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

// Display homepage slides
include( locate_template( 'partials/home-slider.php' ) );

// Display homepage content
get_template_part( 'partials/home-content' );

// Display homepage features
include( locate_template( 'partials/home-features.php' ) );

// Display homepage portfolio items
include( locate_template( 'partials/home-portfolio.php' ) );