<?php

session_start();
if(!isset($_SESSION['c_id'])){
    header("Location: /Auth/signup.php");
}
// Database Connect
include_once "../db_connect.php";
try{
    $e_username= $_POST['e_username'];
    $e_password= $_POST['e_password'];
    $hash = hash("sha256", $e_password);
    $e_id= $_POST['e_id'];

    $query= "UPDATE employee SET e_username='" . $e_username . "', e_password='" . $hash . "' WHERE e_id=" . $e_id ;
    $result= mysqli_query($conn,$query);
    header("Location: manage-employees.php");
}catch (Exception $e){
    die("Error In Query");
}
?>