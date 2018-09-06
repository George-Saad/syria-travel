<?php

session_start();
if(!isset($_SESSION['c_id'])){
    header("Location: /Auth/signup.php");
}
// Database Connect
include_once "../db_connect.php";
try{

    $f_from= $_POST['f_from'];  $f_departure_date= $_POST['f_departure_date'];  $f_departure_time= $_POST['f_departure_time'];
    $f_to= $_POST['f_to'];  $f_arrival_time= $_POST['f_arrival_time'];
    $f_econ_price= $_POST['f_econ_price'];      $f_first_price= $_POST['f_first_price'];
    $f_child_price= $_POST['f_child_price'];    $f_round_sold= $_POST['f_round_sold'];
    $f_econ_seats= $_POST['f_econ_seats'];  $f_first_seats= $_POST['f_first_seats'];  $f_seats= $f_econ_seats + $f_first_seats;
    $f_total_weight_value= $_POST['f_total_weight_value'];  $f_extra_weight_price= $_POST['f_extra_weight_price'];
    $f_status= $_POST['f_status']; $f_id= $_POST['f_id'];
    $dep_time = new DateTime($f_departure_time);    $arr_time = new DateTime($f_arrival_time);
    $dteDiff = $arr_time->diff($dep_time);  $f_duration = $dteDiff->format("%H:%I:%S");


    $query = "UPDATE trip_info SET t_from='" . $f_from . "', t_to='" . $f_to . "', t_departure_date='" . $f_departure_date . "', t_departure_time='"
        . $f_departure_time . "', t_arrival_time='" . $f_arrival_time . "', t_duration='" . $f_duration ."' ,
        t_econ_seats='" . $f_econ_seats . "', t_first_seats='" . $f_first_seats . "', t_seats='" . $f_seats ."' , t_econ_price='" . $f_econ_price . "' ,
        t_first_price='" . $f_first_price . "', t_child_price='" . $f_child_price . "',  t_round_sold='" . $f_round_sold . "', t_status='" . $f_status ."' , 
        t_total_weight_value='" . $f_total_weight_value . "' , t_extra_weight_price='" . $f_extra_weight_price ."'
        WHERE t_id=" . $f_id ;
    
    $result= mysqli_query($conn,$query);

    $query = " SELECT DISTINCT r_client_id FROM `reservations` WHERE r_trip_id= " . $f_id;
    $result= mysqli_query($conn,$query);

    while ($row= mysqli_fetch_assoc($result)){

        $query =  "INSERT INTO `exchanging_message` (`m_id`, `m_date`, `m_time`, `m_company_id`, `m_client_id`, `m_details`)
                  VALUES (NULL, CURRENT_DATE (), CURRENT_TIME (), ". $_SESSION['c_id'] . ", " . $row['r_client_id'] . ", 'The trip has been updated')";

            mysqli_query($conn,$query);

    }

    header("Location: $f_status-trips.php");
}catch (Exception $e){
    die("Error In Query");
}
?>