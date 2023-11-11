<?php
// Add custom Theme Functions here
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/includes/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 *  <snip />
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(

	// This is an example of how to include a plugin from the WordPress Plugin Repository.
	array(
			'name'               => 'Meta Box', // The plugin name.
			'slug'               => 'meta-box', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url'       => 'https://wordpress.org/plugins/meta-box/', // If set, overrides default API URL and points to an external URL.
			'force_activation'   => true,
			'force_deactivation' => true,
		)


	// <snip />
  );

  /*
   * Array of configuration settings. Amend each line as needed.
   *
   * TGMPA will start providing localized text strings soon. If you already have translations of our standard
   * strings available, please help us make TGMPA even better by giving us access to these translations or by
   * sending in a pull-request with .po file(s) with the translations.
   *
   * Only uncomment the strings in the config array if you want to customize the strings.
   */
  $config = array(
	'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
	'default_path' => '',                      // Default absolute path to bundled plugins.
	'menu'         => 'tgmpa-install-plugins', // Menu slug.
	'parent_slug'  => 'themes.php',            // Parent menu slug.
	'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
	'has_notices'  => true,                    // Show admin notices or not.
	'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
	'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
	'is_automatic' => false,                   // Automatically activate plugins after installation or not.
	'message'      => '',
	'strings'      => array(
		'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
		'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
		'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
		'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
		'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
		'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
		'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
		'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
		'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
		'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
		'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
		'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
		'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
		'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
		'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
		'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
		'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
		'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
	)
  );

  tgmpa( $plugins, $config );

}

/**
 * Include Metabox option
 */
require_once dirname( __FILE__ ) . '/includes/appointment-posttype.php';
require_once dirname( __FILE__ ) . '/includes/service-posttype.php';
require_once dirname( __FILE__ ) . '/includes/technology-posttype.php';
// require_once dirname( __FILE__ ) . '/includes/custom-code.php';


function load_stylesheet() {
  wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'load_stylesheet' );

function load_fontawesome() {
  wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/style/lib/fontawesome/css/fontawesome.css' );
}
add_action( 'wp_enqueue_scripts', 'load_fontawesome' );

function load_datetimepicker() {
  	wp_register_script( 'datetimepicker', get_stylesheet_directory_uri() . '/style/lib/datetimepicker/build/jquery.datetimepicker.full.min.js', array(), '1.1', false );
  	wp_enqueue_script( 'datetimepicker');
  	wp_register_script( 'jquery-validate', get_stylesheet_directory_uri() . '/style/lib/jquery-validation/dist/jquery.validate.js', array(), '1.1', false );
  	wp_enqueue_script( 'jquery-validate');
  	wp_enqueue_style( 'datetimepicker', get_stylesheet_directory_uri() . '/style/lib/datetimepicker/jquery.datetimepicker.css' );
}
add_action( 'wp_enqueue_scripts', 'load_datetimepicker' );

//Khởi tạo function cho shortcode
function dathenform_shortcode() {

	echo '<div id="datlichhen" class="box box-info">
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form class="form-horizontal form-dathen" id="dathen-desktop">
	            <div class="box-body">
            		<div class="form-group">
	                    <div class="large-12 medium-12 col">
	                        <div class="box-header with-border">
					            <h3 class="box-title">Đặt lịch hẹn</h3>
					        </div>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="large-12 medium-12 col">
	                        <input type="text" class="form-control" name="hovaten" placeholder="Họ và Tên">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="large-12 medium-12 col">
	                        <input type="text" class="form-control" name="dienthoai" placeholder="Điện thoại">
	                    </div>
	                </div>
	                 <div class="form-group">
	                    <div class="large-12 medium-12 col">
                         	<input type="text" class="form-control" name="email" placeholder="Email">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="large-6 col" style="padding-right: 15px;">
	                        <input type="text" class="form-control ngay" name="ngay" placeholder="Ngày" />
	                    </div>
	                     <div class="large-6 col" style="padding-left: 15px;">
                         	<input type="text" class="form-control gio" placeholder="Giờ" name="gio"/>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="large-12 medium-12 col">
                         	<input type="text" class="form-control" name="content" placeholder="Ghi chú">
	                    </div>
	                </div>
	                <div class="form-group">
	                	<div class="img-container">
							<img src="'. get_stylesheet_directory_uri() . '/style/image/loading.gif' . '" alt="" class="loading">
	                	</div>
	                </div>
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer">
	                <button type="submit" class="btn btn-default" name="datlichhen">Đặt lịch hẹn</button>
	                <p class="message"></p>
	                <p class="message-success">Đã gởi lịch hẹn thành công.</p>
	            </div>
	            <!-- /.box-footer -->
	        </form>
	    </div>';
}
//Tạo shortcode tên là [test_shortcode] và sẽ thực thi code từ function create_shortcode
add_shortcode( 'dathenform_shortcode', 'dathenform_shortcode' );

