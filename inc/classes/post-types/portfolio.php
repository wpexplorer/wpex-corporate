<?php
/**
 * Registers the "Portfolio" custom post type
 *
 * @package     Corporate WordPress theme
 * @subpackage  Post Types
 * @author      Alexander Clarke
 * @link        http://www.wpexplorer.com
 * @since       2.0.0
 */

if ( ! class_exists( 'WPEX_Portfolio_Post_Type' ) ) {

	class WPEX_Portfolio_Post_Type {

		/**
		 * Class Constructor
		 *
		 * @since   2.0.0
		 * @access  public
		 */
		public function __construct() {

			// Adds image sizes for portfolio items
			add_action( 'after_setup_theme', array( &$this, 'image_sizes' ) );

			// Adds the portfolio post type and taxonomies
			add_action( 'init', array( &$this, 'register' ), 0 );

			// Thumbnail support for portfolio posts
			add_theme_support( 'post-thumbnails', array( 'portfolio' ) );

			// Adds columns in the admin view for thumbnail and taxonomies
			add_filter( 'manage_edit-portfolio_columns', array( &$this, 'edit_cols' ) );
			add_action( 'manage_posts_custom_column', array( &$this, 'cols_display' ), 10, 2 );

			// Allows filtering of posts by taxonomy in the admin view
			add_action( 'restrict_manage_posts', array( &$this, 'tax_filters' ) );

			// Enable the gallery metabox for portfolio items
			add_filter( 'wpex_gallery_metabox_post_types', array( &$this, 'gallery_metabox' ) );

		}

		/**
		 * Adds image sizes for portfolio items
		 *
		 * @since   2.0.0
		 * @access  public
		 *
		 * @link	http://codex.wordpress.org/Function_Reference/add_image_size
		 */
		public function image_sizes() {
			add_image_size( 'wpex-portfolio-entry', 400, 340, true );
			add_image_size( 'wpex-portfolio-post', 9999, 9999, false );
		}
		
		/**
		 * Register the post type
		 *
		 * @since   2.0.0
		 * @access  public
		 *
		 * @link	http://codex.wordpress.org/Function_Reference/register_post_type
		 */
		public function register() {

			// Define post type labels
			$labels = array(
				'name'					=> esc_html__( 'Portfolio', 'corporate' ),
				'singular_name'			=> esc_html__( 'Portfolio Item', 'corporate' ),
				'add_new'				=> esc_html__( 'Add New Item', 'corporate' ),
				'add_new_item'			=> esc_html__( 'Add New Portfolio Item', 'corporate' ),
				'edit_item'				=> esc_html__( 'Edit Portfolio Item', 'corporate' ),
				'new_item'				=> esc_html__( 'Add New Portfolio Item', 'corporate' ),
				'view_item'				=> esc_html__( 'View Item', 'corporate' ),
				'search_items'			=> esc_html__( 'Search Portfolio', 'corporate' ),
				'not_found'				=> esc_html__( 'No portfolio items found', 'corporate' ),
				'not_found_in_trash'	=> esc_html__( 'No portfolio items found in trash', 'corporate' )
			);
			
			// Define post type args
			$args = array(
				'labels'			=> $labels,
				'public'			=> true,
				'supports'			=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'revisions', 'post-formats' ),
				'capability_type'	=> 'post',
				'rewrite'			=> array("slug" => "portfolio-item"), // Permalinks format
				'has_archive'		=> false,
				'menu_icon'			=> 'dashicons-portfolio',
			); 
			
			// Apply filters for child theming
			$args = apply_filters( 'wpex_portfolio_args', $args);
			
			// Register the post type
			register_post_type( 'portfolio', $args );

			// Define portfolio category taxonomy labels
			$cat_labels = array(
				'name'							=> esc_html__( 'Portfolio Categories', 'corporate' ),
				'singular_name'					=> esc_html__( 'Portfolio Category', 'corporate' ),
				'search_items'					=> esc_html__( 'Search Portfolio Categories', 'corporate' ),
				'popular_items'					=> esc_html__( 'Popular Portfolio Categories', 'corporate' ),
				'all_items'						=> esc_html__( 'All Portfolio Categories', 'corporate' ),
				'parent_item'					=> esc_html__( 'Parent Portfolio Category', 'corporate' ),
				'parent_item_colon'				=> esc_html__( 'Parent Portfolio Category:', 'corporate' ),
				'edit_item'						=> esc_html__( 'Edit Portfolio Category', 'corporate' ),
				'update_item'					=> esc_html__( 'Update Portfolio Category', 'corporate' ),
				'add_new_item'					=> esc_html__( 'Add New Portfolio Category', 'corporate' ),
				'new_item_name'					=> esc_html__( 'New Portfolio Category Name', 'corporate' ),
				'separate_items_with_commas'	=> esc_html__( 'Separate portfolio categories with commas', 'corporate' ),
				'add_or_remove_items'			=> esc_html__( 'Add or remove portfolio categories', 'corporate' ),
				'choose_from_most_used'			=> esc_html__( 'Choose from the most used portfolio categories', 'corporate' ),
				'menu_name'						=> esc_html__( 'Portfolio Categories', 'corporate' ),
			);

			// Define portfolio category taxonomy args
			$cat_args = array(
				'labels'			=> $cat_labels,
				'public'			=> true,
				'show_in_nav_menus'	=> true,
				'show_ui'			=> true,
				'show_tagcloud'		=> true,
				'hierarchical'		=> true,
				'rewrite'			=> array( 'slug' => 'portfolio-category' ),
				'query_var'			=> true
			);

			// Apply filters for child theming
			$cat_args = apply_filters( 'wpex_taxonomy_portfolio_category_args', $cat_args );
			
			// Register the portfolio_category taxonomy
			register_taxonomy( 'portfolio_category', array( 'portfolio' ), $cat_args );

		}

		/**
		 * Adds columns in the admin view for thumbnail and taxonomies
		 *
		 * @since   2.0.0
		 * @access  public
		 *
		 */
		public function edit_cols( $columns ) {
			$columns['portfolio_thumbnail']	= esc_html__( 'Thumbnail', 'corporate' );
			$columns['portfolio_category']	= esc_html__( 'Category', 'corporate' );
			return $columns;
		}

		/**
		 * Adds columns in the admin view for thumbnail and taxonomies
		 *
		 * @since   2.0.0
		 * @access  public
		 */
		public function cols_display( $portfolio_columns, $post_id ) {

			switch ( $portfolio_columns ) {

				// Display the thumbnail in the column view
				case "portfolio_thumbnail":

					// Get post thumbnail ID
					$thumbnail_id = get_post_thumbnail_id();

					// Display the featured image in the column view if possible
					if ( $thumbnail_id ) {
						$thumb = wp_get_attachment_image( $thumbnail_id, array( '80', '80' ), true );
					}
					if ( isset( $thumb ) ) {
						echo $thumb;
					} else {
						echo '&mdash;';
					}

				break;	

				// Display the portfolio tags in the column view
				case "portfolio_category":

					if ( $category_list = get_the_term_list( $post_id, 'portfolio_category', '', ', ', '' ) ) {
						echo $category_list;
					} else {
						echo '&mdash;';
					}

				break;	
		
			}
		}

		/**
		 * Adds taxonomy filters to the portfolio admin page
		 *
		 * @since   2.0.0
		 * @access  public
		 */
		public function tax_filters() {
			
			global $typenow;

			// An array of all the taxonomyies you want to display. Use the taxonomy name or slug
			$taxonomies = array( 'portfolio_category' );

			// must set this to the post type you want the filter(s) displayed on
			if ( $typenow == 'portfolio' ) {

				foreach ( $taxonomies as $tax_slug ) {
					$current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
					$tax_obj = get_taxonomy( $tax_slug );
					$tax_name = $tax_obj->labels->name;
					$terms = get_terms($tax_slug);
					if ( count( $terms ) > 0) {
						echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
						echo "<option value=''>$tax_name</option>";
						foreach ( $terms as $term ) {
							echo '<option value=' . $term->slug, $current_tax_slug == $term->slug ? ' selected="selected"' : '','>' . $term->name .' ( ' . $term->count .')</option>';
						}
						echo "</select>";
					}
				}
			}
		}

		/**
		 * Enable the gallery metabox for portfolio items
		 *
		 * @since   2.0.0
		 * @access  public
		 *
		 */
		public function gallery_metabox( $types ) {

			// Enable for portfolio
			$types[] = 'portfolio';

			// Return types
			return $types;

		}

	}
}
$wpex_portfolio_post_type = new WPEX_Portfolio_Post_Type;