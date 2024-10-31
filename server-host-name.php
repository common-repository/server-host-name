<?php
/*
Plugin Name: Server Host Name
Plugin URI: https://wordpress.org/plugins/server-host-name/
Description: Displays server hostname within Admin menu.
Author: Infusion IT
Version: 1.1.3
Author URI: https://www.infusionit.co.uk/
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) die;

function wsDisplayHostname($wp_admin_bar) {
	
	$wsHostname = gethostname();
	$wsLocalIP  = $_SERVER['SERVER_ADDR'];

	$args = array(
		'id'    => 'wsHostname',
		'title' => strtoupper($wsHostname) . ' (' . $wsLocalIP . ')',
		'meta' => [
      		'class' => 'wsMenu'
    	]
	);

	$wp_admin_bar->add_node( $args );
}

function wsDisplayHostnameCSS() {
    if( current_user_can( 'level_5' ) ){
        wp_register_style( 'wsDisplayHostnameCSS', plugin_dir_url( __FILE__ ) . 'server-host-name.css','','', 'screen' );
        wp_enqueue_style( 'wsDisplayHostnameCSS' );
    }
}

add_action( 'admin_bar_menu', 'wsDisplayHostname', 0 );
add_action( 'admin_enqueue_scripts', 'wsDisplayHostnameCSS' );

?>