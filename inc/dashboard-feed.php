<?php
/**
 * Dashboard feeds
 */

// Register all dashboard metaboxes
function rc_mdm_register_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget( 'widget_wpexplorer_feed', esc_html__( 'WPExplorer Blog', 'corporate' ), 'wpex_dashboard_rss_box' );
	wp_add_dashboard_widget( 'widget_wdexplorer_feed', esc_html__( 'Web Design Blog', 'corporate' ), 'wde_dashboard_rss_box' );
}
add_action('wp_dashboard_setup', 'rc_mdm_register_widgets');

// Creates the RSS metabox for WPExplorer feed
function wpex_dashboard_rss_box() {
	
	// Get RSS Feed(s)
	include_once(ABSPATH . WPINC . '/feed.php');
	
	// My feeds list (add your own RSS feeds urls)
	$my_feeds = array( 'http://www.wpexplorer.com/feed/');
	
	// Loop through Feeds
	foreach ( $my_feeds as $feed) :
	
		// Get a SimplePie feed object from the specified feed source.
		$rss = fetch_feed( $feed );
		if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly 
			// Figure out how many total items there are, and choose a limit 
			$maxitems = $rss->get_item_quantity( 4 ); 
		
			// Build an array of all the items, starting with element 0 (first element).
			$rss_items = $rss->get_items( 0, $maxitems ); 
	
			// Get RSS title
			$rss_title = '<a class="rsswidget" href="'.$rss->get_permalink().'" target="_blank">'.strtoupper( $rss->get_title() ).'</a>'; 
		endif;
	
		// Display the container
		echo '<div class="rss-widget">';
		
		// Starts items listing within <ul> tag
		echo '<ul>';
		
		// Check items
		if ( $maxitems == 0 ) {
			echo '<li>'.__( 'No items', 'corporate').'.</li>';
		} else {
			// Loop through each feed item and display each item as a hyperlink.
			foreach ( $rss_items as $item ) :
				$item_date = human_time_diff( $item->get_date('U'), current_time('timestamp')).' '.__( 'ago', 'rc_mdm' );
				// Start displaying item content within a <li> tag
				echo '<li style="margin-bottom:15px;">';
				// create item link
				echo '<a class="rsswidget" style="font-weight:400;" href="'.esc_url( $item->get_permalink() ).'" title="'. esc_html( $item->get_title() ) .'">';
				// Get item title
				echo esc_html( $item->get_title() );
				echo '</a>';
				// Display date
				echo ' <span class="rss-date">'.$item_date.'</span><br />';
				// Get item content
				$content = $item->get_content();
				// Shorten content
				$content = '<div class="rssSummary">'. wp_html_excerpt($content, 140) . ' [...]</div>';
				// Display content
				echo $content;
				// End <li> tag
				echo '</li>';
			endforeach;
		}
		// End <ul> tag
		echo '</ul><div style="margin-top:20px;padding-top:10px;border-top:1px solid #eee;">Feed from <a href="http://www.wpexplorer.com" target="_blank">wpexplorer.com</a></div></div>';

	endforeach; // End foreach feed
}

// Creates the RSS metabox for WPExplorer feed
function wde_dashboard_rss_box() {
	
	// Get RSS Feed(s)
	include_once(ABSPATH . WPINC . '/feed.php');
	
	// My feeds list (add your own RSS feeds urls)
	$my_feeds = array( 'http://www.wdexplorer.com/feed/');
	
	// Loop through Feeds
	foreach ( $my_feeds as $feed) :
	
		// Get a SimplePie feed object from the specified feed source.
		$rss = fetch_feed( $feed );
		if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly 
			// Figure out how many total items there are, and choose a limit 
			$maxitems = $rss->get_item_quantity( 4 ); 
		
			// Build an array of all the items, starting with element 0 (first element).
			$rss_items = $rss->get_items( 0, $maxitems ); 
	
			// Get RSS title
			$rss_title = '<a href="'.$rss->get_permalink().'" target="_blank">'.strtoupper( $rss->get_title() ).'</a>'; 
		endif;
	
		// Display the container
		echo '<div class="rss-widget">';
		
		// Starts items listing within <ul> tag
		echo '<ul>';
		
		// Check items
		if ( $maxitems == 0 ) {
			echo '<li>'.__( 'No items', 'corporate').'.</li>';
		} else {
			// Loop through each feed item and display each item as a hyperlink.
			foreach ( $rss_items as $item ) :
				$item_date = human_time_diff( $item->get_date('U'), current_time('timestamp')).' '.__( 'ago', 'rc_mdm' );
				// Start displaying item content within a <li> tag
				echo '<li style="margin-bottom:15px;">';
				// create item link
				echo '<a class="rsswidget" style="font-weight:400;" href="'.esc_url( $item->get_permalink() ).'" title="'. esc_html( $item->get_title() ) .'">';
				// Get item title
				echo esc_html( $item->get_title() );
				echo '</a>';
				// Display date
				echo ' <span class="rss-date">'.$item_date.'</span><br />';
				// Get item content
				$content = $item->get_content();
				// Shorten content
				$content = '<div class="rssSummary">'. wp_html_excerpt($content, 140) . ' [...]</div>';
				// Display content
				echo $content;
				// End <li> tag
				echo '</li>';
			endforeach;
		}
		// End <ul> tag
		echo '</ul><div style="margin-top:20px;padding-top:10px;border-top:1px solid #eee;">Feed from <a href="http://www.wdexplorer.com" target="_blank">wdexplorer.com</a></div></div>';

	endforeach; // End foreach feed
}