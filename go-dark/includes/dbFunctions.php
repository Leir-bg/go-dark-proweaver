<?php
class dbFunctions{

    /** Create table if non-existent */
    global $wpdb;
    $tablename = 'darkmode_presets'; 

    public function on_activation(){
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $main_sql_create = "CREATE TABLE $tablename";    
        maybe_create_table( $wpdb->prefix . $tablename, $main_sql_create );       
    }

    public function on_uninstall(){
        $main_sql_delete = "DROP TABLE IF EXISTS" . $wpdb->prefix . $tablename;

        if(!function_exists('dbDelta')) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        }

        dbDelta($main_sql_delete);
    }
}