<?php

/* start post type */
if ( ! class_exists( 'Wp_Technology_Type' ) ) :

class Wp_Technology_Type {

	public function __construct() {
	// Run when the plugin is activated
		register_activation_hook( __FILE__, array( $this, 'plugin_activation' ) );

		// Add the appointment post type and taxonomies
		add_action( 'init', array( $this, 'technology_init' ) );
		add_action( 'init', function () {
			add_ux_builder_post_type( 'technology' );
		} );

		// Thumbnail support for appointment posts
		add_theme_support( 'post-thumbnails', array( 'technology' ) );

		// Add thumbnails to column view
		add_filter( 'manage_edit-technology_columns', array( $this, 'add_thumbnail_column'), 10, 1 );
		add_action( 'manage_technology_posts_custom_column', array( $this, 'display_thumbnail' ), 10, 1 );

		// Allow filtering of posts by taxonomy in the admin view
		add_action( 'restrict_manage_posts', array( $this, 'add_taxonomy_filters' ) );

		// Show appointment post counts in the dashboard
		add_action( 'right_now_content_table_end', array( $this, 'add_technology_counts' ) );


		// Add taxonomy terms as body classes
		add_filter( 'body_class', array( $this, 'add_body_classes' ) );

	}

	/**
	 * Load the plugin text domain for translation.
	 */


