<?php

/**
 * Database functionalities located here
 * 
 */

/**
 * Adding data to db
 */

function insertToDB(){
    require_once(str_replace('\\', '/', dirname(__FILE__, 6)) . '/wp-systcon/wp-config.php');

    global $wpdb;
    $table_name = $wpdb->prefix . 'darkmode_presets';
    $section = "".$_POST['dataVal']."";

    $sql = "INSERT INTO $table_name ('id','sections','shade') values (0,$section,'#000')";
    $wpdb->query($sql);
}


$aResult = array();

if( !isset($_POST['func']) ) { $aResult['error'] = 'No function!'; }

if( !isset($aResult['error']) ) {

    switch($_POST['func']) {
        case 'insert':
            if( !isset($_POST['dataVal'])) {
                $aResult['error'] = 'Error in arguments!';
            }
            else {
                insertToDB();
                echo json_encode('gana');
            }
            break;

        default:
            $aResult['error'] = 'Not found function '.$_POST['func'].'!';
            break;
    }

}

echo json_encode($aResult);