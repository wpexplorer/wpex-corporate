<?php
/**
 * Main Header Layout
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

$header_class = 'clr';

if ( get_theme_mod( 'wpex_header_center', false ) ) {
	$header_class .= ' header-centered';
}

?>

<div id="header-wrap" class="<?php echo esc_attr( $header_class ); ?>">

    <header id="header" class="site-header clr" role="banner">

        <?php get_template_part( 'partials/header-branding' ); ?>
        
        <?php get_template_part( 'partials/header-search' ); ?>

    </header><!-- #header -->

</div><!-- #header-wrap -->