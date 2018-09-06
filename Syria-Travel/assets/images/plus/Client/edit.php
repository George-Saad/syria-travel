<?php
session_start();
// Database Connect
include_once "../db_connect.php";
try{
    $client_id = $_SESSION['client_id'];
    $client_username = $_POST['client_username'];
    $client_email_phone = $_POST['client_email_phone'];
    $client_password = $_POST['client_password'];
    $hash = hash("sha256", $client_password);


    $query= "UPDATE clients SET client_username='" . $client_username . "', client_email_phone='" . $client_email_phone . "',
     client_password='" . $hash . "' WHERE client_id=" . $client_id ;
    $result= mysqli_query($conn,$query);
    header("Location: my-profile.php");
}catch (Exception $e){
    die("Error In Query");
}
?>