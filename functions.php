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
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0
 */

class WPEX_Theme_Class {

	/**
	 * Main Theme Class Constructor
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function __construct() {

		// Define Contstants
		$this->constants();

		// Include theme core files
		$this->includes();

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

		// Filter the archive title
		add_filter( 'get_the_archive_title', array( $this, 'get_the_archive_title' ) );

		// Filter post class
		add_filter( 'post_class', array( $this, 'post_class' ) );

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
		define( 'WPEX_JS_DIR_URI', get_template_directory_uri() . '/js/' );
		define( 'WPEX_CSS_DIR_URI', get_template_directory_uri() . '/css/' );
		define( 'WPEX_DEFAULT_FOOTER_COPY', '<a href="http://www.wordpress.org" title="WordPress" target="_blank">WordPress</a> Theme Designed &amp; Developed by <a href="https://www.wpexplorer.com/" target="_blank" title="WPExplorer">WPExplorer</a>' );
	}

	/**
	 * Returns current theme version
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function theme_version() {
		$theme = wp_get_theme();
		return $theme->get( 'Version' );
	}

	/**
	 * Include theme core files
	 *
	 * @since   2.3
	 * @access  public
	 */
	public function includes() {

		// Include vendor classes
		require_once WPEX_INCLUDES_DIR . 'vendor/class-tgm-plugin-activation.php';

		// Include core theme files
		require_once WPEX_INCLUDES_DIR . 'classes/ThemeKit.php';
		require_once WPEX_INCLUDES_DIR . 'classes/Metaboxes.php';
		require_once WPEX_INCLUDES_DIR . 'classes/TGMPA.php';
		require_once WPEX_INCLUDES_DIR . 'classes/Customizer.php';

		require_once WPEX_INCLUDES_DIR . 'functions/helpers.php';
		require_once WPEX_INCLUDES_DIR . 'functions/comments-callback.php';

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
		load_theme_textdomain( 'wpex-corporate', get_template_directory() . '/languages' );
		
		// Enable some useful post formats for the blog
		add_theme_support( 'post-formats', array( 'video' ) );
			
		// Add theme support
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'post-thumbnails' );

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
			'wpex-responsive',
			WPEX_CSS_DIR_URI .'responsive.css',
			array( 'wpex-style' ),
			WPEX_THEME_VERSION
		);
		wp_enqueue_style(
			'wpex-font-awesome',
			WPEX_CSS_DIR_URI .'font-awesome.min.css',
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
			WPEX_JS_DIR_URI .'plugins.js',
			array( 'jquery' ),
			WPEX_THEME_VERSION,
			true
		);
		wp_enqueue_script(
			'wpex-global',
			WPEX_JS_DIR_URI .'global.js',
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
	public function get_the_archive_title( $title ) {
		if ( is_tax() || is_category() ) {
			$title = single_term_title();
		}
		return $title;
	}

	/**
	 * Set default gallery metabox post types
	 *
	 * @since   2.3
	 * @access  public
	 */
	public function post_class( $classes ) {

		if ( ! apply_filters( 'wpex_filter_post_class', true ) ) {
			return $classes;
		}
		
		// Get global vars
		global $post, $wpex_count;

		// Get post data
		$post_id   = $post->ID;
		$post_type = get_post_type($post_id);

		// Do nothing for slides
		if ( $post_type == 'slides' ) {
			return $classes;
		}

		// Search results
		if ( is_search() ) {
			$classes[] = 'search-entry';
			if ( !has_post_thumbnail() ) {
				$classes[] = 'no-featured-image';
			}
			return $classes;
		}

		// Custom class for non standard post types
		if ( $post_type !== 'post' ) {
			$classes[] = $post_type .'-entry';
		}

		// Counter
		if ( $wpex_count ) {
			$classes[] = 'count-'. $wpex_count;
		}

		// Portfolio
		if ( $post_type == 'portfolio' ) {
			$classes[] = 'span_1_of_4 col clr';
		}

		// Staff
		elseif ( $post_type == 'staff' ) {
			$classes[] = 'span_1_of_3 col clr';
		}


		// Features
		elseif ( $post_type == 'features' ) {
			$classes[] = 'span_1_of_3 col clr';
		}

		// All other posts
		elseif ( ! is_singular() ) {
			$classes[] = 'loop-entry clr';
		}

		// Return classes
		return $classes;

	}

}
$corporate_theme_setup = new WPEX_Theme_Class;