<?php
 
class DB_Functions {
 
    private $db;
 
    //put your code here
    // constructor
    function __construct() {
        include_once 'db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }
 
	public function getKey($id){
		$result = mysql_query("SELECT public_key from users where id='$id'");
		return $result;	
	}
	
	public function saveBuy($user_id,$webcam_id,$purchase_state ,$developer_payload,$purchase_signature,
	$order_id,$token,$item_type,$purchase_time,$sku){
		$result = mysql_query("INSERT INTO purchase_users_webcams 
		(user_id,webcam_id,purchase_state ,developer_payload,
		purchase_signature,order_id,token,item_type,purchase_time,sku,time) VALUES ('$user_id','$webcam_id','$purchase_state' ,'$developer_payload',
		'$purchase_signature','$order_id','$token','$item_type','$purchase_time','$sku',NOW())");
		if ($result) {
            $id = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM purchase_users_webcams WHERE id = $id") or die(mysql_error());
            if (mysql_num_rows($result) > 0) {
				$result = mysql_query("INSERT INTO users_webcams(webcam_id,user_id,purchase_id) VALUES ('$webcam_id','$user_id','$id')");
				$id = mysql_insert_id(); // last inserted id
				$result = mysql_query("SELECT * FROM users_webcams WHERE id = $id") or die(mysql_error());
                return $result;
            } else {
                return mysql_error();
            }
        } else {
            return mysql_error();
        }
	}

	public function getAllTables(){
		 $result = mysql_query('SHOW TABLES') or die('cannot show tables');
		 return $result;
	}
	
    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($id, $deviceId,$key,$regId,
	$userName,$userEmail,$deviceModel,$deviceAPI) {
        // insert user into database		
        $result = mysql_query("INSERT INTO users(id,device_id,public_key,reg_id,user_name,user_email,device_model,device_api, user_created_at,user_last_logged) VALUES('$id', '$deviceId','$key','$regId','$userName','$userEmail','$deviceModel','$deviceAPI', NOW(),NOW())");      // check for successful store
        if ($result) {
            // get user details
            $id = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM users WHERE id = $id") or die(mysql_error());
            // return user details
            if (mysql_num_rows($result) > 0) {
                return mysql_fetch_array($result);
            } else {
                return mysql_error();
            }
        } else {
            return mysql_error();
        }
    }
 
   public function getBoughtCams($id){
		$result = mysql_query("select webcam_id FROM users_webcams where user_id='$id'");
		return $result;	
   }
   
   public function increaseKey($key){
	    $result = mysql_query("update downloads set user_update=NOW(),  click=click+1 where package='$key'")
    	    or die(mysql_error());
	    return $result;
   }	

   public function webcamErrorReport($userId,$message){
       mysql_query("INSERT INTO webcams_error(user_id,message,date)   	VALUES('$userId','$message',NOW())")
        or die(mysql_error());
       return "1";
   }

   public function saveContactMe($name,$email,$telephone,$message){
       mysql_query("INSERT INTO contact(name, email, telephone, message, time) VALUES('$name','$email','$telephone',
       '$message',NOW())") or die(mysql_error());
       return "1";
   }

public function saveSuggestions($userId,$email,$message){
	mysql_query("SET CHARACTER SET utf8");   
    mysql_query("SET NAMES utf8_persian_ci");
   	mysql_query("INSERT INTO suggestions (user_id,email,message,date)VALUES('$userId','$email','$message',NOW())");
	return "1";
}

public function saveSubscriptions($userId,$webcamId){
   	mysql_query("INSERT INTO subscriptions (sub_date,webcam_id,user_id)   	VALUES(NOW(),'$webcamId','$userId')");
return "1";
   } 

   public function getAllWebCams($action){
   
    if($action == '2'){
		$result = mysql_query("select * FROM webcams WHERE is_stream='true'");
	}else{	
		$result = mysql_query("select * FROM webcams ");
	}
        return $result;	
   }	

   public function getUser($userId){
        $result = mysql_query("select * FROM users WHERE device_id='$userId'");
        return $result;
   }
    /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysql_query("select * FROM users");
        return $result;
    }
 
}
 
?>