<?php
/**
 * Post Meta Setup
 *
 * @package Corporate WordPress theme
 * @author  Alexander Clarke
 * @link    http://www.wpexplorer.com
 * @since   2.3
 */

namespace CorporateTheme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Metaboxes {

	public function __construct() {
		\add_filter( 'themekit_metaboxes', array( $this, 'register' ) );
	}

	public function register( $boxes ) {

		$prefix = 'wpex_';

		// Posts
		$boxes[] = array(
			'id'       => 'wpex_post_meta',
			'title'    => \__( 'Settings', 'wpex-corporate' ),
			'screen'   => array( 'post' ),
			'context'  => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name'	=> \__( 'Video URL', 'wpex-corporate' ),
					'desc'	=> \__( 'Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'wpex-corporate' ) .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. \__( 'Learn More', 'wpex-corporate' ),
					'id' 	=> $prefix . 'post_video',
					'type'	=> 'text',
				),
			),
		);

		// Slides
		$boxes[] = array(
			'id'       => 'wpex_slides_meta',
			'title'    => \__( 'Settings', 'wpex-corporate' ),
			'screen'   => array( 'slides' ),
			'context'  => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name'	=> \__( 'URL', 'wpex-corporate' ),
					'id'	=> $prefix . 'slide_url',
					'type'	=> 'text',
				),
			),
		);

		// Features
		$boxes[] = array(
			'id'       => 'wpex_features_meta',
			'title'    => \__( 'Settings', 'wpex-corporate' ),
			'screen'   => array( 'features' ),
			'context'  => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name'	=> \__( 'URL', 'wpex-corporate' ),
					'id'	=> $prefix . 'feature_url',
					'type'	=> 'text',
					'std'	=> ''
				),
				array(
					'name'	=> \__( 'Icon Font Class', 'wpex-corporate' ),
					'desc'	=>  \__( 'Enter the icon font classname (without the fa- part) to display an icon instead of a featured image.', 'wpex-corporate' ) .' <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">'. \__( 'Learn More', 'wpex-corporate' ) .'&rarr;</a>',
					'id'	=> $prefix . 'icon_font',
					'type'	=> 'text',
					'std'	=> ''
				),
			),
		);

		// Portfolio
		$boxes[] = array(
			'id'       => 'wpex_portfolio_meta',
			'title'    => \__( 'Settings', 'wpex-corporate' ),
			'screen'   => array( 'portfolio' ),
			'context'  => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name'	=> \__( 'Video URL', 'wpex-corporate' ),
					'desc'	=> \__( 'Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'wpex-corporate' ) .' <a href="https://codex.wordpress.org/Embeds" target="_blank">'. \__( 'Learn More', 'wpex-corporate' ),
					'id'	=> $prefix . 'post_video',
					'type'	=> 'text',
				),
			),
		);

		return $boxes;

	}

}
new Metaboxes;