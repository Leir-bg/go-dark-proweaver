<?php

/**
 * Database functionalities located here
 * 
 */

/**
 * Adding data to db
 */

require_once(str_replace('\\', '/', dirname(__FILE__, 6)) . '/wp-systcon/wp-load.php');

function insertToDB(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'darkmode_presets';
    $section = "".$_POST['section']."";
    $shade = "".$_POST['shade']."";

    $wpdb->insert($table_name, array('sections'=>$section, 'shade'=>$shade));
}


$aResult = array();

if( !isset($_POST['func']) ) { $aResult['error'] = 'No function!'; }

if( !isset($aResult['error']) ) {

    switch($_POST['func']) {
        case 'insert':
            if( !isset($_POST['section']) || !isset($_POST['shade'])) {
                $aResult['error'] = 'Error in arguments!';
            }
            else {
                insertToDB();
            }
            break;

        default:
            $aResult['error'] = 'Not found function '.$_POST['func'].'!';
            break;
    }

}