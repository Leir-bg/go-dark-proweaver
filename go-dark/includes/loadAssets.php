<?php
class loadAssets{

    public function construct(){
        /** Hook Dark Mode */

        add_action('wp_enqueue_scripts', 'load_dm');

        function load_dm(){
            wp_register_style('darkmode_style', plugin_dir_url( __FILE__ ) . '../assets/css/darkstyle.min.css');
            wp_enqueue_style('darkmode_style');
            wp_enqueue_script('darkmode_script', plugin_dir_url( __FILE__ ) . '../scripts/darkmode.min.js', array('jquery'));
        }
    }
}

new loadAssets();