<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check if disabled
if ( get_option( 'wpex_disable_theme_about', false ) ) {
	return;
}

/**
 * WPEX_Theme_Admin_About Class
 *
 * A general class for About and Credits page.
 *
 * @since 1.4
 */
class WPEX_Theme_Admin_About {

	/**
	 * Get things started
	 *
	 * @since 1.0
	 */
	public function __construct() {

		// Vars
		$this->info = wpex_theme_info();

		// Actions
		add_action( 'admin_menu', array( $this, 'admin_menus' ) );
		add_action( 'admin_head', array( $this, 'admin_head' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
	}

	/**
	 * Sends user to the About page on theme activation
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function admin_init() {
		// Check if we should hide this page
		if ( isset( $_GET[ 'wpex_disable_theme_about' ] ) ) {
			update_option( 'wpex_disable_theme_about', true );
			wp_safe_redirect( admin_url() );
			exit;
		}

		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
			return;
		}
		global $pagenow;
		if ( is_admin()
			&& isset( $_GET['activated'] )
			&& $pagenow == 'themes.php'
			&& current_user_can( 'manage_options' )
		) {
			wp_safe_redirect( admin_url( 'admin.php?page=wpex-theme' ) );
			exit;
		}
	}

	/**
	 * Register the Dashboard Pages which are later hidden but these pages
	 * are used to render the About and Credits pages.
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function admin_menus() {

		add_theme_page(
			$this->info[ 'name' ],
			$this->info[ 'name' ],
			'manage_options',
			'wpex-theme',
			array( $this, 'recommended_screen' )
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
			$theme_data    = wp_get_theme();
			$theme_version = $theme_data->get( 'Version' ); ?>

			<h1><?php echo esc_html( $this->info[ 'name' ] ); ?> v<?php echo esc_html( $theme_version ); ?></h1>

			<div class="about-text" style="margin-bottom:45px;min-height:0;"><?php echo esc_html_x( 'A free WordPress theme by WPExplorer', 'theme about page', 'wpex-corporate' ); ?> | <a href="<?php echo esc_url( $this->info[ 'url' ] ); ?>" target="_blank"><?php echo esc_html_x( 'Theme Details', 'theme about page', 'wpex-corporate' ); ?></a><?php if ( ! empty( $this->info[ 'support' ] ) ) { ?> | <a href="<?php echo esc_url( $this->info[ 'support' ] ); ?>" target="_blank"><?php echo esc_html_x( 'Report a Bug', 'theme about page', 'wpex-corporate' ); ?></a><?php } ?></div>

			<div style="padding-bottom:100px;">

				<h3 class="title"><?php echo esc_html_x( 'About', 'theme about page', 'wpex-corporate' ); ?></h3>

				<div>
					<h4><?php echo esc_html_x( 'GPL License', 'theme about page', 'wpex-corporate' ); ?></h4>
					<p><?php echo esc_html_x( 'This theme is licensed under the GPL license. This means you can use it for anything you like as long as it remains GPL.', 'theme about page', 'wpex-corporate' ); ?></p>
				</div>

				<div>
					<h4><?php echo esc_html_x( 'Credits', 'theme about page', 'wpex-corporate' ); ?></h4>
					<p>
					<?php echo sprintf( '%s <a href="%s">%s</a>' , esc_html_x( 'This theme was created by:', 'theme about page', 'wpex-corporate' ), 'https://www.wpexplorer.com/', esc_html__( 'WPExplorer', 'wpex-corporate' ) ); ?>
					<br />
					<?php echo esc_html_x( 'We work hard to develop, support and update this theme.', 'theme about page', 'wpex-corporate' ); ?>
					<br />
					<?php echo esc_html_x( 'A back-link to our website is very much appreciated or you can follow us via our social media!', 'theme about page', 'wpex-corporate' ); ?>
					</p>
					<p>
						<?php echo sprintf( '<a href="%s" class="button button-secondary" target="_blank">%s</a>', 'https://twitter.com/WPExplorer/', esc_html__( 'Twitter', 'wpex-corporate' ) ); ?>
						<?php echo sprintf( '<a href="%s" class="button button-secondary" target="_blank">%s</a>', 'https://www.facebook.com/WPExplorerThemes/', esc_html__( 'Facebook', 'wpex-corporate' ) ); ?>
						<?php echo sprintf( '<a href="%s" class="button button-secondary" target="_blank">%s</a>', 'https://www.youtube.com/user/wpexplorertv', esc_html__( 'Youtube', 'wpex-corporate' ) ); ?>
					</p>
				</div>

				<hr />

				<h3><?php echo esc_html_x( 'Getting Started', 'theme about page', 'wpex-corporate' ); ?></h3>

				<div>
					<p>
					<?php echo esc_html_x( 'Below you will find some useful links to get you started with this theme.', 'theme about page', 'wpex-corporate' ); ?>
					</p>
					<?php
					// Customizer url
					$customize_url = add_query_arg(
						array(
							'return' => urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ),
						),
						'customize.php'
					); ?>
					<a href="<?php echo esc_url( $customize_url ); ?>" class="button button-primary load-customize hide-if-no-customize"><?php echo esc_html_x( 'Customize Your Site', 'theme about page', 'wpex-corporate' ); ?></a>
				</div>

				<hr />

				<h3><?php echo esc_html_x( 'Useful Links', 'theme about page', 'wpex-corporate' ); ?></h3>

				<div>
					<ul>
						<li>- <?php echo sprintf( '<a href="%s" target="_blank">%s</a>', 'https://www.wpexplorer.com/wordpress-hosting/', esc_html__( 'Choosing The Best WordPress Hosting for Your Site', 'wpex-corporate' ) ); ?></li>
						<li>- <?php echo sprintf( '<a href="%s" target="_blank">%s</a>', 'https://www.wpexplorer.com/wordpress-seo/', esc_html__( 'WordPress SEO Guide', 'wpex-corporate' ) ); ?></li>
						<li>- <?php echo sprintf( '<a href="%s" target="_blank">%s</a>', 'https://www.wpexplorer.com/wordpress-security/', esc_html__( 'Improve your WordPress Site Security', 'wpex-corporate' ) ); ?></li>
						<li>- <?php echo sprintf( '<a href="%s" target="_blank">%s</a>', 'https://www.wpexplorer.com/how-to-speed-up-wordpress/', esc_html__( 'Speed Up Your WordPress Site', 'wpex-corporate' ) ); ?></li>
						<li>- <?php echo sprintf( '<a href="%s" target="_blank"><a href="%s" target="_blank">%s</a></a>', 'https://vaultpress.com/', 'https://www.wpexplorer.com/coupons/', esc_html__( 'Deals & Coupons for WordPress Products & Services', 'wpex-corporate' ) ); ?></li>
					</ul>
				</div>


				<hr />

				<h3><?php echo esc_html_x( 'Total Drag & Drop Theme', 'theme about page', 'wpex-corporate' ); ?></h3>

				<div>
					<p><?php echo esc_html_x( 'Check out our most advanced (yet easy to use) and flexible theme to date.', 'theme about page', 'wpex-corporate' ); ?></p>
					<a href="<?php echo esc_url( 'https://total.wpexplorer.com/' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/admin/total-banner.png" alt="Total WordPress Theme" style="width:auto;" /></a>
				</div>

				<hr>

				<div>
					<h4>*** <?php echo esc_html_x( 'Disable This Page', 'theme about page', 'wpex-corporate' ); ?> ***</h4>
					<p><?php echo esc_html_x( 'Click the link below to disable this about page completely and never see it again.', 'theme about page', 'wpex-corporate' ); ?></p>
					<a class="button button-secondary" href="<?php echo admin_url( '/admin.php?page=wpex-theme&wpex_disable_theme_about=1' ); ?>"><?php echo esc_html_x( 'Disable This Page', 'theme about page', 'wpex-corporate' ); ?></a></a>
				</div>

			</div>

		</div><!-- .wrap -->

		<?php
	}
}

new WPEX_Theme_Admin_About();