//Khởi tạo function cho shortcode
function dathenform_mobile_shortcode() {

	echo '<div id="datlichhen" class="box box-info">
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form class="form-horizontal form-dathen-mobile" id="dathen-mobile">
	            <div class="box-body">
            		<div class="form-group">
	                    <div class="large-12 medium-12 col">
	                        <div class="box-header with-border">
					            <h3 class="box-title">Đặt lịch hẹn</h3>
					        </div>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="large-12 medium-12 col">
	                        <input type="text" class="form-control" name="hovaten" placeholder="Họ và Tên">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="large-12 medium-12 col">
	                        <input type="text" class="form-control" name="dienthoai" placeholder="Điện thoại">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="large-12 medium-12 col">
                         	<input type="text" class="form-control" name="email" placeholder="Email">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="large-6 col" style="padding-right: 15px;">
	                        <input type="text" class="form-control ngay" name="ngay" placeholder="Ngày" />
	                    </div>
	                     <div class="large-6 col" style="padding-left: 15px;">
                         	<input type="text" class="form-control gio" placeholder="Giờ" name="gio"/>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="large-12 medium-12 col">
                         	<input type="text" class="form-control" name="content" placeholder="Ghi chú">
	                    </div>
	                </div>
	                <div class="form-group">
	                	<div class="img-container">
	                    	<img src="'. get_stylesheet_directory_uri() . '/style/image/loading.gif' .'" alt="" class="loading">
                    	</div>
	                </div>
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer">
	                <button type="submit" class="btn btn-default" name="datlichhen">Đặt lịch hẹn</button>
	                <p class="message"></p>
	                <p class="message-success">Đã gởi lịch hẹn thành công.</p>
	            </div>
	            <!-- /.box-footer -->
	        </form>
	    </div>';
}
//Tạo shortcode tên là [test_shortcode] và sẽ thực thi code từ function create_shortcode
add_shortcode( 'dathenform_mobile_shortcode', 'dathenform_mobile_shortcode' );

function wpb_hook_javascript_footer() {
    ?>
        <script>
	      	// your javscript code goes
	      	jQuery(document).ready(function($){

	            $('.ngay').datetimepicker(
	            	{
	            		timepicker:false,
 						format:'m/d/Y'
	            	});

	            $('.gio').datetimepicker({
	             	datepicker:false,
  					format:'H:i'
	             });

	            $(".form-dathen").submit(function(e){
			        e.preventDefault();
			    });

	            $(".form-dathen").validate({
					rules: {
						hovaten: {
							required: true,
							normalizer: function(value) {
								return $.trim(value);
							},
							maxlength: 128
						},
						email: {
							required: true,
							email: true,
							maxlength: 128
						},
						sodienthoai: {
							required: true,
							normalizer: function(value) {
								return $.trim(value);
							},
							maxlength: 128
						},
						ngay: {
							required: true,
						},
						gio: {
							required: true
						}
					}
				});

				$(".form-dathen-mobile").submit(function(e){
			        e.preventDefault();
			    });

	            $(".form-dathen-mobile").validate({
					rules: {
						hovaten: {
							required: true,
							normalizer: function(value) {
								return $.trim(value);
							},
							maxlength: 128
						},
						email: {
							required: true,
							email: true,
							maxlength: 128
						},
						sodienthoai: {
							required: true,
							normalizer: function(value) {
								return $.trim(value);
							},
							maxlength: 128
						},
						ngay: {
							required: true,
						},
						gio: {
							required: true
						}
					}
				});
	        });
        </script>
    <?php
}
add_action('wp_footer', 'wpb_hook_javascript_footer');

/**
 * [popup_action_callback description]
 * @return [type] [description]
 */
