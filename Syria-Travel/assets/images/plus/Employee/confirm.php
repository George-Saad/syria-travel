<?php

session_start();

// Database Connect
include_once "../db_connect.php";

try{
    $r_id= $_GET['r_id'];
    $query= "UPDATE reservations SET r_status = 'confirmed',r_employee_id = " . $_SESSION['e_id'] . " WHERE r_id=" . $r_id ;
    $result= mysqli_query($conn,$query);

    $query = "select * from reservations where r_id=" . $r_id ;
    $result= mysqli_query($conn,$query);
    $row= mysqli_fetch_assoc($result);
    $f_id = $row['r_trip_id'];
    $r_seats_num = $row['r_seats_num'];
    $r_type = $row['r_type'];
    $r_client_id = $row['r_client_id'];
    $c_id = $row['r_company_id'];
    $passenger_name = $row['r_client_fname'] . ' ' . $row['r_client_lname'];

    if($r_type=='t_econ_price')
        $query = "UPDATE trip_info SET t_econ_seats = t_econ_seats - " . $r_seats_num . " where t_id= " . $f_id ;
    else
        $query = "UPDATE trip_info SET t_first_seats = t_first_seats - " . $r_seats_num . " where t_id= " . $f_id ;

    $result= mysqli_query($conn,$query);

    $query = "INSERT INTO `exchanging_message` (`m_id`, `m_date`, `m_time`, `m_company_id`, `m_employee_id`, `m_client_id`, `m_details`)
      VALUES (NULL, CURRENT_DATE (), CURRENT_TIME (), ". $c_id . ", " . $_SESSION['e_id'] . " , " . $r_client_id . ", 'accepted'); ";
    $result= mysqli_query($conn,$query);

    $event_details = 'your employee confirmed resevation to passenger  ' . $passenger_name .  ' on trip   ' . $f_id;
    $query = "insert into event_history (`event_id`, `event_date`, `event_time`, `event_action`, `event_details`, `event_actor_id`) 
              VALUES (NULL, CURRENT_DATE(), CURRENT_TIME(), 'confirm_reservation', '" . $event_details . "', '" . $_SESSION['e_id'] . "')";
    $result = mysqli_query($conn,$query);
    
	$m_details="confirmed";
  $date=date("Y-m-d h:i:s");
  $url='https://fcm.googleapis.com/fcm/send';
  $fcmdata="{
    \"to\":\"/topics/room\",
    \"data\":{
      \"message\":\"".$m_details."\",
      \"client_id\":\"".$r_client_id."\",
      \"e_id\":\"".$_SESSION['e_id']."\",
      \"company_id\":\"".$c_id."\",
      \"messageType\":\"confirm\"
    }
    }";
  define("GOOGLE_API_KEY","AIzaSyBu33kWnxwL9CpSvbm_ZmNnQQfV4MyGQKw");
  $headers=array(
    'Authorization: key=' .GOOGLE_API_KEY,
    'Content-Type: application/json'
  ); 
    $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST,true);
  curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$fcmdata);
          curl_setopt($ch, CURLOPT_SSLVERSION, 6);
    $result = curl_exec($ch);
    
    curl_close($ch);
	
	
    header("Location: holding-reservations.php");
}catch (Exception $e){
    die("Error In Query");
}
?>