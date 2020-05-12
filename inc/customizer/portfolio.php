<?php
/**
 * Customizer Portfolio Settings
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */

function wpex_customizer_portfolio( $wp_customize ) {

	// Portfolio Section
	$wp_customize->add_section( 'wpex_portfolio' , array(
		'title'		=> esc_html__( 'Portfolio', 'corporate' ),
		'priority'	=> 201,
	) );
	
	// Enable/Disable Portfolio
	$wp_customize->add_setting( 'wpex_portfolio', array(
		'type'			=> 'theme_mod',
		'default'		=> '1',
		'sanitization'	=> false,
	) );

	$wp_customize->add_control( 'wpex_portfolio', array(
		'label'		=> esc_html__( 'Portfolio Post Type', 'corporate' ),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_portfolio',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Portfolio Comments
	$wp_customize->add_setting( 'wpex_portfolio_comments', array(
		'type'			=> 'theme_mod',
		'default'		=> '',
		'sanitization'	=> false,
	) );

	$wp_customize->add_control( 'wpex_portfolio_comments', array(
		'label'		=> esc_html__( 'Portfolio Comments', 'corporate' ),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_portfolio_comments',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Portfolio Related
	$wp_customize->add_setting( 'wpex_portfolio_related', array(
		'type'			=> 'theme_mod',
		'default'		=> '1',
		'sanitization'	=> false,
	) );

	$wp_customize->add_control( 'wpex_portfolio_related', array(
		'label'		=> esc_html__( 'Portfolio Related', 'corporate' ),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_portfolio_related',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Posts Per Page - Homepage
	$wp_customize->add_setting( 'wpex_home_portfolio_count', array(
		'type'			=> 'theme_mod',
		'default'		=> '4',
		'sanitization'	=> false,
	) );
	
	$wp_customize->add_control( 'wpex_home_portfolio_count', array(
		'label'		=> esc_html__( 'Portfolio Homepage Posts Per Page', 'corporate' ),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_home_portfolio_count',
		'type'		=> 'text',
		'priority'	=> '2',
	) );

	// Posts Per Page - Archive
	$wp_customize->add_setting( 'wpex_portfolio_posts_per_page', array(
		'type'			=> 'theme_mod',
		'default'		=> '12',
		'sanitization'	=> false,
	) );
	
	$wp_customize->add_control( 'wpex_portfolio_posts_per_page', array(
		'label'		=> esc_html__( 'Archive Posts Per Page', 'corporate' ),
		'section'	=> 'wpex_portfolio',
		'settings'	=> 'wpex_portfolio_posts_per_page',
		'type'		=> 'text',
		'priority'	=> '2',
	) );

}
add_action( 'customize_register', 'wpex_customizer_portfolio' );