<?php

/**
 * Database functionalities located here
 * 
 */

 /**
  * Require wp-load for $wpdb prefixes.
  * 
  * Fallback function below incase of unupdated website security.
  */

$req_path = str_replace('\\', '/', dirname(__FILE__, 6));

if(is_dir(dirname(__FILE__, 6))){
    require_once($req_path . '/wp-systcon/wp-load.php');
}else{
    require_once($req_path . '/wp-load.php');
}


$section = "".$_POST['section']."";
$shade = "".$_POST['shade']."";

/**
 * Adding data to db
 */

function insertData(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'darkmode_presets';
    $section = "".$_POST['section']."";
    $shade = "".$_POST['shade']."";

    $wpdb->insert($table_name, array('sections'=>$section, 'shade'=>$shade));
}

/**
 * Retrieve data from db
 */

function retrieveData(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'darkmode_presets';
    
    $sql = "SELECT * FROM $table_name";
    $results = $wpdb->get_results($sql);

    $table_data = [];

    foreach ($results as $key => $result) {
        $table_data['id'][$key] = $result->id;
        $table_data['section'][$key] = $result->sections;
        $table_data['shade'][$key] = $result->shade;
    }

    echo json_encode($table_data);
}

/**
 * Deleting of table row
 */

function deleteData(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'darkmode_presets';
    $id = "".$_POST['id']."";

    $wpdb->delete($table_name, array('id'=>$id));
}

/** 
 * Code block below manages data passing
 * from JS to this file and vice versa
 */

$aResult = [];

if( !isset($_POST['func']) ) { $aResult['error'] = 'No function!'; }

if( !isset($aResult['error']) ) {

    switch($_POST['func']) {
        case 'insert':
            if( !isset($_POST['section']) || !isset($_POST['shade'])) {
                $aResult['error'] = 'Error in arguments!';
            }
            else {
                insertData();
            }
            break;

        case 'retrieve':
            retrieveData();

            break;

        case 'delete':
            deleteData();

            break;

        default:
            $aResult['error'] = 'Not found function '.$_POST['func'].'!';
            break;
    }
}