<?php
/**
 * Dashboard feeds
 */

defined( 'ABSPATH' ) || exit;

// Register all dashboard metaboxes
function wpex_mdm_register_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget( 'widget_wpexplorer_feed', esc_html__( 'WP Related Articles', 'wpex-corporate' ), 'wpex_dashboard_rss_box' );
}
add_action( 'wp_dashboard_setup', 'wpex_mdm_register_widgets' );

// Creates the RSS metabox for WPExplorer feed
function wpex_dashboard_rss_box() {
	echo wp_widget_rss_output( esc_url( 'https://www.wpexplorer.com/feed/' ), array(
		'items'        => 4,
		'show_summary' => true,
	) );
	echo sprintf( '<div style="margin-top:20px;padding-top:10px;border-top:1px solid #eee;">%s <a href="%s">%s</a></div>', esc_html__( 'Feed From', 'wpex-corporate' ), 'https://www.wpexplorer.com/', esc_attr( 'wpexplorer.com' ) );
}