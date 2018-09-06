<?php

session_start();
// Database Connect
include_once "../db_connect.php";
$query= "select * from employee WHERE e_id =" . $_SESSION['e_id'];
$result= mysqli_query($conn,$query);
$row= mysqli_fetch_assoc($result);
mysqli_free_result($result);
$e_company_id = $row['e_comapny_id'];
$query= "SELECT * from reservations,trip_info WHERE r_trip_id=t_id and r_status='confirmed' and r_cancel_request='yes' and t_company_id=" . $e_company_id;
$result= mysqli_query($conn,$query);
//$_SESSION['hold-req-num']=$result->num_rows;
while ($row= mysqli_fetch_assoc($result)){
    $r_adult_num = (int)$row["r_seats_num"] - (int)$row["r_children_num"];
    echo '<tr>
                            <th>'. $row["r_trip_id"] .'</th>
                            <th>'. $row["r_client_fname"] . " " . $row["r_client_lname"] .'</th>
                            <th>'. $row["r_client_national_number"] .'</th>
                            <th>'. $row["r_client_email_phone"] .'</th>
                            <th>'. $row["r_date"] .'</th>
                            <th>'. $row["r_time"] .'</th>
                            <th>'. $row["r_type"] .'</th>
                            <th>'. $row["r_seats_num"] .'</th>
                            <th
                                <a  class="accordion-toggle" data-target="#m'. $row["r_id"] .'" data-toggle="collapse">
                                    <button type="button" id="' . $row["r_id"] . '" class="btn  btn-default" onclick="pause(' . $row["r_id"] . ')"> <strong class="text-info">More</strong> </button>
                                </a>
                                <a href="cancel.php?r_id='. $row['r_id'] .'"><button type="button" class="btn-sm  btn-primary"> Cancel </button></a>
                                <a href="#"><button type="button" class="btn-sm  btn-danger" id="' . $row['r_id'] . '" onclick="showAlert(this.id)"> Ignore </button></a>                               
                            </th>
                        </tr> 
                        <tr>
                            <td class="hiddenRow" colspan="12"><div class="accordian-body collapse" id="m'. $row["r_id"] .'">
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-info">
                                        <th> Adult Seats </th>
                                        <th> Children Seats </th>
                                        <th> Client Country </th>
                                        <th> Client City </th>
                                        <th> Extra Weight </th>
                                        <th> Card Number </th>
                                        <th> Expiry Date </th>
                                        <th> Card CCV </th>
                                        <th> Round Trip </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-muted">
                                        <th> '. $r_adult_num .' </th>
                                        <th> '. $row["r_children_num"] .'  </th>
                                        <th> '. $row["r_client_country"] .'  </th>
                                        <th> '. $row["r_client_city"] .' </th>
                                        <th> '. $row["r_extra_weight_value"] .' . $/KG </th>
                                        <th> '. $row["r_card_number"] .'</th>
                                        <th> '. $row["r_expire_date"] .'</th>
                                        <th> '. $row["r_card_svv"] .'  </th>
                                        <th> '. $row["r_round_trip"] .'  </th>
                                    </tr>
                                    </tbody>
                                </table>
                        
                                </div>
                            </td>
                        </tr>
                        ';
}
?>