<?php
/**
 * Plugin Name: Go Dark Proweaver
 * Plugin URI: https://web4.proweaverlinks.com/MAINTENANCE/FORRESEARCH/
 * Description: Dark mode for Proweaver themes.
 * Version: 1.0
 * Author: PRD1113, PRD978
 * Author URI: https://web4.proweaverlinks.com/MAINTENANCE/FORRESEARCH/
 */
add_action('admin_menu', 'test_plugin_setup_menu');

function test_plugin_setup_menu(){
    add_menu_page( 'Go Dark', 'Go Dark', 'manage_options', 'go-dark', 'test_init');
}

function test_init(){
    echo "<h1>GO DARK PROWEAVER!</h1>";
}

/** Hook Dark Mode */

add_action('wp_enqueue_scripts', 'load_dm');

function load_dm(){
    wp_register_style('darkmode_style', plugin_dir_url( __FILE__ ) . 'assets/css/darkstyle.min.css');
    wp_enqueue_style('darkmode_style');
    wp_enqueue_script('darkmode_script', plugin_dir_url( __FILE__ ) . 'scripts/darkmode.min.js', array('jquery'));
}
?>