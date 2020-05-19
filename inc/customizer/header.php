<?php
/**
 * Customizer Header Settings
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

function wpex_customizer_general( $wp_customize ) {

	$wp_customize->add_section( 'wpex_header_section' , array(
		'title' => esc_html__( 'Header', 'wpex-corporate' ),
	) );

	$wp_customize->add_setting( 'wpex_logo', array(
		'type' => 'theme_mod',
		'sanitize_callback'  => 'esc_url',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpex_logo', array(
		'label' => esc_html__('Image Logo','wpex-corporate'),
		'section' => 'wpex_header_section',
		'settings' => 'wpex_logo',
	) ) );

	$wp_customize->add_setting( 'wpex_header_search', array(
		'type' => 'theme_mod',
		'default' => true,
		'sanitize_callback'  => 'absint',
	) );

	$wp_customize->add_control( 'wpex_header_search', array(
		'label' => esc_html__( 'Header Search', 'wpex-corporate' ),
		'section' => 'wpex_header_section',
		'settings' => 'wpex_header_search',
		'type' => 'checkbox',
	) );

}
add_action( 'customize_register', 'wpex_customizer_general' );