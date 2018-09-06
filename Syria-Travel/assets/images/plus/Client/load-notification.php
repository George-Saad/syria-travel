<?php
session_start();
// Database Connect
include "../db_connect.php";
$query= "SELECT * FROM `exchanging_message` where m_client_id = " . $_SESSION['client_id'] . " and m_is_read = 'no'";
$result= mysqli_query($conn,$query);
if($result->num_rows > 0){
    echo $result->num_rows;
}
?>