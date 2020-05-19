<?php
/**
 * Displays the page header
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Not needed on the front-page
if ( is_front_page() ) {
	return;
} ?>

<header class="page-header clr">
	<h1 class="page-header-title"><?php the_title(); ?></h1>
</header><!-- #page-header -->