<?php
/**
Plugin Name: imevent-common
Plugin URI: https://themeforest.net/user/ovatheme/portfolio
Description: A plugin to create custom post type, metabox, paypal, shortcode...
Version:  3.2.2
Author: Ovatheme
Author URI: https://themeforest.net/user/ovatheme
License:  GPL2
*/


load_plugin_textdomain( 'imevent', false, basename( dirname( __FILE__ ) ) .'/languages' ); 

include dirname( __FILE__ ) . '/custom-post-type/post-type.php';

//  include plugin.php to use is_plugin_active()
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if ( is_plugin_active( 'cmb2/init.php' ) || defined( 'CMB2_LOADED' ) ) {
	include dirname( __FILE__ ) . '/cmb2_metabox/cus_metabox.php';
}else{
	include dirname( __FILE__ ) . '/custom-metaboxes/metabox-functions.php';
}


include dirname( __FILE__ ) . '/shortcode/shortcode.php';
include dirname( __FILE__ ) . '/shortcode/vc-shortcode.php';

if( is_admin() ){
	include dirname( __FILE__ ) . '/paypal/payment_list.php';
	include dirname( __FILE__ ) . '/paypal/pagination.class.php';	
}


return true;