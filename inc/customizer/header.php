<?php
/**
 * Customizer Header Settings
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */

function wpex_customizer_general( $wp_customize ) {

	$wp_customize->add_section( 'wpex_header_section' , array(
		'title'		=> esc_html__( 'Header', 'corporate' ),
		'priority'	=> 200,
	) );

	$wp_customize->add_setting( 'wpex_logo', array(
		'type'			=> 'theme_mod',
		'sanitization'	=> false,
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpex_logo', array(
		'label'		=> esc_html__('Image Logo','corporate'),
		'section'	=> 'wpex_header_section',
		'settings'	=> 'wpex_logo',
		'priority'	=> 1,
	) ) );

	$wp_customize->add_setting( 'wpex_header_search', array(
		'type'			=> 'theme_mod',
		'default'		=> true,
		'sanitization'	=> false,
	) );

	$wp_customize->add_control( 'wpex_header_search', array(
		'label'		=> esc_html__( 'Header Search', 'corporate' ),
		'section'	=> 'wpex_header_section',
		'settings'	=> 'wpex_header_search',
		'priority'	=> 2,
		'type'		=> 'checkbox',
	) );
		
}
add_action( 'customize_register', 'wpex_customizer_general' );