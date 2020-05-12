<?php
/**
 * Main Header Layout
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>

<div id="header-wrap" class="clr">

    <header id="header" class="site-header clr" role="banner">

        <?php get_template_part( 'partials/header-branding' ); ?>
        
        <?php get_template_part( 'partials/header-search' ); ?>

    </header><!-- #header -->

</div><!-- #header-wrap -->