	/**
	 * Flushes rewrite rules on plugin activation to ensure appointment posts don't 404.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/flush_rewrite_rules
	 *
	 * @uses Featured Item_Post_Type::featured_item_init()
	 */
	public function plugin_activation() {
		$this->Technology_init();
		flush_rewrite_rules();
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses Featured Item_Post_Type::register_post_type()
	 * @uses Featured Item_Post_Type::register_taxonomy_tag()
	 * @uses Featured Item_Post_Type::register_taxonomy_category()
	 */
	public function technology_init() {
		$this->register_post_type();
		$this->register_taxonomy_category();
		$this->register_taxonomy_tag();
	}

	/**
	 * Get an array of all taxonomies this plugin handles.
	 *
	 * @return array Taxonomy slugs.
	 */
	protected function get_taxonomies() {
		return array( 'technology_category', 'technology_tag' );
	}



	/**
	 * Enable the Featured Item custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type()
	{
		$labels = array(
			'name'                  => _x( 'Technologies', 'Post Type General Name', 'drhung' ),
			'singular_name'         => _x( 'Technology', 'Post Type Singular Name', 'drhung' ),
			'menu_name'             => __( 'Technologies', 'drhung' ),
			'name_admin_bar'        => __( 'Technologies', 'drhung' ),
			'archives'              => __( 'Item Archives', 'drhung' ),
			'attributes'            => __( 'Item Attributes', 'drhung' ),
			'parent_item_colon'     => __( 'Parent Item:', 'drhung' ),
			'all_items'             => __( 'All Items', 'drhung' ),
			'add_new_item'          => __( 'Add New Item', 'drhung' ),
			'add_new'               => __( 'Add New', 'drhung' ),
			'new_item'              => __( 'New Item', 'drhung' ),
			'edit_item'             => __( 'Edit Item', 'drhung' ),
			'update_item'           => __( 'Update Item', 'drhung' ),
			'view_item'             => __( 'View Item', 'drhung' ),
			'view_items'            => __( 'View Items', 'drhung' ),
			'search_items'          => __( 'Search Item', 'drhung' ),
			'not_found'             => __( 'Not found', 'drhung' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'drhung' ),
			'featured_image'        => __( 'Featured Image', 'drhung' ),
			'set_featured_image'    => __( 'Set featured image', 'drhung' ),
			'remove_featured_image' => __( 'Remove featured image', 'drhung' ),
			'use_featured_image'    => __( 'Use as featured image', 'drhung' ),
			'insert_into_item'      => __( 'Insert into item', 'drhung' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'drhung' ),
			'items_list'            => __( 'Items list', 'drhung' ),
			'items_list_navigation' => __( 'Items list navigation', 'drhung' ),
			'filter_items_list'     => __( 'Filter items list', 'drhung' ),
		);
		$rewrite = array(
			'slug'                  => 'congnghe',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Technology', 'drhung' ),
			'description'           => __( 'Technology of Spa', 'drhung' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-sos',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
		);

		$args = apply_filters( 'technology_posttype_args', $args );
		register_post_type( 'technology', $args );
	}



	/**
	 * Register a taxonomy for Featured Item Tags.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_tag() {
		$labels = array(
			'name'                       => __( 'Technology Tags', 'drhung' ),
			'singular_name'              => __( 'Technology Tag', 'drhung' ),
			'menu_name'                  => __( 'Technology Tags', 'drhung' ),
			'edit_item'                  => __( 'Edit Tag', 'drhung' ),
			'update_item'                => __( 'Update Tag', 'drhung' ),
			'add_new_item'               => __( 'Add New Tag', 'drhung' ),
			'new_item_name'              => __( 'New  Tag Name', 'drhung' ),
			'parent_item'                => __( 'Parent Tag', 'drhung' ),
			'parent_item_colon'          => __( 'Parent Tag:', 'drhung' ),
			'all_items'                  => __( 'All Tags', 'drhung' ),
			'search_items'               => __( 'Search  Tags', 'drhung' ),
			'popular_items'              => __( 'Popular Tags', 'drhung' ),
			'separate_items_with_commas' => __( 'Separate tags with commas', 'drhung' ),
			'add_or_remove_items'        => __( 'Add or remove tags', 'drhung' ),
			'choose_from_most_used'      => __( 'Choose from the most used tags', 'drhung' ),
			'not_found'                  => __( 'No  tags found.', 'drhung' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => false,
			'show_admin_column' => true,
			'query_var'         => true,

		);

		$args = apply_filters( 'technology_posttype_tag_args', $args );

		register_taxonomy( 'technology_tag', array( 'technology' ), $args );

	}

	/**
	 * Register a taxonomy for Featured Item Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_category()
	{
		$labels = array(
			'name'                       => __( 'Technology Categories', 'drhung' ),
			'singular_name'              => __( 'Technology Category', 'drhung' ),
			'menu_name'                  => __( 'Technology Categories', 'drhung' ),
			'edit_item'                  => __( 'Edit Category', 'drhung' ),
			'update_item'                => __( 'Update Category', 'drhung' ),
			'add_new_item'               => __( 'Add New Category', 'drhung' ),
			'new_item_name'              => __( 'New Category Name', 'drhung' ),
			'parent_item'                => __( 'Parent Category', 'drhung' ),
			'parent_item_colon'          => __( 'Parent Category:', 'drhung' ),
			'all_items'                  => __( 'All Categories', 'drhung' ),
			'search_items'               => __( 'Search Categories', 'drhung' ),
			'popular_items'              => __( 'Popular Categories', 'drhung' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'drhung' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'drhung' ),
			'choose_from_most_used'      => __( 'Choose from the most used categories', 'drhung' ),
			'not_found'                  => __( 'No categories found.', 'drhung' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'technology_posttype_category_args', $args );

		register_taxonomy( 'technology_category', array( 'technology' ), $args );
	}



	/**
	 * Add taxonomy terms as body classes.
	 *
	 * If the taxonomy doesn't exist (has been unregistered), then get_the_terms() returns WP_Error, which is checked
	 * for before adding classes.
	 *
	 * @param array $classes Existing body classes.
	 *
	 * @return array Amended body classes.
	 */
	public function add_body_classes( $classes ) {
		$taxonomies = $this->get_taxonomies();

		foreach( $taxonomies as $taxonomy ) {
			$terms = get_the_terms( get_the_ID(), $taxonomy );
			if ( $terms && ! is_wp_error( $terms ) ) {
				foreach( $terms as $term ) {
					$classes[] = sanitize_html_class( str_replace( '_', '-', $taxonomy ) . '-' . $term->slug );
				}
			}
		}

		return $classes;
	}

	/**
	 * Add columns to Featured Item list screen.
	 *
	 * @link http://wptheming.com/2010/07/column-edit-pages/
	 *
	 * @param array $columns Existing columns.
	 *
	 * @return array Amended columns.
	 */
	public function add_thumbnail_column( $columns ) {
		$column_thumbnail = array( 'thumbnail' => __( 'Thumbnail', 'drhung' ) );
		return array_slice( $columns, 0, 2, true ) + $column_thumbnail + array_slice( $columns, 1, null, true );
	}

	/**
	 * Custom column callback
	 *
	 * @global stdClass $post Post object.
	 *
	 * @param string $column Column ID.
	 */
	public function display_thumbnail( $column ) {
		global $post;
		switch ( $column ) {
			case 'thumbnail':
				echo get_the_post_thumbnail( $post->ID, array(35, 35) );
				break;
		}
	}

	/**
	 * Add taxonomy filters to the featured_item admin page.
	 *
	 * Code artfully lifted from http://pippinsplugins.com/
	 *
	 * @global string $typenow
	 */
	public function add_taxonomy_filters() {
		global $typenow;

		// An array of all the taxonomies you want to display. Use the taxonomy name or slug
		$taxonomies = $this->get_taxonomies();

		// Must set this to the post type you want the filter(s) displayed on
		if ( 'technology' != $typenow ) {
			return;
		}

		foreach ( $taxonomies as $tax_slug ) {
			$current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
			$tax_obj          = get_taxonomy( $tax_slug );
			$tax_name         = $tax_obj->labels->name;
			$terms            = get_terms( $tax_slug );
			if ( 0 == count( $terms ) ) {
				return;
			}
			echo '<select name="' . esc_attr( $tax_slug ) . '" id="' . esc_attr( $tax_slug ) . '" class="postform">';
			echo '<option value="">' . esc_html( $tax_name ) .'</option>';
			foreach ( $terms as $term ) {
				printf(
					'<option value="%s"%s />%s</option>',
					esc_attr( $term->slug ),
					selected( $current_tax_slug, $term->slug ),
					esc_html( $term->name . '(' . $term->count . ')' )
				);
			}
			echo '</select>';
		}
	}

	/**
	 * Add Featured Item count to "Right Now" dashboard widget.
	 *
	 * @return null Return early if featured_item post type does not exist.
	 */
	public function add_technology_counts() {
		if ( ! post_type_exists( 'technology' ) ) {
			return;
		}

		$num_posts = wp_count_posts( 'technology' );

		// Published items
		$href = 'edit.php?post_type=technology';
		$num  = number_format_i18n( $num_posts->publish );
		$num  = $this->link_if_can_edit_posts( $num, $href );
		$text = _n( 'Technology Item', 'Technology Items', intval( $num_posts->publish ) );
		$text = $this->link_if_can_edit_posts( $text, $href );
		$this->display_dashboard_count( $num, $text );

		if ( 0 == $num_posts->pending ) {
			return;
		}

		// Pending items
		$href = 'edit.php?post_status=pending&amp;post_type=technology';
		$num  = number_format_i18n( $num_posts->pending );
		$num  = $this->link_if_can_edit_posts( $num, $href );
		$text = _n( 'Technology Item Pending', 'Technology Items Pending', intval( $num_posts->pending ) );
		$text = $this->link_if_can_edit_posts( $text, $href );
		$this->display_dashboard_count( $num, $text );
	}

	/**
	 * Wrap a dashboard number or text value in a link, if the current user can edit posts.
	 *
	 * @param  string $value Value to potentially wrap in a link.
	 * @param  string $href  Link target.
	 *
	 * @return string        Value wrapped in a link if current user can edit posts, or original value otherwise.
	 */
	protected function link_if_can_edit_posts( $value, $href ) {
		if ( current_user_can( 'edit_posts' ) ) {
			return '<a href="' . esc_url( $href ) . '">' . $value . '</a>';
		}
		return $value;
	}

	/**
	 * Display a number and text with table row and cell markup for the dashboard counters.
	 *
	 * @param  string $number Number to display. May be wrapped in a link.
	 * @param  string $label  Text to display. May be wrapped in a link.
	 */
	protected function display_dashboard_count( $number, $label ) {
		?>
		<tr>
			<td class="first b b-Technologies"><?php echo $number; ?></td>
			<td class="t Technologies"><?php echo $label; ?></td>
		</tr>
		<?php
	}



}

new Wp_Technology_Type;

endif;