<?php
/**
 * Plugin Name: Go Dark Proweaver
 * Plugin URI: https://web4.proweaverlinks.com/MAINTENANCE/FORRESEARCH/
 * Description: Dark mode for Proweaver themes.
 * Version: 1.2
 * Author: PRD1113, PRD978, PRD1256
 */

include 'includes/loadAssets.php';
include 'includes/adminDashboard.php';

class goDark extends loadAssets{

    public function __construct(){
        goDark::admin_init();
        loadAssets::construct();
    }

    public function admin_init(){
        add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
    }

    public function create_plugin_settings_page() {
        // Add the menu item and page
        $page_title = 'Go Dark settings';
        $menu_title = 'Go Dark';
        $capability = 'manage_options';
        $slug = 'go-dark';
        $callback = array( $this, 'admin_dashboard_content' );
        $icon = 'dashicons-beer';
        $position = 100;
    
        add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
    }

    public function admin_dashboard_content(){
        adminDashboard::construct();
    }
}

new goDark();