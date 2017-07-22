<?php
$json = array();
if (isset($_GET["user_id"])){
    $user_id = $_GET["user_id"];
    include_once '../app/db_functions.php';
    $db = new DB_Functions();
    $res = $db->getBoughtCams($user_id);
    while($row = mysql_fetch_array($res)){
		var_dump($row);
	}
	 
	
	}
?>