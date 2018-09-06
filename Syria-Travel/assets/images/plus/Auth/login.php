<?php
session_start();
include_once "../db_connect.php";

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$hash = hash("sha256", $password);

$query_a = " select * from clients where isAdmin = 'yes' and client_username = '" . $username . "' and client_password = '" . $hash . "'" ;

$query_co = " select * from companies where  c_username = '" . $username . "' and c_password = '" . $hash . "'" ;


$query_e = " select * from employee where  e_username = '" . $username . "' and e_password = '" . $hash . "'" ;

$query_cl = " select * from clients where  client_username = '" . $username . "' and client_password = '" . $hash . "' and 
    isAdmin = 'no' and client_status = 'active'" ;

if(mysqli_query($conn,$query_a)->num_rows > 0){
    $result = mysqli_query($conn,$query_a) ;
    $row = mysqli_fetch_assoc($result);
    if(!isset($_SESSION['a_id'])) {
        $_SESSION['a_id'] = $row['client_id'];
    }
    mysqli_free_result($result);
    header("Location: /Admin/manage-companies.php");
}
elseif(mysqli_query($conn,$query_co)->num_rows > 0){
    $result = mysqli_query($conn,$query_co);
    $row = mysqli_fetch_assoc($result);
    if(!isset($_SESSION['c_id'])) {
        $_SESSION['c_id'] = $row['c_id'];
    }
    mysqli_free_result($result);
    header("Location: /Company/available-trips.php");
}
elseif(mysqli_query($conn,$query_e)->num_rows > 0){
    $result = mysqli_query($conn,$query_e);
    $row = mysqli_fetch_assoc($result);
    if(!isset($_SESSION['e_id'])) {
        $_SESSION['e_id'] = $row['e_id'];
    }
    $query = "insert into event_history (`event_id`, `event_date`, `event_time`, `event_action`, `event_actor_id`) 
              VALUES (NULL, CURRENT_DATE(), CURRENT_TIME(), 'e_login', '" . $_SESSION['e_id'] . "')";
    $result = mysqli_query($conn,$query);
    mysqli_free_result($result);
    header("Location: /Employee/holding-reservations.php");
}
elseif(mysqli_query($conn,$query_cl)->num_rows > 0){
    $result = mysqli_query($conn,$query_cl) ;
    $row = mysqli_fetch_assoc($result);
    if(!isset($_SESSION['client_id'])) {
        $_SESSION['client_id'] = $row['client_id'];
    }
    $query = "insert into event_history (`event_id`, `event_date`, `event_time`, `event_action`, `event_actor_id`) 
              VALUES (NULL, CURRENT_DATE(), CURRENT_TIME(), 'login', '" . $_SESSION['client_id'] . "')";
    $result = mysqli_query($conn,$query);
    mysqli_free_result($result);
    header("Location: /index.php");
}
else {
    header("Location: /Auth/client-login.php?failed=1");
}


?>