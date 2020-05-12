<?php
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
		'title'			=> esc_html__( 'Slide Settings', 'corporate' ),
		'pages'			=> array( 'slides' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> esc_html__( 'URL', 'corporate' ),
				'desc'	=>  esc_html__( 'Enter a custom URL to link this slide to. Don\'t forget the http// at the front!', 'corporate' ),
				'id'	=> $prefix . 'slide_url',
				'type'	=> 'text',
				'std'	=> ''
			),
		),
	);

	// Features
	$meta_boxes[] = array(
		'id'			=> 'wpex-features-meta',
		'title'			=> esc_html__( 'Feature Settings', 'corporate' ),
		'pages'			=> array( 'features' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> esc_html__( 'URL', 'corporate' ),
				'desc'	=>  esc_html__( 'Enter a custom URL to link this feature to. Don\'t forget the http// at the front! This link will be added to the featured image and title.', 'corporate' ),
				'id'	=> $prefix . 'feature_url',
				'type'	=> 'text',
				'std'	=> ''
			),
			array(
				'name'	=> esc_html__( 'Icon Font Class', 'corporate' ),
				'desc'	=>  esc_html__( 'Enter the icon font classname (without the fa- part) to display an icon instead of a featured image.', 'corporate' ) .' <a href="http://fontawesome.io/icons/" target="_blank">'. esc_html__( 'Learn More.', 'corporate' ) .'&rarr;</a>',
				'id'	=> $prefix . 'icon_font',
				'type'	=> 'text',
				'std'	=> ''
			),
		),
	);


	// Posts
	$meta_boxes[] = array(
		'id'			=> 'wpex-post-meta',
		'title'			=> esc_html__( 'Post Settings', 'corporate' ),
		'pages'			=> array( 'post' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> esc_html__( 'Video URL', 'corporate' ),
				'desc'	=> esc_html__( 'Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'corporate' ) .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. esc_html__( 'Learn More', 'corporate' ),
				'id' 	=> $prefix . 'post_video',
				'type'	=> 'text',
				'std'	=> '',
			),
		),
	);

	// Portfolio
	$meta_boxes[] = array(
		'id'			=> 'wpex-portfolio-meta',
		'title'			=> esc_html__( 'Post Settings', 'corporate' ),
		'pages'			=> array( 'portfolio' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> esc_html__( 'Video URL', 'corporate' ),
				'desc'	=>  esc_html__( 'Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'corporate' ) .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. esc_html__( 'Learn More', 'corporate' ),
				'id'	=> $prefix . 'post_video',
				'type'	=> 'text',
				'std'	=> ''
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'wpex_metaboxes' );