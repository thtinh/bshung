<?php

/* start post type */
if ( ! class_exists( 'Wp_Appointment_Type' ) ) :

class Wp_Appointment_Type
{
	protected $prefix;

	public function __construct() {

		$this->prefix = 'appointment_';
		// Run when the plugin is activated
		register_activation_hook( __FILE__, array( $this, 'plugin_activation' ) );

		// Add the appointment post type and taxonomies
		add_action( 'init', array( $this, 'service_init' ) );

		// Add the meta post for Post type
		add_filter( 'rwmb_meta_boxes', array( $this, 'register_metabox' ) );

		// Add thumbnails to column view
		add_filter( 'manage_edit-appointment_columns', array( $this, 'add_thumbnail_column'), 10, 1 );
		// add_action( 'manage_pages_custom_column', array( $this, 'display_collumns' ), 10, 1 );
		add_action( 'manage_appointment_posts_custom_column', array( $this, 'display_collumns' ), 10, 1 );

		// Show appointment post counts in the dashboard
		add_action( 'right_now_content_table_end', array( $this, 'add_service_counts' ) );
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
		$this->service_init();
		flush_rewrite_rules();
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses Featured Item_Post_Type::register_post_type()
	 * @uses Featured Item_Post_Type::register_taxonomy_tag()
	 * @uses Featured Item_Post_Type::register_taxonomy_category()
	 */
	public function service_init() {
		$this->register_post_type();
	}

	/**
	 * Enable the Featured Item custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type()
	{
		$labels = array(
			'name'                  => _x( 'Appointments', 'Post Type General Name', 'drhung' ),
			'singular_name'         => _x( 'Appointment', 'Post Type Singular Name', 'drhung' ),
			'menu_name'             => __( 'Appointments', 'drhung' ),
			'name_admin_bar'        => __( 'Appointments', 'drhung' ),
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
			'slug'                  => 'appointment',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Appointment', 'drhung' ),
			'description'           => __( 'Appointment Description', 'drhung' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-calendar-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
		);

		$args = apply_filters( 'appointment_posttype_args', $args );
		register_post_type( 'appointment', $args );
	}

	/**
	 * Register a metabox
	 * @param  [type] $meta_boxes [description]
	 * @return [type]             [description]
	 */
	function register_metabox( $meta_boxes )
	{
		$prefix = $this->prefix;
	    $meta_boxes[] = array(
	        'id'         => 'appointment_metabox_id',
	        'title'      => __( 'Appointment Information', 'drhung' ),
	        'post_types' => array( 'appointment' ),
	        'context'    => 'normal',
	        'priority'   => 'high',
	        'fields' => array(
	        	array(
					'id' => $prefix . 'fullname',
					'type' => 'text',
					'name' => esc_html__( 'Họ và tên', 'metabox-online-generator' ),
					'desc' => esc_html__( 'Tên khách hàng', 'metabox-online-generator' ),
				),
				array(
					'id' => $prefix . 'email',
					'type' => 'email',
					'name' => esc_html__( 'Email', 'metabox-online-generator' ),
					'desc' => esc_html__( 'Email', 'metabox-online-generator' ),
				),
				array(
					'id' => $prefix . 'phone',
					'type' => 'text',
					'name' => esc_html__( 'Số điện thoại', 'metabox-online-generator' ),
					'desc' => esc_html__( 'Số điện thoại khách hàng', 'metabox-online-generator' ),
				),
				array(
					'id' => $prefix . 'date',
					'type' => 'date',
					'name' => esc_html__( 'Ngày', 'drhung' ),
					'desc' => esc_html__( 'Ngày đặt', 'drhung' ),
					'timestamp' => 'false',
				    'js_options' => array(
				        'dateFormat'      => 'dd-mm-yy',
				        'showButtonPanel' => true,
				    ),
				    'save_format' => 'Y-m-d',
				),
				array(
					'id' => $prefix . 'time',
					'name' => esc_html__( 'Giờ hẹn', 'drhung' ),
					'type' => 'time',
					'desc' => esc_html__( 'Giờ hẹn gặp bác sĩ', 'drhung' ),
				),
				array(
					'id' => $prefix . 'service',
					'type' => 'post',
					'name' => esc_html__( 'Dịch vụ', 'drhung' ),
					'post_type' => 'service',
					'field_type' => 'select_advanced',
					'query_args' => array(),
				),
	        )
	    );
	    $meta_boxes[] = array(
	        'id'         => 'appointment_metabox_status_id',
	        'title'      => __( 'Appointment Status', 'drhung' ),
	        'post_types' => array( 'appointment' ),
	        'context'    => 'normal',
	        'priority'   => 'high',
	        'fields' => array(
	        	array(
					'name' => __( 'Status', 'drhung' ),
					'id'   => "{$prefix}status",
					'type' => 'select',
					'std'  => 'un_read',
	                'columns' => 4,
	                'options'     => array(
						'read'    => __( 'Read', 'drhung' ),
						'un_read' => __( 'Unread', 'drhung' ),
						'process' => __( 'Process', 'drhung' ),
						'finish'  => __( 'Finish', 'drhung' ),
					),
	            ),
	        ),
	        'validation' => array(
	            'rules'    => array(
	                "{$prefix}status" => array(
	                    'required'  => true
	                )
	            ),
	        )
	    );

		return $meta_boxes;
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
	public function add_thumbnail_column( $columns )
	{
		$prefix = $this->prefix;
		unset($columns['date']);
	    $columns[$prefix. 'fullname'] = __( 'Fullname', 'drhung' );
	    $columns[$prefix. 'phone'] = __( 'Phone', 'drhung' );
	    $columns[$prefix. 'date'] = __( 'Date', 'drhung' );
	    $columns[$prefix. 'time'] = __( 'Time', 'drhung' );
	    $columns[$prefix. 'status'] = __( 'Status', 'drhung' );
	    $columns['date'] = __( 'Date', 'drhung' );

	    return $columns;
	}

	/**
	 * Custom column callback
	 *
	 * @global stdClass $post Post object.
	 *
	 * @param string $column Column ID.
	 */
	public function display_collumns( $column )
	{
		$prefix = $this->prefix;
		$field = rwmb_meta( $column, array(), $post_id );

		if($column == $prefix. 'status') {
        	switch ($field) {
        		case 'un_read':
        			echo __('<span class="unread">Unread</span>');
        			break;
    			case 'read':
        			echo __('<span class="read">Read</span>');
        			break;
        		case 'process':
        			echo __('<span class="process">Process</span>');
        			break;
        		case 'finish':
        			echo __('<span class="finish">Finish</span>');
        			break;

        		default:
        			echo __('<span class="finish">Finish</span>');
        			break;
        	}
	    } else {
	    	if($column == $prefix. 'phone')
	    	{
	    		echo sprintf('<strong><a href="%s" class="row-title" title="%s">%s</a></strong>', get_edit_post_link( $post_id, 'publish' ), $field, $field);
	    	}
	    	else
	    	{
	    		if($column == $prefix. 'date')
		    	{
		    		echo date('d/m/Y', $field);
		    	}
		    	else
		    	{
		    		echo $field;
		    	}
	    	}
	    }
	}

	/**
	 * Add Featured Item count to "Right Now" dashboard widget.
	 *
	 * @return null Return early if featured_item post type does not exist.
	 */
	public function add_appointment_counts() {
		if ( ! post_type_exists( 'appointment' ) ) {
			return;
		}

		$num_posts = wp_count_posts( 'appointment' );

		// Published items
		$href = 'edit.php?post_type=appointment';
		$num  = number_format_i18n( $num_posts->publish );
		$num  = $this->link_if_can_edit_posts( $num, $href );
		$text = _n( 'Appointment Item', 'Appointment Items', intval( $num_posts->publish ) );
		$text = $this->link_if_can_edit_posts( $text, $href );
		$this->display_dashboard_count( $num, $text );

		if ( 0 == $num_posts->pending ) {
			return;
		}

		// Pending items
		$href = 'edit.php?post_status=pending&amp;post_type=appointment';
		$num  = number_format_i18n( $num_posts->pending );
		$num  = $this->link_if_can_edit_posts( $num, $href );
		$text = _n( 'Appointment Item Pending', 'Appointment Items Pending', intval( $num_posts->pending ) );
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
			<td class="first b b-featured_item"><?php echo $number; ?></td>
			<td class="t featured_item"><?php echo $label; ?></td>
		</tr>
		<?php
	}



}

new Wp_Appointment_Type;

endif;