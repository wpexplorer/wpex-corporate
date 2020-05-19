<?php
defined( 'ABSPATH' ) || exit;

/**
 * Customizer Portfolio Settings
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

function wpex_customizer_portfolio( $wp_customize ) {

	// Portfolio Section
	$wp_customize->add_section( 'wpex_portfolio' , array(
		'title' => esc_html__( 'Portfolio', 'wpex-corporate' ),
	) );

	// Enable/Disable Portfolio
	$wp_customize->add_setting( 'wpex_portfolio', array(
		'type' => 'theme_mod',
		'default' => '1',
		'sanitize_callback'  => 'absint',
	) );

	$wp_customize->add_control( 'wpex_portfolio', array(
		'label'		=> esc_html__( 'Enable Portfolio', 'wpex-corporate' ),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_portfolio',
		'type'		=> 'checkbox',
		'description' => esc_html__( 'You must save and refresh live site after changing this setting.', 'wpex-corporate' ),
	) );

	// Enable/Disable Portfolio Comments
	$wp_customize->add_setting( 'wpex_portfolio_comments', array(
		'type'			=> 'theme_mod',
		'default'		=> '',
		'sanitize_callback'  => 'absint',
	) );

	$wp_customize->add_control( 'wpex_portfolio_comments', array(
		'label'		=> esc_html__( 'Portfolio Comments', 'wpex-corporate' ),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_portfolio_comments',
		'type'		=> 'checkbox',
	) );

	// Enable/Disable Portfolio Related
	$wp_customize->add_setting( 'wpex_portfolio_related', array(
		'type'			=> 'theme_mod',
		'default'		=> '1',
		'sanitize_callback'  => 'absint',
	) );

	$wp_customize->add_control( 'wpex_portfolio_related', array(
		'label'		=> esc_html__( 'Portfolio Related', 'wpex-corporate' ),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_portfolio_related',
		'type'		=> 'checkbox',
	) );

	// Posts Per Page - Homepage
	$wp_customize->add_setting( 'wpex_home_portfolio_count', array(
		'type'			=> 'theme_mod',
		'default'		=> '4',
		'sanitize_callback'  => 'absint',
	) );

	$wp_customize->add_control( 'wpex_home_portfolio_count', array(
		'label'		=> esc_html__( 'Homepage Items Count', 'wpex-corporate' ),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_home_portfolio_count',
		'type'		=> 'text',
	) );

	// Posts Per Page - Archive
	$wp_customize->add_setting( 'wpex_portfolio_posts_per_page', array(
		'type'			=> 'theme_mod',
		'default'		=> '12',
		'sanitize_callback'  => 'absint',
	) );

	$wp_customize->add_control( 'wpex_portfolio_posts_per_page', array(
		'label'		=> esc_html__( 'Archive Posts Per Page', 'wpex-corporate' ),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_portfolio_posts_per_page',
		'type'		=> 'text',
	) );

}
add_action( 'customize_register', 'wpex_customizer_portfolio' );