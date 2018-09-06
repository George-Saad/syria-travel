<?php
session_start();
include_once "../db_connect.php";

$code = $_GET['code'];

$query = "SELECT * FROM `clients` where client_status = '" . $code . "' " ;
$result= mysqli_query($conn,$query);

if ($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    $query = "update clients set client_status = 'active' where client_id = " . $row['client_id'];
    $result= mysqli_query($conn,$query);

    $query = "insert into event_history (`event_id`, `event_date`, `event_time`, `event_action`, `event_actor_id`) 
              VALUES (NULL, CURRENT_DATE(), CURRENT_TIME(), 'signup', '" . $row['client_id'] . "')";
    $result = mysqli_query($conn,$query);
    mysqli_free_result($result);

    header("Location: /Auth/client-login.php?failed=3");
}

else{
    header("Location: /Auth/client-login.php?failed=2");
}

?>

