<?php

session_start();
if(!isset($_SESSION['c_id'])){
    header("Location: /Auth/signup.php");
}
    // Database Connect
    include_once "../db_connect.php";
        

    if ($_POST['value']==1){
        try{
            $f_id =rand();
            $f_from= $_POST['f_from'];  $f_departure_date= $_POST['f_departure_date'];  $f_departure_time= $_POST['f_departure_time'];
            $f_to= $_POST['f_to'];   $f_arrival_time= $_POST['f_arrival_time'];
            $f_econ_price= $_POST['f_econ_price'];  $f_first_price= $_POST['f_first_price'];  $f_child_price= $_POST['f_child_price'];
            $f_econ_seats= $_POST['f_econ_seats'];  $f_first_seats= $_POST['f_first_seats'];  $f_seats= $f_econ_seats + $f_first_seats;
            $f_total_weight_value= $_POST['f_total_weight_value'];  $f_extra_weight_price= $_POST['f_extra_weight_price'];
            $f_status= $_POST['f_status'];   $f_company_id= $_SESSION['c_id'];   $f_round_sold= $_POST['f_round_sold'];
            $dep_time = new DateTime($f_departure_time);    $arr_time = new DateTime($f_arrival_time);
            $dteDiff = $dep_time->diff($arr_time);  $f_duration = $dteDiff->format("%H:%I:%S");

            $query="INSERT INTO `trip_info` VALUES
            ('" . $f_id .  "', '" . $f_from .  "','" . $f_to . "', '" . $f_departure_date . "', '" . $f_departure_time . "' ,
            '" . $f_arrival_time . "', '" . $f_duration . "', '" . $f_econ_seats . "', '" . $f_first_seats . " ', '" . $f_seats . "', '" . $f_econ_price . "',
            '" . $f_first_price . "', '" . $f_child_price . "', '" . $f_round_sold . "', '" . $f_status . "','" . $f_total_weight_value . "', 
            '" . $f_extra_weight_price . "' , '" . $f_company_id . "')";

            $result= mysqli_query($conn,$query);

            $query = "insert into event_history (`event_id`, `event_date`, `event_time`, `event_action`, `event_actor_id`) 
              VALUES (NULL, CURRENT_DATE(), CURRENT_TIME(), ' add_trip ', '" . $_SESSION['c_id'] . "')";
            $result= mysqli_query($conn,$query);
            
            header("Location: $f_status-trips.php");

        }catch (Exception $e){
            echo $e;
        }
    }

    else{
        $e_username= $_POST['e_username'];
        $e_password= $_POST['e_password'];
        $hash = hash("sha256", $e_password);
        $e_company_id= $_SESSION['c_id'];

        $query= "INSERT INTO `employee` VALUES (null, '" . $e_username ."', '" . $hash . "', '" . $e_company_id . "')";
        $result= mysqli_query($conn,$query);

        $query = "insert into event_history (`event_id`, `event_date`, `event_time`, `event_action`, `event_actor_id`) 
              VALUES (NULL, CURRENT_DATE(), CURRENT_TIME(), 'add_employee', '" . $_SESSION['c_id'] . "')";
        $result= mysqli_query($conn,$query);


        header("Location: manage-employees.php");

    }

?>