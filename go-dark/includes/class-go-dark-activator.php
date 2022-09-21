<?php

/**
 * Fired during plugin activation
 *
 * @link       https://web4.proweaverlinks.com/MAINTENANCE/FORRESEARCH/
 * @since      1.0.0
 *
 * @package    Go_Dark
 * @subpackage Go_Dark/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Go_Dark
 * @subpackage Go_Dark/includes
 * @author     PRD1113, PRD978, PRD1256 <gabrielcorpuz0914@gmail.com, ejtsuson@gmail.com, jeb.proweaver@gmail.com>
 */
class Go_Dark_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
		global $dark_mode_version;

		$table_name = $wpdb->prefix . 'darkmode_presets';
		
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			sections text NOT NULL,
			shade text NOT NULL, 
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		maybe_create_table($table_name, $sql );  

		add_option( 'dark_mode_version', $dark_mode_version );
	}

}