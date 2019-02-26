<?php
/**
 * Register Customizer Settings
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

class Customizer {

	/**
	 * Main constructor
	 *
	 * @version 2.3
	 */
	public function __construct() {
		\add_action( 'themekit_customizer_options', array( $this, 'register' ) );
	}

	/**
	 * Add theme support for various theme kit functions
	 *
	 * @since 2.3
	 */
	public function register( $options ) {
		
		// Header section
		$options['sections'][] = array(
			'id'    => 'wpex_header_section',
			'title' => esc_html__( 'Header', 'wpex-corporate' ),
		);

		$options[] = array(
			'id'      => 'wpex_logo',
			'label'   => esc_html__( 'Image Logo', 'wpex-corporate' ),
			'section' => 'wpex_header_section',
			'type'    => 'image',
		);

		$options[] = array(
			'id'      => 'wpex_header_search',
			'label'   =>  esc_html__( 'Header Search', 'wpex-corporate' ),
			'section' => 'wpex_header_section',
			'type'    => 'checkbox',
		);

		// Portfolio Settings
		if ( post_type_exists( 'portfolio' ) ) {

			$options['sections'][] = array(
				'id'    => 'wpex_portfolio',
				'title' => esc_html__( 'Portfolio', 'wpex-corporate' ),
			);

			$options[] = array(
				'label'   =>  esc_html__( 'Enable Comments', 'wpex-corporate' ),
				'section' => 'wpex_portfolio',
				'id'      => 'wpex_portfolio_comments',
				'type'    => 'checkbox',
			);

			$options[] = array(
				'label'   =>  esc_html__( 'Related?', 'wpex-corporate' ),
				'section' => 'wpex_portfolio',
				'id'      => 'wpex_portfolio_related',
				'type'    => 'checkbox',
				'default' => true,
			);

			$options[] = array(
				'label'   =>  esc_html__( 'Homepage Posts Per Page', 'wpex-corporate' ),
				'section' => 'wpex_portfolio',
				'id'      => 'wpex_home_portfolio_count',
				'type'    => 'text',
				'default' => 4,
			);

			$options[] = array(
				'label'   => esc_html__( 'Archive Posts Per Page', 'wpex-corporate' ),
				'section' => 'wpex_portfolio',
				'id'      => 'wpex_portfolio_posts_per_page',
				'type'    => 'text',
				'default' => 12,
			);

		}

		// Staff Settings
		if ( post_type_exists( 'staff' ) ) {

			$options['sections'][] = array(
				'id'    => 'wpex_staff',
				'title' => esc_html__( 'Staff', 'wpex-corporate' ),
			);

			$options[] = array(
				'label'   => esc_html__( 'Enable Comments', 'wpex-corporate' ),
				'section' => 'wpex_staff',
				'id'      => 'wpex_staff_comments',
				'type'    => 'checkbox',
			);

			$options[] = array(
				'label'   => esc_html__( 'Archive Posts Per Page', 'wpex-corporate' ),
				'section' => 'wpex_staff',
				'id'      => 'wpex_staff_posts_per_page',
				'type'    => 'text',
				'default' => 9,
			);

		}

		// Blog
		$options['sections'][] = array(
			'id'    => 'wpex_blog',
			'title' => esc_html__( 'Blog', 'wpex-corporate' ),
		);

		$options[] = array(
			'label'   => esc_html__( 'Excerpt Length', 'wpex-corporate' ),
			'section' => 'wpex_blog',
			'id'      => 'wpex_blog_excerpt_length',
			'type'    => 'text',
			'default' => 90,
			'description' => esc_html__( 'Enter -1 to display the full content.', 'wpex-corporate' ),
		);
		
		$options[] = array(
			'label'   => esc_html__( 'Read More Link', 'wpex-corporate' ),
			'section' => 'wpex_blog',
			'id'      => 'wpex_blog_readmore',
			'type'    => 'checkbox',
			'default' => '1',
		);

		$options[] = array(
			'label'   => esc_html__( 'Featured Image on Entries', 'wpex-corporate' ),
			'section' => 'wpex_blog',
			'id'      => 'wpex_blog_entry_thumb',
			'type'    => 'checkbox',
			'default' => '1',
		);

		$options[] = array(
			'label'   => esc_html__( 'Featured Image on Posts', 'wpex-corporate' ),
			'section' => 'wpex_blog',
			'id'      => 'wpex_blog_post_thumb',
			'type'    => 'checkbox',
			'default' => '1',
		);

		// Blog
		$options['sections'][] = array(
			'id'    => 'wpex_copyright',
			'title' => esc_html__( 'Copyright', 'wpex-corporate' ),
		);

		$options[] = array(
			'label'   => esc_html__( 'Custom Copyright', 'wpex-corporate' ),
			'section' => 'wpex_copyright',
			'id'      => 'wpex_copyright',
			'type'    => 'textarea',
			'default' => WPEX_DEFAULT_FOOTER_COPY,
		);

		// Styling
		$options['sections'][] = array(
			'id'    => 'wpex_styling',
			'title' => esc_html__( 'Styling', 'wpex-corporate' ),
		);

		foreach ( $this->styling_options() as $k => $v ) {

			$type = isset( $v['type'] ) ? $v['type'] : 'color';

			$options[] = array(
				'label'     => $v['label'],
				'section'   => 'wpex_styling',
				'id'        => 'wpex_' . $v['id'],
				'type'      => $type,
				'transport' => 'postMessage',
				'css' => array(
					'element' => $v['element'],
					'property' => $v['style'],
				),
			);

		}


		// Return options
		return $options;

	}


	/**
	 * Returns styling options array
	 *
	 * @since 2.3
	 */
	public function styling_options() {

		$options = array();

		$options[] = array(
			'label'		=> __( 'Header Top Padding', 'wpex-corporate' ),
			'id'		=> 'header_top_pad',
			'element'	=> '#header-wrap',
			'style'		=> 'padding-top',
			'type'		=> 'text',
		);

		$options[] = array(
			'label'		=> __( 'Header Bottom Padding', 'wpex-corporate' ),
			'id'		=> 'header_bottom_pad',
			'element'	=> '#header-wrap',
			'style'		=> 'padding-bottom',
			'type'		=> 'text',
		);

		$options[] = array(
			'label'		=> __( 'Header Background', 'wpex-corporate' ),
			'id'		=> 'header_bg',
			'element'	=> '#header-wrap',
			'style'		=> 'background-color',
		);

		$options[] = array(
			'label'		=> __( 'Logo Text Color', 'wpex-corporate' ),
			'id'		=> 'logo_color',
			'element'	=> '#logo a',
			'style'		=> 'color',
		);


		$options[] = array(
			'label'		=> __( 'Site Description Color', 'wpex-corporate' ),
			'id'		=> 'site_description_color',
			'element'	=> '.blog-description',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Menu Link Color', 'wpex-corporate' ),
			'id'		=> 'nav_link_color',
			'element'	=> '#site-navigation .dropdown-menu > li > a',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Menu Background', 'wpex-corporate' ),
			'id'		=> 'nav_bg',
			'element'	=> '#site-navigation',
			'style'		=> 'background',
		);

		$options[] = array(
			'label'		=> __( 'Menu Link Hover Color', 'wpex-corporate' ),
			'id'		=> 'nav_link_hover_color',
			'element'	=> '#site-navigation .dropdown-menu > li > a:hover',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Menu Link Hover Background', 'wpex-corporate' ),
			'id'		=> 'nav_link_hover_bg',
			'element'	=> '#site-navigation .dropdown-menu > li > a:hover',
			'style'		=> 'background',
		);

		$options[] = array(
			'label'		=> __( 'Active Menu Link Color', 'wpex-corporate' ),
			'id'		=> 'nav_link_active_color',
			'element'	=> '#site-navigation .dropdown-menu > li.sfHover > a,#site-navigation .dropdown-menu > .current-menu-item > a,#site-navigation .dropdown-menu > .current-menu-item > a:hover ',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Active Menu Link Background', 'wpex-corporate' ),
			'id'		=> 'nav_link_active_bg',
			'element'	=> '#site-navigation .dropdown-menu > li.sfHover > a,#site-navigation .dropdown-menu > .current-menu-item > a,#site-navigation .dropdown-menu > .current-menu-item > a:hover ',
			'style'		=> 'background',
		);

		$options[] = array(
			'label'		=> __( 'Sub-Menu Link Color', 'wpex-corporate' ),
			'id'		=> 'nav_drop_link_color',
			'element'	=> '#site-navigation .dropdown-menu ul > li > a',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Sub-Menu Background', 'wpex-corporate' ),
			'id'		=> 'nav_drop_bg',
			'element'	=> '#site-navigation .dropdown-menu ul',
			'style'		=> 'background',
		);

		$options[] = array(
			'label'		=> __( 'Sub-Menu Link Bottom Border', 'wpex-corporate' ),
			'id'		=> 'nav_drop_link_border',
			'element'	=> '#site-navigation .dropdown-menu ul li',
			'style'		=> 'border-color',
		);

		$options[] = array(
			'label'		=> __( 'Sub-Menu Link Hover Color', 'wpex-corporate' ),
			'id'		=> 'nav_drop_link_hover_color',
			'element'	=> '#site-navigation .dropdown-menu ul > li > a:hover',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Sub-Menu Link Hover Background', 'wpex-corporate' ),
			'id'		=> 'nav_drop_link_hover_bg',
			'element'	=> '#site-navigation .dropdown-menu ul > li > a:hover',
			'style'		=> 'background',
		);

		$options[] = array(
			'label'		=> __( 'Mobile Menu Toggle Link Color', 'wpex-corporate' ),
			'id'		=> 'mobile_nav_link_color',
			'element'	=> 'a#navigation-toggle',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Mobile Menu Toggle Background', 'wpex-corporate' ),
			'id'		=> 'mobile_nav_link_bg',
			'element'	=> 'a#navigation-toggle',
			'style'		=> 'background',
		);

		$options[] = array(
			'label'		=> __( 'Mobile Menu Background', 'wpex-corporate' ),
			'id'		=> 'mobile_menu_link_bg',
			'element'	=> '#sidr-main',
			'style'		=> 'background',
		);

		$options[] = array(
			'label'		=> __( 'Mobile Menu Link Color', 'wpex-corporate' ),
			'id'		=> 'mobile_menu_link_color',
			'element'	=> '#sidr-main ul > li > a',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Mobile Menu Link Hover Color', 'wpex-corporate' ),
			'id'		=> 'mobile_menu_link_hover_color',
			'element'	=> '#sidr-main ul > li > a:hover',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Homepage Slider Arrows', 'wpex-corporate' ),
			'id'		=> 'slider_arr_bg',
			'element'	=> '.flex-prev, .flex-next',
			'style'		=> 'background',
		);

		$options[] = array(
			'label'		=> __( 'Homepage Slider Arrows Hover', 'wpex-corporate' ),
			'id'		=> 'slider_arr_hover_bg',
			'element'	=> '.flex-prev:hover, .flex-next:hover',
			'style'		=> 'background',
		);

		$options[] = array(
			'label'		=> __( 'Portfolio Overlay Color', 'wpex-corporate' ),
			'id'		=> 'img_overlay_color',
			'element'	=> '.overlay h3',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Portfolio Overlay Background', 'wpex-corporate' ),
			'id'		=> 'img_overlay_color_bg',
			'element'	=> '.overlay',
			'style'		=> 'background',
		);

		$options[] = array(
			'label'		=> __( 'Post Title Hover Color', 'wpex-corporate' ),
			'id'		=> 'heading_title_hover_color',
			'element'	=> 'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Post Meta Link Color', 'wpex-corporate' ),
			'id'		=> 'post_meta_color',
			'element'	=> '.post-meta a, .meta-date-text',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Post Meta Hover Color', 'wpex-corporate' ),
			'id'		=> 'post_meta_hover_color',
			'element'	=> '.post-meta a:hover',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Read More Link Color', 'wpex-corporate' ),
			'id'		=> 'readmore_color',
			'element'	=> '.wpex-readmore a',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Read More Hover Color', 'wpex-corporate' ),
			'id'		=> 'readmore_hover_color',
			'element'	=> '.wpex-readmore a:hover',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Link Color', 'wpex-corporate' ),
			'id'		=> 'link_color',
			'element'	=> '.single .entry a, #sidebar a, .comment-meta a.url, .logged-in-as a',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Link Hover Color', 'wpex-corporate' ),
			'id'		=> 'link_hover_color',
			'element'	=> '.single .entry a:hover, #sidebar a:hover, .comment-meta a.url:hover, .logged-in-as a:hover',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Sidebar Text Color', 'wpex-corporate' ),
			'id'		=> 'sidebar_text_color',
			'element'	=> '.sidebar-container',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Sidebar Widgets Heading', 'wpex-corporate' ),
			'id'		=> 'sidebar_widgets_headings',
			'element'	=> '.sidebar-container h2, .sidebar-container h3, .sidebar-container h4, .sidebar-container h5,  .sidebar-container h6, .sidebar-container .sidebar-widget .widget-title',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Sidebar Widgets Borders', 'wpex-corporate' ),
			'id'		=> 'sidebar_widgets_borders',
			'element'	=> '.sidebar-widgets .sidebar_nav_menu ul > li, .sidebar-widgets .widget_nav_menu ul > li a, .sidebar-widget > ul > li:first-child, .sidebar-widget > ul > li, .sidebar-widget h6, .sidebar-bottom',
			'style'		=> 'border-color',
		);

		$options[] = array(
			'label'		=> __( 'Sidebar Link Color', 'wpex-corporate' ),
			'id'		=> 'sidebar_link_color',
			'element'	=> '.sidebar-container a',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Sidebar Link Hover Color', 'wpex-corporate' ),
			'id'		=> 'sidebar_link_hover_color',
			'element'	=> '.sidebar-container a:hover',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Theme Button Color', 'wpex-corporate' ),
			'id'		=> 'theme_button_color',
			'element'	=> '.wpex-readmore a, input[type="button"], input[type="submit"], .page-numbers a:hover, .page-numbers.current, .page-links span, .page-links a:hover span',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Theme Button Background', 'wpex-corporate' ),
			'id'		=> 'theme_button_bg',
			'element'	=> '.wpex-readmore a, input[type="button"], input[type="submit"], .page-numbers a:hover, .page-numbers.current, .page-links span, .page-links a:hover span',
			'style'		=> 'background',
		);

		$options[] = array(
			'label'		=> __( 'Theme Button Hover Color', 'wpex-corporate' ),
			'id'		=> 'theme_button_hover_color',
			'element'	=> '.wpex-readmore a:hover, input[type="button"]:hover, input[type="submit"]:hover',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Theme Button Hover Background', 'wpex-corporate' ),
			'id'		=> 'theme_button_hover_bg',
			'element'	=> '.wpex-readmore a:hover, input[type="button"]:hover, input[type="submit"]:hover',
			'style'		=> 'background-color',
		);

		$options[] = array(
			'label'		=> __( 'Footer Widgets Background', 'wpex-corporate' ),
			'id'		=> 'footer_widgets_bg',
			'element'	=> '#footer-wrap',
			'style'		=> 'background',
		);

		$options[] = array(
			'label'		=> __( 'Footer Widgets Text', 'wpex-corporate' ),
			'id'		=> 'footer_widgets_color',
			'element'	=> '#footer-wrap, #footer-wrap p',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Footer Widgets Heading', 'wpex-corporate' ),
			'id'		=> 'footer_widgets_headings',
			'element'	=> '#footer-wrap h2, #footer-wrap h3, #footer-wrap h4, #footer-wrap h5,  #footer-wrap h6, #footer-widgets .widget-title',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Footer Widgets Links', 'wpex-corporate' ),
			'id'		=> 'footer_widgets_links_color',
			'element'	=> '#footer-wrap a, #footer-widgets .widget_nav_menu ul > li li a:before',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Footer Widgets Links Hover', 'wpex-corporate' ),
			'id'		=> 'footer_widgets_links_hover_color',
			'element'	=> '#footer-wrap a:hover',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Footer Widgets Borders', 'wpex-corporate' ),
			'id'		=> 'footer_widgets_borders',
			'element'	=> '#footer-widgets .widget_nav_menu ul > li, #footer-widgets .widget_nav_menu ul > li a, .footer-widget > ul > li:first-child, .footer-widget > ul > li, .footer-widget h6, #footer-bottom',
			'style'		=> 'border-color',
		);

		$options[] = array(
			'label'		=> __( 'Copyright Background', 'wpex-corporate' ),
			'id'		=> 'copyright_bg',
			'element'	=> '#copyright-wrap',
			'style'		=> 'background-color',
		);

		$options[] = array(
			'label'		=> __( 'Copyright Border', 'wpex-corporate' ),
			'id'		=> 'copyright_border',
			'element'	=> '#copyright-wrap',
			'style'		=> 'border-color',
		);

		$options[] = array(
			'label'		=> __( 'Copyright Color', 'wpex-corporate' ),
			'id'		=> 'copyright_color',
			'element'	=> '#copyright-wrap, #copyright-wrap p',
			'style'		=> 'color',
		);

		$options[] = array(
			'label'		=> __( 'Copyright Link Color', 'wpex-corporate' ),
			'id'		=> 'copyright_link_color',
			'element'	=> '#copyright-wrap a',
			'style'		=> 'color',
		);

		return $options;

	}


}
new Customizer();