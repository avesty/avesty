<?php
 
// response json
$json = array();
 
/**
 * Registering a user device
 * Store reg id in users table
 */
    $id = "57fb01f3934242f7a63cbf70dd0fd416";	
    $regId = "eA_9dgjTmqM:APA91bFWEInaOEUNrWPvy6WrWqX3cNQ5g-F4m3J94Az2hGd3lUOIKzxDSRnhk-z4anBApPOnASXec6QzPY2G9xbZL7mcgRXcaTh2Bmif8xQynQxS8ePcl0XthdmGaXVlOct5DRKGvakN"; 
    $name = "mehrdad";
    $email = "mehrdad@gmail.com";
    $deviceId = "355136056808309";   	   
    $deviceModel = "LGE Nexus 4";	
    $deviceAPI = "5.1.1";			
    // Store user details in db
    include_once 'db_functions.php';
    include_once 'GCM.php';
 
    $db = new DB_Functions();
 
    $res = $db->storeUser($id, $deviceId, $regId,
	$name,$email,$deviceModel,$deviceAPI,
	$createdTime,$lastLogged);
 
    echo $res;
?>