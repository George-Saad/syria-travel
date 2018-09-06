<?php

session_start();
if(!isset($_SESSION['c_id'])){
    header("Location: /Auth/signup.php");
}


// -- Link -- //

include "layout/link.php";

?>

<style>
    input[type=text] {
        width: 130px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        transition: width 0.4s ease-in-out;
    }

    input[type=text]:focus {
        width: 100%;
    }
</style>

<title> Manage Trips </title>
</head>

<?php

// Header -- //

include "../assets/layout/company-header.php";
// Database Connect
include_once "../db_connect.php";
?>

<section id="header" class="section-wrapper intro">
    <div class="container">
        <h1 class="text-left text-muted"> Available Trips </h1>
        <hr>
        <ul class="nav nav-pills" style="background-color: #f3f3f3">
            <li class="active dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> Manage Trips</b> <span class="caret"></span></a>
                <ul  class="dropdown-menu">
                    <li> <a href="available-trips.php"> <strong class="text-primary"> Available Trips </strong> </a> </li>
                    <li> <a href="unavailable-trips.php"> <strong class="text-primary"> Unavailable Trips </strong> </a> </li>
                    <li> <a href="canceled-trips.php"> <strong class="text-primary"> Canceled Trips </strong> </a> </li>
                    <li> <a href="arrived-trips.php"> <strong class="text-primary"> Arrived Trips </strong> </a> </li>
                </ul>
            </li>
            <li><a href="manage-employees.php"> Manage Employees </a></li>
            <li class=" dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> Event History </b> <span class="caret"></span></a>
                <ul  class="dropdown-menu">
                    <li> <a href="reservations-events.php"> <strong class="text-primary"> Reservations Events </strong> </a> </li>
                    <li> <a href="employees-events.php"> <strong class="text-primary"> Emloyees Logs </strong> </a> </li>
                </ul>
            </li>
        /ul>
    </div>
    <hr>
    <div class="container">

        <table class="table" style="color: black">
            <thead>
            <tr>
                <th> ID </th>
                <th> Departure </th>
                <th> Desination </th>
                <th> Duration </th>
                <th> Status </th>
                <th>
                    <a href="add-trip.php">
                        <button type="button" class="btn-sm  btn-primary">Add New Trip</button>
                    </a>
                </th>
                <th>
                    <form method="post" action="availabl-trips.php">
                        <input type="text" name="search" placeholder="Search..">
                    </form> </th>
            </tr>
            </tr>
            </thead>
            <thead>
            <?php

            if (isset($_POST['search'])){
                $search=$_POST['search'];
                $query="SELECT * from trip_info WHERE (t_company_id = " . $_SESSION['c_id'] . ") AND (t_status = 'available') AND 
                        ((t_from like '%" . $search . "%') OR (t_to like '%" . $search . "%') ) order by t_departure_date desc";
            }
            else
            {
                $query= "select * from trip_info WHERE t_company_id=" . $_SESSION['c_id'] . " and t_status = 'available' order by t_departure_date desc";
            }
            $result= mysqli_query($conn,$query);
            while ($row= mysqli_fetch_assoc($result)){
                if ($row["t_status"]=="available"){
                    $color="green";
                }
                else if ($row["t_status"]=="unavailable"){
                    $color="red";
                }
                else if ($row["t_status"]=="arrived"){
                    $color="blue";
                }
                else if ($row["t_status"]=="canceled"){
                    $color="#e68a00";
                }
                else
                {
                    $color="black";
                }
                echo '<tr>
                            <th>'. $row["t_id"] .'</th>
                            <th>'. $row["t_from"] .'</th>
                            <th>'. $row["t_to"] .'</th>
                            <th>'. $row["t_duration"] .'</th>
                            <th style="color : ' . $color . '">'. $row["t_status"] .'</th>
                            <th>
                                <a data-target="#t'. $row["t_id"] .'" class="accordion-toggle" data-toggle="collapse">
                                    <button type="button" class="btn  btn-default"> <strong class="text-info">More</strong> </button>
                                </a>
                                <a href="update-trip.php?f_id=' . $row['t_id']  .'"> <button type="button" class="btn-sm  btn-default">Upate</button></a>
                            </th>
                        </tr>
                        <tr>
                            <td class="hiddenRow" colspan="12"><div class="accordian-body collapse" id="t'. $row["t_id"] .'"> 
                                <table class="table table-striped">
                                      <thead>
                                            <tr class="text-info">
                                                <th> Date </th>
                                                <th> Leaving Time </th>
                                                <th> Arriving Time </th>
                                                <th> Economy Price </th>
                                                <th> First Class Price </th>
                                                <th> Children Price </th>
                                                <th> Round Trip Sold </th>
                                                <th> Total Seats </th>
                                                <th> Weight Allowed </th>
                                                <th> Extra Weight </th>
                                            </tr>      
                                      </thead>
                                      <tbody>
                                        <tr class="text-muted">
                                                <th> '. $row["t_departure_date"] .' </th>
                                                <th> '. substr($row["t_departure_time"], 0, -3) .'  </th>
                                                <th> '. substr($row["t_arrival_time"], 0, -3) .'  </th>
                                                <th> '. $row["t_econ_price"] .' </th>
                                                <th> '. $row["t_first_price"] .' </th>
                                                <th> '. $row["t_child_price"] .' </th>
                                                <th> '. $row["t_round_sold"] .' </th>
                                                <th> '. $row["t_seats"] .' </th>
                                                <th> '. $row["t_total_weight_value"] .' </th>
                                                <th> '. $row["t_extra_weight_price"] .' . $/KG </th>
                                        </tr>
                                      </tbody>
                                </table>
                              
                              </div> 
                            </td>
                        </tr>
                         ';
            }
            ?>
            </thead>

            <?php
            mysqli_free_result($result)
            ?>
        </table>
    </div>
</section>

<?php
// -- Footer -- //

include "layout/footer.php";


?>


