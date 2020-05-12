<?php
/**
 * Customizer Staff Settings
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */

function wpex_customizer_staff( $wp_customize ) {

	// Staff Section
	$wp_customize->add_section( 'wpex_staff' , array(
		'title'		=> esc_html__( 'Staff', 'corporate' ),
		'priority'	=> 202,
	) );
	
	// Enable/Disable Staff
	$wp_customize->add_setting( 'wpex_staff', array(
		'type'			=> 'theme_mod',
		'default'		=> '1',
		'sanitization'	=> false,
	) );

	$wp_customize->add_control( 'wpex_staff', array(
		'label'		=> esc_html__( 'Staff Post Type', 'corporate' ),
		'section'	=> 'wpex_staff',
		'settings'	=> 'wpex_staff',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Staff Comments
	$wp_customize->add_setting( 'wpex_staff_comments', array(
		'type'			=> 'theme_mod',
		'default'		=> '',
		'sanitization'	=> false,
	) );

	$wp_customize->add_control( 'wpex_staff_comments', array(
		'label'		=> esc_html__( 'Staff Comments', 'corporate' ),
		'section'	=> 'wpex_staff',
		'settings'	=> 'wpex_staff_comments',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Posts Per Page - Archive
	$wp_customize->add_setting( 'wpex_staff_posts_per_page', array(
		'type'			=> 'theme_mod',
		'default'		=> '9',
		'sanitization'	=> false,
	) );
	
	$wp_customize->add_control( 'wpex_staff_posts_per_page', array(
		'label'		=> esc_html__( 'Archive Posts Per Page', 'corporate' ),
		'section'	=> 'wpex_staff',
		'settings'	=> 'wpex_staff_posts_per_page',
		'type'		=> 'text',
		'priority'	=> '2',
	) );

}
add_action( 'customize_register', 'wpex_customizer_staff' );