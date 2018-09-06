<?php

session_start();

// Database Connect
include_once "../db_connect.php";

try{
    $r_id= $_GET['r_id'];
    $query = "UPDATE reservations SET r_cancel_request = 'yes' WHERE r_id=" . $r_id ;
    $result= mysqli_query($conn,$query);
    mysqli_free_result($result);
    header("Location: my-reservations-c.php");
}catch (Exception $e){
    die("Error In Query");
}
?>