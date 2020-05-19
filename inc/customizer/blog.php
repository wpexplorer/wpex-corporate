<?php
/**
 * Customizer Blog settings
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

function wpex_customizer_blog($wp_customize) {

	// Blog Section
	$wp_customize->add_section( 'wpex_blog' , array(
		'title' => esc_html__( 'Blog', 'wpex-corporate' ),
	) );

	// Enable/Disable Readmore
	$wp_customize->add_setting( 'wpex_blog_readmore', array(
		'type' => 'theme_mod',
		'default' => '1',
		'sanitize_callback'  => 'absint',
	) );

	$wp_customize->add_control( 'wpex_blog_readmore', array(
		'label'		=> esc_html__('Read More Link','wpex-corporate'),
		'section'	=> 'wpex_blog',
		'settings'	=> 'wpex_blog_readmore',
		'type'		=> 'checkbox',
	) );

	// Enable/Disable Featured Images on Entries
	$wp_customize->add_setting( 'wpex_blog_entry_thumb', array(
		'type'			=> 'theme_mod',
		'default'		=> '1',
		'sanitize_callback'  => 'absint',
	) );

	$wp_customize->add_control( 'wpex_blog_entry_thumb', array(
		'label'		=> esc_html__('Featured Image on Entries','wpex-corporate'),
		'section'	=> 'wpex_blog',
		'settings'	=> 'wpex_blog_entry_thumb',
		'type'		=> 'checkbox',
	) );

	// Enable/Disable Featured Images on Posts
	$wp_customize->add_setting( 'wpex_blog_post_thumb', array(
		'type' => 'theme_mod',
		'default' => '1',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'wpex_blog_post_thumb', array(
		'label'		=> esc_html__('Featured Image on Posts','wpex-corporate'),
		'section'	=> 'wpex_blog',
		'settings'	=> 'wpex_blog_post_thumb',
		'type'		=> 'checkbox',
	) );

}
add_action( 'customize_register', 'wpex_customizer_blog' );