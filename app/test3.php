<?php
    
    $apiKey = "AIzaSyBpDGJRG5Q3oB1dkxDbjpgeYXSlKKfDYpA";
    
    $registrationIDs = array( "e3O6L6DMq4U:APA91bF88is9zjCH5tgSjZ-_8kkoNmpNwsuue5OqMSOKzRjAaqJpRJhLsL19HScr2FOdGeZLLEE1CHNjSOAYDC47nOa8_s48AQ4kQqJYSD1qFcURzbif_ooHcg55svpJ3jeCIJ217mRH");

    // Message to be sent
    $message = "http://tehran2.vvs.ir/";

    // Set POST variables
    $url = 'https://android.googleapis.com/gcm/send';

    $fields = array(
	'to' => '/topics/update',
        'data' => array( "message" => $message ),
    );
    $headers = array(
        'Authorization: key=' . $apiKey,
        'Content-Type: application/json'
    );

    // Open connection
    $ch = curl_init();

    // Set the URL, number of POST vars, POST data
    curl_setopt( $ch, CURLOPT_URL, $url);
    curl_setopt( $ch, CURLOPT_POST, true);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields));

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $fields));

    // Execute post
    $result = curl_exec($ch);

    // Close connection
    curl_close($ch);
    echo $result;
?>