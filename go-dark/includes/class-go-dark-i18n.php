<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       
 * @since      1.0.0
 *
 * @package    Go_Dark
 * @subpackage Go_Dark/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Go_Dark
 * @subpackage Go_Dark/includes
 * @author     PRD1113, PRD978, PRD1256 <gabrielcorpuz0914@gmail.com, ejtsuson@gmail.com, jeb.proweaver@gmail.com>
 */
class Go_Dark_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'go-dark',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
