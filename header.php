<?php
/**
 * The Header for our theme.
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wpex-corporate' ); ?></a>

	<?php wp_body_open(); ?>

	<div id="wrap" class="clr container">

		<?php get_template_part( 'partials/header-layout' ); ?>

		<?php get_template_part( 'partials/nav-main' ); ?>

		<div id="main" class="site-main clr">