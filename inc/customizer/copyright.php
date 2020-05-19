<?php
/**
 * Customizer Copyright Settings
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

function wpex_customizer_copyright( $wp_customize ) {

	// Add section.
	$wp_customize->add_section( 'wpex_copyright' , array(
		'title' => __('Copyright','wpex-corporate'),
	) );

	// Add setting
	$wp_customize->add_setting( 'wpex_copyright', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	// Add control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpex_copyright', array(
		'label'    => esc_html__( 'Copyright Text', 'wpex-corporate' ),
		'section'  => 'wpex_copyright',
		'settings' => 'wpex_copyright',
		'type'     => 'textarea'
	) ) );
}
add_action( 'customize_register', 'wpex_customizer_copyright' );