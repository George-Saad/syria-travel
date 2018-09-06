
<?php
session_start();
if(!isset($_SESSION['client_id'])){
    header("Location: /Auth/signup.php");
}
// -- Link -- //

include "layout/link.php";

?>

<title>Syria Travel SignUp</title>

<style>

    .table {
        border-bottom:0px !important;
    }
    .table th, .table td {
        border: 1px !important;
    }

    .fixed-table-container {
        border:0px !important;
    }

</style>

</head>

<?php

// -- DataBase -- //
include_once "../db_connect.php";
$client_id = $_SESSION['client_id'];
// -- Header -- //
include_once "../assets/layout/client-header.php";

?>

<section id="header" class="section-wrapper intro ">
    <div class="container">
        <h1 class="text-left text-muted">My Reservations</h1>
        <hr>
        <div class="alert alert-info alert-dismissable">
            <a class="panel-close close" data-dismiss="alert">×</a>
            <i class="fa fa-coffee"></i>
            <strong class="text-danger">
                You can cancle your reservation before conferming or after 24 hrs only.
            </strong>
        </div>
        <ul class="nav nav-pills">
            <li class="active"><a href="#"> On Hold </a></li>
            <li><a href="my-reservations-c"> Confirmed </a></li>
            <li><a href="my-reservations-h.php"> History </a></li>
        </ul>
    </div>
    <hr>
    <div class="container">
    <?php
    $query= "SELECT * FROM reservations, trip_info, companies WHERE r_trip_id = t_id AND
    t_company_id = c_id AND r_client_id = " . $client_id . " AND  r_status='hold' AND t_status not in ('arrived', 'canceled', 'unavailable')";
        $result= mysqli_query($conn,$query);


        while ($row = mysqli_fetch_assoc($result)) {
            $c_type = $row['c_type'];
            if ($c_type == 'f') {
                $glyph = '<span style="color:#248dc1" class="glyphicon glyphicon-plane gly-rotate-90"> </span>';
                $glyph_l = '<span class="glyphicon glyphicon-plane gly-rotate-45" style="color: #ff6c00"></span> Take Off </i>';
                $glyph_a = '<span class="glyphicon glyphicon-plane gly-rotate-135" style="color: #ff6c00"> </span> Landing </i>';
                $glyph_d = '<span style="color:#248dc1" class="glyphicon glyphicon-plane gly-rotate-270"> </span> ';
            } else {
                $glyph = '<i style="color:#248dc1" class="ionicons ion-android-train"> </i>';;
                $glyph_l = '<span style="color: #ff6c00" class="ionicons ion-android-train"> </span> Leaving </i>';
                $glyph_a = '<span style="color: #ff6c00" class="ionicons ion-android-train">  </span> Arrival </i>';
                $glyph_d = '<span style="color:#248dc1" class="ionicons ion-android-train"> </span> ';
            }

            $r_type = $row['r_type'];
            $r_adult_num = $row['r_seats_num'] - $row['r_children_num'];

            if($row['r_round_trip'] != NULL){
                $r_price = $row['t_child_price'] * $row['r_children_num'] + $row[$r_type] * ($row['r_seats_num'] - $row['r_children_num']) +
                    $row['r_extra_weight_value'] * $row['t_extra_weight_price'];
                $r_price = $r_price - $row['r_seats_num'] * $row['t_round_sold'];
            }
            else{
                $r_price = $row['t_child_price'] * $row['r_children_num'] + $row[$r_type] * ($row['r_seats_num'] - $row['r_children_num']) +
                    $row['r_extra_weight_value'] * $row['t_extra_weight_price'];
            }


            $d_day = DateTime::createFromFormat('Y-m-d', $row['t_departure_date']);


                echo ' <article class="search-result row" style="background-color: #eeeeee;">
                            
                                    <div class="col-xs-12 col-sm-6 col-md-2 excerpet" style="background-color: white">
                                        <h6 style="text-align: center">
                                            <img src="../assets/images/companies/icons/' . $row['c_icon'] . '"  width="100" height="80" alt="icon " />
                                        </h6>
                                        <a href="../company.php?c_id=' . $row['c_id'] . '" > <h5 class="text-muted text-center">' . $row['c_name'] . ' </h5> </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-2" >
                                        <ul class="meta-search text-left">
                                            <h3 style="padding-top: 10%">	
                                                <li> ' . $glyph . '
                                                <span class="text-primary"> Departure </span>	</li>
                                            </h3>									
                                            <h3>	
                                                <li>	<i class="glyphicon glyphicon-calendar">	</i> 
                                                <span class="text-primary"> ' . $row['t_departure_date'] . ' </span>	</li>
                                            </h3>
                                            <span class="plus"><a data-target="#' . $row["r_id"] . '" class="accordion-toggle" 
                                            data-toggle="collapse" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
                                        </ul>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-8 excerpet">
                        
                                        <table class="table">
                                            <thead>
                                                <tr >
                                                    <th> 
                                                        <h5 style="color: #585858;padding-top: 10%;font-weight: bold"> ' . $row['t_from'] . ' </h3>  
                                                    </th>
                                                    <th> 
                                                        <h5 style="color: #585858;font-weight: bold"> ' . $row['t_to'] . ' </h3>  
                                                    </th>
                                                    <th> 
                                                        <p> <i class="glyphicon glyphicon-briefcase"></i>
                                                        <span style="color: grey"> ' . $row['t_total_weight_value'] . ' KGs <small>(Per Person)</small>  </span> </p> 
                                                    </th>
                                                    <th style="text-align: center">
                                                        <h3 style="color: #ff6c00; padding-top: 10%;font-weight: bold"> $' . $r_price . ' </h3>
                                                        <h6 class="text-muted"> ' . $r_adult_num . ' Adult,
                                                         ' . $row['r_children_num'] . ' Child, ' . $row['r_extra_weight_value'] . ' Extra Weight </h6>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <p style="color: grey;"> <i class="text-info" > 
                                                        ' . $glyph_l . '
                                                        <br> <small> ' . $d_day->format('D ') . date('h:i  a ', strtotime($row['t_departure_time'])) . ' </small>
                                                        </p>
                                                    </th>
                                                    <th>
                                                        <p style="color: grey;">
                                                             ' . $glyph_a . '
                                                              <br><small> ' . $d_day->format('D ') . date('h:i  a ', strtotime($row['t_arrival_time'])) . ' </small>
                                                        </p>
                                                    </th>
                                                    <th>
                                                        <p style="color: grey;">
                                                            <i class="text-info" > <span class="glyphicon glyphicon-time" style="color: #ff6c00"></span>
                                                             Time </i> <br>	<small> ' . (int)substr($row['t_duration'], 0, -6) . ' Houres, 
                                                             ' . (int)substr($row['t_duration'], 3, -3) . ' Minutes </small>
                                                        </p>
                                                    </th>
                                                    <th>
                                                        <a href="cancel.php?r_id=' . $row['r_id'] . '"><div class="btn btn-primary custom-button"><b> Cancel </b></div></a>
                                                    </th>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="hiddenRow" colspan="12"><div class="accordian-body collapse" id="' . $row["r_id"] . '"> 
                                                        <table class="table table-striped">
                                                              <thead>
                                                                    <tr class="text-info">
                        
                                                                        <th> Economy Price </th>
                                                                        <th> First Class Price </th>
                                                                        <th> Children Price </th>
                                                                        <th> Round Trip Sold </th>
                                                                        <th> Extra Weight </th>
                                                                    </tr>      
                                                              </thead>
                                                              <tbody>
                                                                <tr class="text-muted">
                                                                        <th> ' . $row["t_econ_price"] . ' $</th>
                                                                        <th> ' . $row["t_first_price"] . '  $</th>
                                                                        <th> ' . $row["t_child_price"] . '  $</th>
                                                                        <th> ' . $row["t_round_sold"] . ' $</th>
                                                                        <th> ' . $row["t_extra_weight_price"] . ' . $/KG </th>
                                                                </tr>
                                                              </tbody>
                                                              <thead>
                                                                    <tr class="text-info">
                                                                        <th> Status </th>
                                                                        <th> Round Trip </th>
                                                                    </tr>      
                                                              </thead>
                                                              <tbody>
                                                                <tr class="text-muted">
                                                                        <th> ' . $row["t_status"] . '  </th>
                                                                        <th> ' . $row["r_round_trip"] . '  </th>
                                                                </tr>
                                                              </tbody>
                                                        </table>
                                                      
                                                      </div> 
                                                    </td>
                                                </tr>
                                                
                                            </thead>
                                        </table>
                                    </div>
                        
                                </article>
                                <hr>		
                        ';

        }

    ?>
    </div>
</section>


<?php
// -- Footer -- //

include "layout/footer.php";


?>


