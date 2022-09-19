<?php
/**
 * Plugin Name: Go Dark Proweaver
 * Plugin URI: https://web4.proweaverlinks.com/MAINTENANCE/FORRESEARCH/
 * Description: Dark mode for Proweaver themes.
 * Version: 1.2
 * Author: PRD1113, PRD978, PRD1256
 */

//use go-dark\Class\init;

class goDark{

    public function __construct() {
        goDark::admin_init();
        goDark::acf_init();
    }

    public function admin_init(){
        // Hook into the admin menu
        add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
    }

    public function acf_init(){
        include_once( plugin_dir_path( __FILE__ ) . 'vendor/advanced-custom-fields-pro/acf.php' );
        add_filter( 'acf/settings/path', array( $this, 'update_acf_settings_path' ) );
        add_filter( 'acf/settings/dir', array( $this, 'update_acf_settings_dir' ) );

        $this->setup_options();
        add_action( 'admin_init', array( $this, 'add_acf_variables' ) );
    }
    
    public function add_acf_variables() {
        acf_form_head();
    }

    public function setup_options(){
        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_62cbe6a1db9eb',
                'title' => 'Go Dark Fields',
                'fields' => array(
                    array(
                        'key' => 'field_62cbe6b64e760',
                        'label' => 'Test Heading',
                        'name' => 'test_heading',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_62cbe6c04e761',
                        'label' => 'Test Text',
                        'name' => 'test_text',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'post',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
            ));
            
            endif;
    }

    public function plugin_settings_page_content() {
        do_action('acf/input/admin_head'); // Add ACF admin head hooks
        do_action('acf/input/admin_enqueue_scripts'); // Add ACF scripts
    
        $options = array(
            'id' => 'acf-form',
            'post_id' => 'options',
            'new_post' => false,
            'field_groups' => array( 'group_62cbe6a1db9eb' ),
            'return' => admin_url('admin.php?page=go-dark'),
            'submit_value' => 'Update',
        );
        acf_form( $options );
    }

    public function update_acf_settings_path( $path ) {
        $path = plugin_dir_path( __FILE__ ) . 'vendor/advanced-custom-fields-pro/';
        return $path;
    }
    
    public function update_acf_settings_dir( $dir ) {
        $dir = plugin_dir_url( __FILE__ ) . 'vendor/advanced-custom-fields-pro/';
        return $dir;
    }

    public function create_plugin_settings_page() {
        // Add the menu item and page
        $page_title = 'Go Dark settings';
        $menu_title = 'Go Dark';
        $capability = 'manage_options';
        $slug = 'go-dark';
        $callback = array( $this, 'plugin_settings_page_content' );
        $icon = 'dashicons-beer';
        $position = 100;
    
        add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
    }

    // public function plugin_settings_page_content() {
    // }
}

new goDark();

/** Hook Dark Mode */

    add_action('wp_enqueue_scripts', 'load_dm');

    function load_dm(){
        wp_register_style('darkmode_style', plugin_dir_url( __FILE__ ) . 'assets/css/darkstyle.min.css');
        wp_enqueue_style('darkmode_style');
        wp_enqueue_script('darkmode_script', plugin_dir_url( __FILE__ ) . 'scripts/darkmode.min.js', array('jquery'));
    }
?>