<?php

session_start();
if(!isset($_SESSION['a_id'])) {
    $_SESSION['a_id'] = $row['client_id'];
    header("Location: ../Auth/signup.php");
}

    // Database Connect
    include_once "../db_connect.php";

    try{
        $query1="delete from flight_info where f_company_id=" . $_POST['c_id'];
        $query2="delete from companies where c_id=" . $_POST['c_id'];
        $result1= mysqli_query($conn,$query1);
        $result2= mysqli_query($conn,$query2);
        mysqli_free_result($result1);
        mysqli_free_result($result2);
        header("Location: manage-companies.php");
    }catch (Exception $e){
        die("Error In Query");
    }

?>