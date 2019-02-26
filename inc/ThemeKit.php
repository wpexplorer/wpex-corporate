<?php
/**
 * ThemeKit Setup
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

class ThemeKit {

	/**
	 * Main constructor
	 *
	 * @version 2.3
	 */
	public function __construct() {
		\add_action( 'after_setup_theme', array( $this, 'add_theme_support' ) );
		\add_filter( 'themekit_demo_files', array( $this, 'demo_files' ) );
		\add_action( 'pt-ocdi/after_import', array( $this, 'after_import' ), PHP_INT_MAX );
	}

	/**
	 * Add theme support for various theme kit functions
	 *
	 * @since 2.3
	 */
	public function add_theme_support() {

		// Core
		\add_theme_support( 'themekit-html5shiv' );
		\add_theme_support( 'themekit-dynamic-images' );
		
		// Post types
		\add_theme_support( 'themekit-features' );
		\add_theme_support( 'themekit-slides' );
		\add_theme_support( 'themekit-portfolio' );
		\add_theme_support( 'themekit-staff' );

		// Dashboard thumbs
		\add_theme_support( 'themekit-dashboard-thumbnails', array(
			'post_type' => array( 'post', 'portfolio', 'slides', 'staff', 'features' ),
		) );

		// Gallery metabox
		\add_theme_support( 'themekit-gallery-metabox', array(
			'post_type' => array( 'portfolio' )
		) );

	}

	/**
	 * Define import files array
	 *
	 * @since 2.3
	 */
	public function demo_files() {
		$dir = \trailingslashit( \get_template_directory_uri() ) . 'inc/import-files/';
		return array(
			'main' => array(
				'import_file_name'           => 'Corporate',
				'import_file_url'            => $dir . 'demo-content.xml',
				'import_widget_file_url'     => $dir . 'widgets.json',
				'import_customizer_file_url' => $dir . 'customizer.dat',
				'preview_url'                => 'https://wpexplorer-demos.com/corporate/',
			),
		);
	}

}
new ThemeKit();