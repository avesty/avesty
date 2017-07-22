<?php
include_once '../app/db_functions.php';
if (isset($_GET["key"])){
    $key = $_GET['key'];
    $direct = $_GET['direct'];
    if($key == "com.metao.webcams" && $direct == true){
        header('Location: /process/redirect.php?key=com.metao.webcams');
        exit();
    }else{

    }
    $db = new DB_Functions();
    $res = $db->storeUser($key);
}
?>