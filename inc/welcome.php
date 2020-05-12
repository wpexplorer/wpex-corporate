<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WPEX_Welcome Class
 *
 * A general class for About and Credits page.
 *
 * @since 1.4
 */
class WPEX_Welcome {

	/**
	 * @var string The capability users should have to view the page
	 */
	public $minimum_capability = 'manage_options';

	/**
	 * Get things started
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menus' ) );
		add_action( 'admin_head', array( $this, 'admin_head' ) );
		add_action( 'admin_init', array( $this, 'welcome' ) );
	}

	/**
	 * Register the Dashboard Pages which are later hidden but these pages
	 * are used to render the Welcome and Credits pages.
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function admin_menus() {
		
		// Recommended
		add_menu_page(
			__( 'Corporate Theme', 'corporate' ),
			__( 'Corporate Theme', 'corporate' ),
			$this->minimum_capability,
			'wpex-zero-theme',
			array( $this, 'recommended_screen' ),
			'dashicons-desktop'
		);

	}

	/**
	 * Hide dashboard tabs from the menu
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function admin_head() {
		remove_submenu_page( 'index.php', 'wpex-about' );
	}

	/**
	 * Render Recommended Screen
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function recommended_screen() { ?>

		<div class="wrap about-wrap">

			<?php
			// Get theme version #
			$theme_data = wp_get_theme();
			$theme_version = $theme_data->get( 'Version' ); ?>

			<h1>Corporate Theme v<?php echo $theme_version; ?></h1>

			<div class="about-text" style="margin-bottom:40px;min-height:0;"><?php esc_html_e( 'Congrats on choosing this awesome WordPress theme for your website!', 'corporate' ); ?></div>

			<div style="padding-bottom:100px;">

				<h2><?php esc_html_e( 'About', 'corporate' ); ?></h2>
				<hr />

				<div>
					<h4><?php esc_html_e( 'GPL License', 'corporate' ); ?></h4>
					<p><?php esc_html_e( 'This theme is licensed under the GPL license. This means you can use it for anything you like as long as it remains GPL.', 'corporate' ); ?></p>
				</div>

				<div>
					<h4><?php esc_html_e( 'Credits', 'corporate' ); ?></h4>
					<p>
					<?php esc_html_e( 'This theme was created by <a href="http://www.wpexplorer.com" target="_blank">WPExplorer.com</a>.', 'corporate' ); ?>
					<br />
					<?php esc_html_e( 'We work hard to develop and update this theme.', 'corporate' ); ?>
					<br />
					<?php esc_html_e( 'A back-link to our website is very much appreciated or you can follow us via our social media!', 'corporate' ); ?>
					</p>
				</div>

				<div>
					<h4><?php esc_html_e( 'Liability', 'corporate' ); ?></h4>
					<p>
					<?php esc_html_e( 'WPExplorer.com shall not be held liable for any damages, including, but not limited to, the loss of data or profit, arising from the use of, or inability to use, this theme.', 'corporate' ); ?>
					</p>
				</div>

				<div>
					<h4><?php esc_html_e( 'Getting Started', 'corporate' ); ?></h4>
					<p>
					<?php esc_html_e( 'Below you will find some useful links to get you started with this theme.', 'corporate' ); ?>
					</p>
					<a href="<?php echo wp_customize_url(); ?>" target="_blank" class="button button-secodary load-customize hide-if-no-customize"><?php esc_html_e( 'Customize Your Site', 'corporate' ); ?></a>
					<a href="http://www.wpexplorer.com/corporate-free-wordpress-theme/" target="_blank" class="button button-secodary"><?php esc_html_e( 'Theme Page', 'corporate' ); ?></a>
				</div>

				<br /><br />

				<h2><?php esc_html_e( 'Recommendations', 'corporate' ); ?></h2>

				<hr />

				<div>
				<h4><?php esc_html_e( 'Plugins', 'corporate' ); ?></h4>
				<p><?php esc_html_e( 'Below you will find links to plugins we (WPExplorer.com staff) personally like and recommend. None of these plugins are required for your theme to work, they simply add additional functionality.', 'corporate' ); ?></p>

					<ul style="list-style: disc;margin: 20px 0 0 20px;">
						<li><span style="font-weight:bold">Backups:</span> <a href="https://vaultpress.com/" target="_blank">VaultPress</a></li>
						<li><span style="font-weight:bold">Shortcodes:</span> <a href="http://www.wpexplorer.com/symple-shortcodes/" target="_blank">Symple Shortcodes</a></li>
						<li><span style="font-weight:bold">Contact Forms:</span> <a href="http://wordpress.org/plugins/contact-form-7/" target="_blank">Contact Form 7</a> or <a href="http://www.wpexplorer.com/gravity-forms-plugin/" target="_blank">Gravity Forms</a></li>
						<li><span style="font-weight:bold">Page Builder:</span> <a href="http://www.wpexplorer.com/visual-composer-guide/" target="_blank">Visual Composer</a></li>
						<li><span style="font-weight:bold">Image Sliders:</span class> <a href="http://www.wpexplorer.com/revolution-slider-review-guide/" target="_blank">Slider Revolution</a></li>
						<li><span style="font-weight:bold">Other:</span> <a href="http://jetpack.me/" target="_blank">JetPack</a></li>
					</ul>
				</div>

				<br />
				<hr />

				<div>
					<h4><?php esc_html_e( 'Total Drag & Drop Theme', 'corporate' ); ?></h4>
					<p><?php esc_html_e( 'Check out our most advanced (yet easy to use) and flexible theme to date.', 'corporate' ); ?></p>
					<a href="http://wpexplorer-themes.com/total/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/inc/total.png" alt="Total WordPress Theme" /></a>
				</div>

				<br />
				<hr />

				<div>
					<h4><?php esc_html_e( 'WordPress Hosting', 'corporate' ); ?></h4>
					<p><?php esc_html_e( 'If you need fast and reliable hosting we recommend the same host we use and love WPEngine.', 'corporate' ); ?></p>
					<a href="http://www.wpexplorer.com/wordpress-hosting/" class="button button-secondary" target="_blank"> WordPress Hosting</a>
				</div>

				<br />
				<hr />

				<div>
					<h4><?php esc_html_e( 'Deals & Coupons', 'corporate' ); ?></h4>
					<p><?php esc_html_e( 'Check out our coupons page for great deals on WordPress resources.', 'corporate' ); ?></p>
					<a href="http://www.wpexplorer.com/coupons/" class="button button-secondary" target="_blank">View Deals/Coupons</a>
				</div>

			</div>

		</div><!-- .wrap about-wrap -->


		<?php
	}

	/**
	 * Sends user to the Welcome page on theme activation
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function welcome() {
		global $pagenow;
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
			return;
		}
		if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
			wp_safe_redirect( admin_url( 'admin.php?page=wpex-zero-theme' ) ); exit;
			exit;
		}
	}
	
}
new WPEX_Welcome();