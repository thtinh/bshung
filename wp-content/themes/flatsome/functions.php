<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';

/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */
require_once dirname( __FILE__ ) . '/inc/admin/options/service/options-service.php';
require_once dirname( __FILE__ ) . '/inc/admin/options/technology/options-technology.php';
require_once dirname( __FILE__ ) . '/inc/structure/structure-service.php';
require_once dirname( __FILE__ ) . '/inc/structure/structure-technology.php';