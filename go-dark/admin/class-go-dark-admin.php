<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://web4.proweaverlinks.com/MAINTENANCE/FORRESEARCH/
 * @since      1.0.0
 *
 * @package    Go_Dark
 * @subpackage Go_Dark/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Go_Dark
 * @subpackage Go_Dark/admin
 * @author     PRD1113, PRD978, PRD1256 <gabrielcorpuz0914@gmail.com, ejtsuson@gmail.com, jeb.proweaver@gmail.com>
 */

class Go_Dark_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Go_Dark_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Go_Dark_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/go-dark-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Go_Dark_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Go_Dark_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/go-dark-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Functions below creates the option tab and
	 * content defined in admin_dashboard class
	 * from partials/go-dark-admin-display.php 
	 */

	public function get_admin_view(){
        include 'partials/go-dark-admin-display.php';
    }

    public function create_plugin_settings_page() {
        // Add the menu item and page
        $page_title = 'Go Dark settings';
        $menu_title = 'Go Dark';
        $capability = 'manage_options';
        $slug = 'go-dark';
        $callback = array( $this, 'get_admin_view' );
        $icon = 'dashicons-beer';
        $position = 100;
    
        add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
    }

}
