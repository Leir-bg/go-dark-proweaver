<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://web4.proweaverlinks.com/MAINTENANCE/FORRESEARCH/
 * @since      1.0.0
 *
 * @package    Go_Dark
 * @subpackage Go_Dark/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Go_Dark
 * @subpackage Go_Dark/includes
 * @author     PRD1113, PRD978, PRD1256 <gabrielcorpuz0914@gmail.com, ejtsuson@gmail.com, jeb.proweaver@gmail.com>
 */
class Go_Dark_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		global $wpdb;
	
		$table_name = $wpdb->prefix . 'darkmode_presets';
		$sql = "DROP TABLE IF EXISTS $table_name";
	
		if(!function_exists('dbDelta')) {
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		}
	
		$wpdb->query($sql);
	
		delete_option('dark_mode_version');
	}

}
