<?php

session_start();
include_once "../db_connect.php";

if(isset($_SESSION['e_id'])) {
    $query = "insert into event_history (`event_id`, `event_date`, `event_time`, `event_action`, `event_actor_id`) 
              VALUES (NULL, CURRENT_DATE(), CURRENT_TIME(), 'e_logout', '" . $_SESSION['e_id'] . "')";
}
else
{
    $query = "insert into event_history (`event_id`, `event_date`, `event_time`, `event_action`, `event_actor_id`) 
              VALUES (NULL, CURRENT_DATE(), CURRENT_TIME(), 'logout', '" . $_SESSION['client_id'] . "')";
}
$result = mysqli_query($conn,$query);
mysqli_free_result($result);

session_destroy();
header("Location: /index.php");

?>