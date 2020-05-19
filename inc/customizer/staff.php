<?php
defined( 'ABSPATH' ) || exit;

/**
 * Customizer Staff Settings
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

function wpex_customizer_staff( $wp_customize ) {

	// Staff Section
	$wp_customize->add_section( 'wpex_staff' , array(
		'title' => esc_html__( 'Staff', 'wpex-corporate' ),
	) );

	// Enable/Disable Staff
	$wp_customize->add_setting( 'wpex_staff', array(
		'type'			=> 'theme_mod',
		'default'		=> '1',
		'sanitize_callback'  => 'absint',
	) );

	$wp_customize->add_control( 'wpex_staff', array(
		'label'		=> esc_html__( 'Enable Staff', 'wpex-corporate' ),
		'section'	=> 'wpex_staff',
		'settings'	=> 'wpex_staff',
		'type'		=> 'checkbox',
		'description' => esc_html__( 'You must save and refresh live site after changing this setting.', 'wpex-corporate' ),
	) );

	// Enable/Disable Staff Comments
	$wp_customize->add_setting( 'wpex_staff_comments', array(
		'type'			=> 'theme_mod',
		'default'		=> '',
		'sanitize_callback'  => 'absint',
	) );

	$wp_customize->add_control( 'wpex_staff_comments', array(
		'label'		=> esc_html__( 'Staff Comments', 'wpex-corporate' ),
		'section'	=> 'wpex_staff',
		'settings'	=> 'wpex_staff_comments',
		'type'		=> 'checkbox',
	) );

	// Posts Per Page - Archive
	$wp_customize->add_setting( 'wpex_staff_posts_per_page', array(
		'type'			=> 'theme_mod',
		'default'		=> '9',
		'sanitize_callback'  => 'absint',
	) );

	$wp_customize->add_control( 'wpex_staff_posts_per_page', array(
		'label'		=> esc_html__( 'Archive Posts Per Page', 'wpex-corporate' ),
		'section'	=> 'wpex_staff',
		'settings'	=> 'wpex_staff_posts_per_page',
		'type'		=> 'text',
	) );

}
add_action( 'customize_register', 'wpex_customizer_staff' );