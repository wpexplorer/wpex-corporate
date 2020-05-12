<?php
/**
 * Customizer Blog settings
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */

function wpex_customizer_blog($wp_customize) {

	// Blog Section
	$wp_customize->add_section( 'wpex_blog' , array(
		'title'		=> esc_html__( 'Blog', 'corporate' ),
		'priority'	=> 203,
	) );
	
	// Enable/Disable Readmore
	$wp_customize->add_setting( 'wpex_blog_readmore', array(
		'type'			=> 'theme_mod',
		'default'		=> '1',
		'sanitization'	=> false,
	) );

	$wp_customize->add_control( 'wpex_blog_readmore', array(
		'label'		=> esc_html__('Read More Link','corporate'),
		'section'	=> 'wpex_blog',
		'settings'	=> 'wpex_blog_readmore',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Featured Images on Entries
	$wp_customize->add_setting( 'wpex_blog_entry_thumb', array(
		'type'			=> 'theme_mod',
		'default'		=> '1',
		'sanitization'	=> false,
	) );

	$wp_customize->add_control( 'wpex_blog_entry_thumb', array(
		'label'		=> esc_html__('Featured Image on Entries','corporate'),
		'section'	=> 'wpex_blog',
		'settings'	=> 'wpex_blog_entry_thumb',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Featured Images on Posts
	$wp_customize->add_setting( 'wpex_blog_post_thumb', array(
		'type'			=> 'theme_mod',
		'default'		=> '1',
		'sanitization'	=> false,
	) );

	$wp_customize->add_control( 'wpex_blog_post_thumb', array(
		'label'		=> esc_html__('Featured Image on Posts','corporate'),
		'section'	=> 'wpex_blog',
		'settings'	=> 'wpex_blog_post_thumb',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );	
		
}
add_action( 'customize_register', 'wpex_customizer_blog' );