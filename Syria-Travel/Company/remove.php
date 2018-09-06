<?php

session_start();
if(!isset($_SESSION['c_id'])){
    header("Location: /Auth/signup.php");
}
    // Database Connect
    include_once "../db_connect.php";
    
    if (isset($_POST['f_id'])){

        try{
            $query1="update reservation set r_status='canceled' where r_trip_id =" . $_POST['f_id'];
            $query2="update trip_info set t_status='canceled' where t_id=" . $_POST['f_id'];
            $result1= mysqli_query($conn,$query1);
            $result2= mysqli_query($conn,$query2);
            mysqli_free_result($result1);
            mysqli_free_result($result2);
            header("Location: canceled-trips.php");
        }catch (Exception $e){
            die("Error In Query");
        }
    }

    else{

        try{
            $query="delete from employee where e_id  =" . $_POST['e_id'];
            $result= mysqli_query($conn,$query);
            $query = "insert into event_history (`event_id`, `event_date`, `event_time`, `event_action`, `event_actor_id`) 
              VALUES (NULL, CURRENT_DATE(), CURRENT_TIME(), 'remove_employee', '" . $_SESSION['c_id'] . "')";
            $result= mysqli_query($conn,$query);

            mysqli_free_result($result);
            header("Location: manage-employees.php");
        }catch (Exception $e){
            die("Error In Query");
        }
    }

?>