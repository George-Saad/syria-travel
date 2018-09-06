<?php
session_start();
// DataBase Connect
include "../db_connect.php";

function noti_date($date, $time, $conn){
    $m_date = date_create($date);
    $c_date = date_create(date("Y-m-d")) ;
    $diff = date_diff($m_date, $c_date);

    if($diff->format("%a") == 1){
        return 'yesterday';
    }
    elseif ($diff->format("%a") == 0){

        $query = "select CURRENT_TIME AS time ";
        $result= mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $m_time = new DateTime($time);    $c_time = new DateTime($row['time']);
        $dateDiff = $m_time->diff($c_time);
        return substr($dateDiff->format("%H:%I:%S"),0,-6). ' ' . ' hours, ' . substr($dateDiff->format("%H:%I:%S"),3,-3)   .  ' minutes';
        
    }
    else{
        return date_format($m_date, ("F j, Y"));
    }

}


$query= "SELECT * FROM `exchanging_message`, `companies` where m_company_id = c_id and m_client_id = " . $_SESSION['client_id'] .
    " ORDER by m_date,m_time DESC LIMIT 5 ";
$result= mysqli_query($conn,$query);

echo '<li class="text-info" style="padding-bottom: 1%; padding-left: 3%; padding-top: 3%; background-color: white">
        <b>  Notifications</b> <hr style="padding: 0px ;margin: 0px;">
      </li>';
while ($row = mysqli_fetch_assoc($result)){

    if($row['m_employee_id'] == NULL){
        echo '<li class="text-lowercase" style="color: #000000;">
				<a href="/Client/my-reservations-c.php">
					<img src="/assets/images/companies/icons/' . $row['c_icon'] .  '"  width="60" height="60" alt="icon " /> 
					<strong class="text-uppercase" style="padding-left: 5%">' . $row["c_name"] . '</strong> 
					<small>has updated the trip you booked in.</small> <br style="padding: 0px ;margin: 0px;">
                    <small class="text-muted" style="padding-left:25%"> ' . noti_date($row["m_date"], $row["m_time"], $conn) . ' </small>									  		
				</a>		
			  </li><hr style="padding: 0px ;margin: 0px;">';

    }

    else{

        echo '<li class="text-lowercase" style="color: #000000;">							
			        <a href="/Client/message-content.php?m_id=' . $row['m_id'] . '">
						<img src="/assets/images/companies/icons/' . $row['c_icon'] .  '"  width="60" height="60" alt="icon " /> 
						<strong class="text-uppercase" style="padding-left: 5%">' . $row["c_name"] . '</strong> 
						<small>replied to your request. </small>	<br style="padding: 0px ;margin: 0px;">
						<small class="text-muted" style="padding-left:25%"> ' . noti_date($row["m_date"], $row["m_time"], $conn) . ' </small>
					</a>
			  </li><hr style="padding: 0px ;margin: 0px;">';
    }
}
echo '<li class="text-center" style="background-color: white"> <a href="/Client/your-noti.php"> <b class="text-info">  See All </b> </a> </li>';

$m_query = "UPDATE exchanging_message set m_is_read = 'yes' where m_client_id = " . $_SESSION['client_id'];
$M_result = mysqli_query($conn,$m_query)

?>


