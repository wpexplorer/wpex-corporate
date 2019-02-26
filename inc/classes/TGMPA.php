<?php
/**
 * Register recommended plugins for TGMPA
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

class TGMPA {

	/**
	 * Main constructor
	 *
	 * @version 2.3
	 */
	public function __construct() {
		\add_action( 'tgmpa_register', array( $this, 'register' ) );
	}

	/**
	 * Add theme support for various theme kit functions
	 *
	 * @since 2.3
	 */
	public function register() {
		\tgmpa( \apply_filters( 'wpex_recommended_plugins', array(
			'one-click-demo-import' => array(
				'name'             => 'One Click Demo Import',
				'slug'             => 'one-click-demo-import',
				'required'         => false,
				'force_activation' => false,
			),
			'theme-kit' => array(
				'name'             => 'WP Themekit',
				'slug'             => 'wp-themekit',
				'required'         => true,
				'force_activation' => true,
			),
		) ), array(
			'id'           => 'wpex_corporate',
			'domain'       => 'wpex-corporate',
			'menu'         => 'install-required-plugins',
			'has_notices'  => true,
			'is_automatic' => true,
			'parent_slug'  => 'themes.php'
		) );
	}

}
new TGMPA();