<?php
/**
 * Customizer Copyright Settings
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */

function wpex_customizer_copyright( $wp_customize ) {

	// Copyright Section
	$wp_customize->add_section( 'wpex_copyright' , array(
		'title'		=> esc_html__( 'Copyright', 'corporate' ),
		'priority'	=> 204,
	) );
	$wp_customize->add_setting( 'wpex_copyright', array(
		'type'			=> 'theme_mod',
		'default'		=> 'Corporate <a href="http://www.wordpress.org" title="WordPress" target="_blank">WordPress</a> Theme Designed &amp; Developed by <a href="http://themeforest.net/user/WPExplorer?ref=WPExplorer" target="_blank" title="WPExplorer">WPExplorer</a>',
		'sanitization'	=> false,
	) );

	$wp_customize->add_control( 'wpex_copyright', array(
		'label'		=> esc_html__( 'Custom Copyright', 'corporate' ),
		'section'	=> 'wpex_copyright',
		'settings'	=> 'wpex_copyright',
		'type'		=> 'textarea',
	) );
		
}
add_action( 'customize_register', 'wpex_customizer_copyright' );