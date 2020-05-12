<?php
/**
 * Header Search
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

// Return if disabled
if ( ! get_theme_mod( 'wpex_header_search', true ) ) {
    return;
} ?>

<aside id="header-search" class="clr">
    <?php get_search_form(); ?>
</aside><!-- #header-search -->