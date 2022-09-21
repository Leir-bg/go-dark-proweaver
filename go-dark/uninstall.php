<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://web4.proweaverlinks.com/MAINTENANCE/FORRESEARCH/
 * @since      1.0.0
 *
 * @package    Go_Dark
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// function uninstall_go_dark(){
// 	global $wpdb;
// 	global $version;

// 	$table_name = $wpdb->prefix . 'darkmode_presets';
// 	$sql = "DROP TABLE IF EXISTS $table_name";

// 	if(!function_exists('dbDelta')) {
// 		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
// 	}

// 	$wpdb->query($sql);

// 	delete_option('dark_mode_version');
// }
// register_uninstall_hook(__FILE__, 'uninstall_go_dark');