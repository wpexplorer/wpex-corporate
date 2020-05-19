<?php
defined( 'ABSPATH' ) || exit;

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function wpex_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'wpex_';

	// Slides
	$meta_boxes[] = array(
		'id'			=> 'wpex-slides-meta',
		'title'			=> esc_html__( 'Slide Settings', 'wpex-corporate' ),
		'pages'			=> array( 'slides' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> esc_html__( 'URL', 'wpex-corporate' ),
				'desc'	=>  esc_html__( 'Enter a custom URL to link this slide to. Don\'t forget the http// at the front!', 'wpex-corporate' ),
				'id'	=> $prefix . 'slide_url',
				'type'	=> 'text',
				'std'	=> ''
			),
		),
	);

	// Features
	$meta_boxes[] = array(
		'id'			=> 'wpex-features-meta',
		'title'			=> esc_html__( 'Feature Settings', 'wpex-corporate' ),
		'pages'			=> array( 'features' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> esc_html__( 'Icon Font Class', 'wpex-corporate' ),
				'desc'	=> sprintf( '%s <a href="%s" target="_blank">%s</a>', esc_html__( 'Enter the icon font classname to display an icon instead of a featured image.', 'wpex-corporate' ), 'https://fontawesome.com/v4.7.0/icons/', esc_html__( 'Learn More.', 'wpex-corporate' ) ),
				'id'	=> $prefix . 'icon_font',
				'type'	=> 'text',
				'std'	=> ''
			),
			array(
				'name'	=> esc_html__( 'Is Custom Icon?', 'wpex-corporate' ),
				'desc'	=>  esc_html__( 'Check this box if you are using a custom icon class that is not a part of the FontAwesome script included in the theme.', 'wpex-corporate' ),
				'id'	=> $prefix . 'custom_icon_class',
				'type'	=> 'checkbox',
				'std'	=> 0,
			),
			array(
				'name'	=> esc_html__( 'URL', 'wpex-corporate' ),
				'desc'	=>  esc_html__( 'Enter a custom URL to link this feature to. Don\'t forget the http// at the front! This link will be added to the featured image and title.', 'wpex-corporate' ),
				'id'	=> $prefix . 'feature_url',
				'type'	=> 'text',
				'std'	=> ''
			),
			array(
				'name'	=> esc_html__( 'Open in new tab?', 'wpex-corporate' ),
				'desc'	=>  esc_html__( 'Check the box to open the link in a new tab.', 'wpex-corporate' ),
				'id'	=> $prefix . 'feature_url_target',
				'type'	=> 'checkbox',
				'std'	=> 0,
			),
		),
	);

	// Posts
	$meta_boxes[] = array(
		'id'			=> 'wpex-post-meta',
		'title'			=> esc_html__( 'Post Settings', 'wpex-corporate' ),
		'pages'			=> array( 'post' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> esc_html__( 'Video URL', 'wpex-corporate' ),
				'desc'	=> esc_html__( 'Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'wpex-corporate' ) .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. esc_html__( 'Learn More', 'wpex-corporate' ),
				'id' 	=> $prefix . 'post_video',
				'type'	=> 'text',
				'std'	=> '',
			),
		),
	);

	// Portfolio
	$meta_boxes[] = array(
		'id'			=> 'wpex-portfolio-meta',
		'title'			=> esc_html__( 'Post Settings', 'wpex-corporate' ),
		'pages'			=> array( 'portfolio' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> esc_html__( 'Video URL', 'wpex-corporate' ),
				'desc'	=>  esc_html__( 'Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'wpex-corporate' ) .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. esc_html__( 'Learn More', 'wpex-corporate' ),
				'id'	=> $prefix . 'post_video',
				'type'	=> 'text',
				'std'	=> ''
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'wpex_metaboxes' );