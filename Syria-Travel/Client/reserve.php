<?php
session_start();

include_once "../db_connect.php";
try{

    $r_flight_id = $_POST['r_flight_id'];
    $r_company_id = $_POST['r_company_id'];
    $r_client_fname = $_POST['r_client_fname'];
    $r_client_lname = $_POST['r_client_lname'];
    $r_client_country = $_POST['r_client_country'];
    $r_client_city = $_POST['r_client_city'];
    $r_client_national_number = $_POST['r_client_national_number'];
    $r_client_email_phone = $_POST['r_client_email_phone'];
    $r_adult_num = (int)$_POST['r_adult_num'];
    $r_children_num = (int)$_POST['r_children_num'];
    $r_seats_num = $r_adult_num + $r_children_num ;
    $r_extra_weight_value = (int)$_POST['r_extra_weight_value'];
    $r_type = $_POST['r_type'];
    $r_card_number = '0000000000000000';
    $r_expire_date = '2020-10-10';
    $r_card_svv = 000;

    if($_POST['ticket_type'] == 'r'){

        $query = "INSERT INTO `reservations` (`r_id`, `r_trip_id`, `r_company_id`, `r_client_id`, `r_employee_id`, `r_client_fname`, `r_client_lname`, 
                `r_client_national_number`, `r_client_country`, `r_client_city`, `r_client_email_phone`, `r_date`, `r_time`, `r_seats_num`,
                `r_children_num`, `r_extra_weight_value`, `r_type`, `r_status`, `r_cancel_request`, `r_card_number`, `r_expire_date`, `r_card_svv`, `r_round_trip`)
                VALUES (NULL, '" . $r_flight_id . "', $r_company_id, '" . $_SESSION['client_id'] . "', NULL, '" . $r_client_fname . "', '" . $r_client_lname . "',
                '" . $r_client_national_number . "', '" . $r_client_country . "', '" . $r_client_city . "','" . $r_client_email_phone . "',
                CURRENT_DATE(), CURRENT_TIME(), '" . $r_seats_num . "',
                '" . $r_children_num . "', '" . $r_extra_weight_value . "', '" . $r_type . "', 'hold', NULL,
                '" . $r_card_number . "', '" . $r_expire_date . "', '" . $r_card_svv . "', 'departure')";
        $result= mysqli_query($conn,$query);

        $r_flight_id = $_POST['r_flight_id2'];
        $query = "INSERT INTO `reservations` (`r_id`, `r_trip_id`, `r_company_id`, `r_client_id`, `r_employee_id`, `r_client_fname`, `r_client_lname`, 
                `r_client_national_number`, `r_client_country`, `r_client_city`, `r_client_email_phone`, `r_date`, `r_time`, `r_seats_num`,
                `r_children_num`, `r_extra_weight_value`, `r_type`, `r_status`, `r_cancel_request`, `r_card_number`, `r_expire_date`, `r_card_svv`, `r_round_trip`)
                VALUES (NULL, '" . $r_flight_id . "', $r_company_id, '" . $_SESSION['client_id'] . "', NULL, '" . $r_client_fname . "', '" . $r_client_lname . "',
                '" . $r_client_national_number . "', '" . $r_client_country . "', '" . $r_client_city . "','" . $r_client_email_phone . "',
                CURRENT_DATE(), CURRENT_TIME(), '" . $r_seats_num . "',
                '" . $r_children_num . "', '" . $r_extra_weight_value . "', '" . $r_type . "', 'hold', NULL,
                '" . $r_card_number . "', '" . $r_expire_date . "', '" . $r_card_svv . "', 'return')";
        $result= mysqli_query($conn,$query);
    }

    else{
        $query = "INSERT INTO `reservations` (`r_id`, `r_trip_id`, `r_company_id`, `r_client_id`, `r_employee_id`, `r_client_fname`, `r_client_lname`, 
                `r_client_national_number`, `r_client_country`, `r_client_city`, `r_client_email_phone`, `r_date`, `r_time`, `r_seats_num`,
                `r_children_num`, `r_extra_weight_value`, `r_type`, `r_status`, `r_cancel_request`, `r_card_number`, `r_expire_date`, `r_card_svv`)
                VALUES (NULL, '" . $r_flight_id . "', $r_company_id, '" . $_SESSION['client_id'] . "', NULL, '" . $r_client_fname . "', '" . $r_client_lname . "',
                '" . $r_client_national_number . "', '" . $r_client_country . "', '" . $r_client_city . "','" . $r_client_email_phone . "',
                CURRENT_DATE(), CURRENT_TIME(), '" . $r_seats_num . "',
                '" . $r_children_num . "', '" . $r_extra_weight_value . "', '" . $r_type . "', 'hold', NULL,
                '" . $r_card_number . "', '" . $r_expire_date . "', '" . $r_card_svv . "')";
        $result= mysqli_query($conn,$query);
    }

    header("Location: my-reservations.php");
}catch (Exception $e){
    die("Error In Query");
}
?>