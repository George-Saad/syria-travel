<?php

session_start();
if(!isset($_SESSION['a_id'])) {
    $_SESSION['a_id'] = $row['client_id'];
    header("Location: ../Auth/signup.php");
}

    // Database Connect
    include_once "../db_connect.php";

    try{
        $query = "update clients set client_status = 'active' where client_id = " . $_POST['client_id'];
        $result = mysqli_query($conn,$query);
        mysqli_free_result($result);
        header("Location: blocked-clients.php");
    }catch (Exception $e){
        die("Error In Query");
    }

?>