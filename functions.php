<?php
/**
 * Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

function wpex_theme_info() {
	return array(
		'name'    => 'WPEX Corporate',
		'slug'    => 'wpex-corporate',
		'url'     => 'https://www.wpexplorer.com/corporate-free-wordpress-theme/',
		'support' => 'https://github.com/wpexplorer/wpex-corporate/issues/',
	);
}

class WPEX_Theme_Class {

	/**
	 * Main Theme Class Constructor
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function __construct() {

		// Define Contstants
		add_action( 'after_setup_theme', array( $this, 'constants' ), 0 );

		// Load theme functions
		add_action( 'after_setup_theme', array( $this, 'functions' ), 1 );

		// Load Classes
		add_action( 'after_setup_theme', array( $this, 'classes' ), 3 );

		// Theme setup: Adds theme-support, image sizes, menus, etc.
		add_action( 'after_setup_theme', array( $this, 'setup' ), 10 );

		// Flush rewrite rules on theme switch
		add_action( 'after_switch_theme', array( $this, 'flush_rewrite_rules' ) );

		// Load front-end scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Register sidebar widget areas
		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );

		// Alter post formats based on custom post types
		add_action( 'load-post.php', array( $this, 'adjust_formats' ) );
		add_action( 'load-post-new.php', array( $this, 'adjust_formats' ) );

		// Alters posts per page for specific archives
		add_filter( 'pre_get_posts', array( $this, 'posts_per_page' ) );

		// Set default gallery metabox post types
		add_filter( 'wpex_gallery_metabox_post_types', array( $this, 'gallery_metabox' ), 1 );

		// Filter the archive title
		add_filter( 'get_the_archive_title', array( $this, 'get_the_archive_title' ) );

	}

	/**
	 * Define Constants
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function constants() {

		define( 'WPEX_THEME_VERSION', $this->theme_version() );
		define( 'WPEX_INCLUDES_DIR', get_template_directory() .'/inc/' );
		define( 'WPEX_CLASSES_DIR', WPEX_INCLUDES_DIR .'/classes/' );
		define( 'WPEX_JS_DIR_URI', get_template_directory_uri(). '/js/' );
		define( 'WPEX_CSS_DIR_URI', get_template_directory_uri(). '/css/' );

	}

	/**
	 * Returns current theme version
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function theme_version() {

		// Get theme data
		$theme = wp_get_theme();

		// Return theme version
		return $theme->get( 'Version' );

	}

	/**
	 * Load required theme functions
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function functions() {

		// Configures post meta via cmb_meta_boxes filter
		require_once get_parent_theme_file_path( '/inc/meta-config.php' );

		// Include Customizer functions
		require_once get_parent_theme_file_path( '/inc/customizer/header.php' );
		require_once get_parent_theme_file_path( '/inc/customizer/portfolio.php' );
		require_once get_parent_theme_file_path( '/inc/customizer/staff.php' );
		require_once get_parent_theme_file_path( '/inc/customizer/blog.php' );
		require_once get_parent_theme_file_path( '/inc/customizer/copyright.php' );

		// Helper functions
		require_once get_parent_theme_file_path( '/inc/helpers.php' );

		// Adds classes to post entries
		require_once get_parent_theme_file_path( '/inc/post-classes.php' );

		// Comments output
		require_once get_parent_theme_file_path( '/inc/comments-callback.php' );

		// MCE Editor tweaks
		require_once get_parent_theme_file_path( '/inc/mce-tweaks.php' );

		if ( is_admin() ) {
			require_once get_parent_theme_file_path( '/admin/dashboard-feed.php' );
			require_once get_parent_theme_file_path( '/admin/about.php' );
		}
	}

	/**
	 * Load theme classes
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function classes() {

		// Metaboxes
		if ( ! class_exists( 'cmb_Meta_Box' ) ) {
			require_once get_parent_theme_file_path( '/inc/classes/custom-metaboxes-and-fields/init.php' );
		}

		// Gallery metabox
		require_once get_parent_theme_file_path( '/inc/classes/gallery-metabox/gallery-metabox.php' );

		// Post Types
		if ( get_theme_mod( 'wpex_slides', true ) ) {
			require_once get_parent_theme_file_path( '/inc/classes/post-types/slides.php' );
		}

		if ( get_theme_mod( 'wpex_features', true ) ) {
			require_once get_parent_theme_file_path( '/inc/classes/post-types/features.php' );
		}

		if ( get_theme_mod( 'wpex_portfolio', true ) ) {
			require_once get_parent_theme_file_path( '/inc/classes/post-types/portfolio.php' );
		}

		if ( get_theme_mod( 'wpex_staff', true ) ) {
			require_once get_parent_theme_file_path( '/inc/classes/post-types/staff.php' );
		}

	}

	/**
	 * Theme Setup
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function setup() {

		// Set content width variable
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1000;
		}

		// Register navigation menus
		register_nav_menus ( array(
				'main_menu'	=> esc_html__( 'Main', 'wpex-corporate' ),
		) );

		// Localization support
		load_theme_textdomain( 'wpex-corporate', get_template_directory() .'/languages' );

		// Add theme support
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'video' ) );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background' );

		// Set default thumbnail size
		set_post_thumbnail_size( 150, 150 );

		// Add image sizes
		add_image_size( 'wpex-entry', 640, 9999, false );
		add_image_size( 'wpex-post', 640, 9999, false );
		if ( get_theme_mod( 'wpex_homepage_slider', true ) ) {
			add_image_size( 'wpex-home-slider', 1060, 400, true );
		}
	}

	/**
	 * Flush rewrite rules on theme switch to prevent 404 errors on built-in post types
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function flush_rewrite_rules() {
		if ( function_exists( 'flush_rewrite_rules' ) ) {
			flush_rewrite_rules();
		}
	}

	/**
	 * Load front-end scripts
	 *
	 * @since   2.0.0
	 * @access  public
	 *
	 * @link	https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
	 */
	public function enqueue_scripts() {

		// CSS
		wp_enqueue_style(
			'wpex-style',
			get_stylesheet_uri(),
			false,
			WPEX_THEME_VERSION
		);

		wp_enqueue_style(
			'wpex-font-awesome',
			get_theme_file_uri( '/css/font-awesome.min.css' ),
			false,
			'4.3.0'
		);
		
		wp_enqueue_style(
			'google-font-montserrat',
			'http://fonts.googleapis.com/css?family=Montserrat:400,700',
			array( 'wpex-style' ),
			null
		);

		if ( function_exists( 'wpcf7_enqueue_styles') ) {
			wp_dequeue_style( 'contact-form-7' );
		}

		// jQuery
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script(
			'wpex-plugins',
			get_theme_file_uri( '/js/plugins.js' ),
			array( 'jquery' ),
			WPEX_THEME_VERSION,
			true
		);

		wp_enqueue_script(
			'wpex-global',
			get_theme_file_uri( '/js/global.js' ),
			array( 'jquery', 'wpex-plugins' ),
			WPEX_THEME_VERSION,
			true
		);

	}

	/**
	 * Registers sidebars
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function register_sidebars() {

		// Sidebar
		register_sidebar( array(
			'name'			=> esc_html__( 'Sidebar', 'wpex-corporate' ),
			'id'			=> 'sidebar',
			'description'	=> esc_html__( 'Widgets in this area are used in the sidebar region.', 'wpex-corporate' ),
			'before_widget'	=> '<div class="sidebar-widget %2$s clr">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h5 class="widget-title">',
			'after_title'	=> '</h5>',
		) );

		// Footer 1
		register_sidebar( array(
			'name'			=> esc_html__( 'Footer 1', 'wpex-corporate' ),
			'id'			=> 'footer-one',
			'description'	=> esc_html__( 'Widgets in this area are used in the first footer region.', 'wpex-corporate' ),
			'before_widget'	=> '<div class="footer-widget %2$s clr">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h6 class="widget-title">',
			'after_title'	=> '</h6>',
		) );

		// Footer 2
		register_sidebar( array(
			'name'			=> esc_html__( 'Footer 2', 'wpex-corporate' ),
			'id'			=> 'footer-two',
			'description'	=> esc_html__( 'Widgets in this area are used in the second footer region.', 'wpex-corporate' ),
			'before_widget'	=> '<div class="footer-widget %2$s clr">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h6 class="widget-title">',
			'after_title'	=> '</h6>',
		) );

		// Footer 3
		register_sidebar( array(
			'name'			=> esc_html__( 'Footer 3', 'wpex-corporate' ),
			'id'			=> 'footer-three',
			'description'	=> esc_html__( 'Widgets in this area are used in the third footer region.', 'wpex-corporate' ),
			'before_widget'	=> '<div class="footer-widget %2$s clr">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h6 class="widget-title">',
			'after_title'	=> '</h6>',
		) );

	}

	/**
	 * Alter post formats based on custom post types
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function adjust_formats() {
		if ( isset( $_GET['post'] ) ) {
			$post = get_post($_GET['post']);
			if ($post) {
				$post_type = $post->post_type;
			}
		} elseif ( ! isset( $_GET['post_type'] ) ) {
			$post_type = 'post';
		} elseif ( in_array( $_GET['post_type'], get_post_types( array('show_ui' => true ) ) ) ) {
			$post_type = $_GET['post_type'];
		} else {
			return; // Page is going to fail anyway
		}
		if ( 'portfolio' == $post_type ) {
			add_theme_support( 'post-formats', array( 'video', 'gallery' ) );
		} elseif ( 'post' == $post_type ) {
			add_theme_support( 'post-formats', array( 'video' ) );
		}
	}

	/**
	 * Alters posts per page for specific archives
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function posts_per_page( $query ) {

		// Return if wrong query
		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}

		// Set posts per page for portfolio categories
		if ( is_tax( 'portfolio_category') ) {
			$query->set( 'posts_per_page', get_theme_mod('wpex_portfolio_posts_per_page', '12' ) );
			return;
		}

		// Set posts per page for staff categories
		elseif ( is_tax( 'staff_category') ) {
			$query->set( 'posts_per_page', get_theme_mod('wpex_staff_posts_per_page', '12' ) );
			return;
		}

	}

	/**
	 * Set default gallery metabox post types
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function gallery_metabox( $types ) {
		$types = array();
		return $types;
	}

	/**
	 * Set default gallery metabox post types
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function get_the_archive_title( $title ) {
		if ( is_tax() || is_category() ) {
			$title = single_term_title();
		}
		return $title;
	}

}
$corporate_theme_setup = new WPEX_Theme_Class;