function add_appointment() {
    global $redux_demo;
    $prefix = 'appointment_';

    $nonce = $_POST['security'];

    if ( ! wp_verify_nonce( $nonce, 'ajax_nonce' ) )
        die ( 'Busted!');

    if(isset($_POST['hovaten']) && isset($_POST['dienthoai']) && isset($_POST['email']))
    {
        if($_POST['hovaten'] == null || $_POST['dienthoai'] == null || $_POST['email'] == null)
        {
            echo 'Dữ liệu bạn nhập vào bị rỗng! Vui lòng nhập các trường họ và tên, email, số điện thoại.';
        }
        else{

            $hovaten = sanitize_text_field( $_POST['hovaten'] );
            $dienthoai = sanitize_text_field( $_POST['dienthoai'] );
            $email = sanitize_email( $_POST['email'] );
            $ngay = sanitize_text_field( $_POST['ngay'] );
            $gio = sanitize_text_field( $_POST['gio'] );
            $content = sanitize_text_field( $_POST['content'] );

            $d_ngay = strtotime($ngay);
            $d_gio = date("H:i", strtotime($gio));

            $post = array(
                    'post_name'      => $hovaten .' - '. $dienthoai . ' - ' . $email . ' - ' . date('Y-m-d H:i:s'),
                    'post_title'     => $hovaten .' - '. $dienthoai . ' - ' . $email . ' - ' . date('Y-m-d H:i:s'),
                    'post_status'    => 'pending',
                    'post_type'      => 'appointment',
                    'post_author'    => '2',
                    'post_content'	=> $content,
                    'post_date'      => date('Y-m-d H:i:s'),
                    'post_date_gmt'  => date('Y-m-d H:i:s'),
                    'comment_status' => 'closed'
                    );

            $post_id = wp_insert_post($post);

            if(isset($post_id))
            {
                add_post_meta($post_id, "{$prefix}status", 'un_read');
                add_post_meta($post_id, "{$prefix}fullname", $hovaten);
                add_post_meta($post_id, "{$prefix}phone", $dienthoai);
                add_post_meta($post_id, "{$prefix}email", $email);
                add_post_meta($post_id, "{$prefix}service", '');
                add_post_meta($post_id, "{$prefix}date", $d_ngay);
                add_post_meta($post_id, "{$prefix}time", $d_gio);

                $to = sanitize_text_field( trim('drhungclinic.cskh@gmail.com') );
                // $to = sanitize_text_field( trim('emtapseo@gmail.com') );
                $subject = sanitize_text_field(trim('[Đặt hẹn]' . ' ' .$hovaten .' - '. $dienthoai . ' - ' . $email));
                $message = 'Tên khách hàng : ' . $hovaten .' <br>';
                $message .= 'Email : ' . $email .' <br>';
                $message .= 'Số điện thoại: ' . $dienthoai . '<br>';
                $message .= 'Sử dụng dịch vụ: '. $content  . '<br>';
                $message .= 'Ngày: '. $ngay . '-' . $gio . '<br>';
                $message .= 'Gởi vào lúc: ' . date('Y-m-d H:i:s') . '<br>';
                // $message = sanitize_textarea_field($message);

                if(!empty($to) && is_email($to))
                {
                    if(!empty($email))
                        add_filter( 'wp_mail_content_type', 'set_html_content_type' );
					    $result = wp_mail( $to, $subject, $message );
					    remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
                }

                $_POST = array();
                unset($_POST);
                echo 1;
            }
            else{
                echo 'Có lỗi xảy ra. Vui lòng kiểm tra lại thông tin điền vào.';
            }
        }
    }
    else{
        echo 'Vui lòng nhập đầy đủ thông tin';
    }

    wp_die();
}

add_action( 'wp_ajax_add_appointment', 'add_appointment' );
add_action( 'wp_ajax_nopriv_add_appointment', 'add_appointment' );

// Register Script
function custom_scripts()
{
    wp_register_script( 'custom-script', get_stylesheet_directory_uri(). '/style/js/custom-script.js', false, false, true );
    $params = array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'ajax_nonce' => wp_create_nonce('ajax_nonce'),
	);
	wp_localize_script( 'custom-script', 'ajax_object', $params );
    wp_enqueue_script( 'custom-script' );

}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );

function set_html_content_type() {
	return 'text/html';
}