<?php
/**
 * Homepage Layout
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_template_part( 'partials/home-slider' );

get_template_part( 'partials/home-content' );

get_template_part( 'partials/home-features' );

get_template_part( 'partials/home-portfolio' );