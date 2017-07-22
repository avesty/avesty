<?php
if (isset($_GET["reg_id"]) && isset($_GET["message"])) {
    $regId = $_GET["reg_id"];
    $message = $_GET["message"];
     
    include_once 'GCM.php';
     
    $gcm = new GCM();
 
    $registatoin_ids = array($regId);
    $message = array("message" => $message);
 
    $result = $gcm->send_notification($registatoin_ids, $message);
 
    echo $result;
}
?>