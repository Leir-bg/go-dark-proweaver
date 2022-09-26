<?php

/**
 * Database functionalities located here
 * 
 */

class Go_Dark_Database_Functions{

    /**
     * Adding data to db
     */

     global $wpdb;
     $table_name = $wpdb->prefix . 'darkmode_presets';

     if($_POST){
        if(isset($_POST['type']) && $_POST['type'] == 'add'){
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';

            $sql = $wpdb->insert( 
                $table_name, 
                array( 
                    'id' => 1, 
                    'section' => $_POST['data'], 
                    'shade' => '#000', 
                ) 
            );

            $wpdb->query($sql);
        }
     }
}