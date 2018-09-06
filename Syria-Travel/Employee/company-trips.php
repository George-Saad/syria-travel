<?php

session_start();
if(!isset($_SESSION['e_id'])){
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
include "../assets/layout/employee-header.php";
// Database Connect
include_once "../db_connect.php";
$query= "select * from employee WHERE e_id=" . $_SESSION['e_id'];
$result= mysqli_query($conn,$query);
$row= mysqli_fetch_assoc($result);
mysqli_free_result($result);
$e_company_id = $row['e_comapny_id'];
?>

<section id="header" class="section-wrapper intro">
    <div class="container">
        <h1 class="text-left text-muted"> Canceling Reservations </h1>
        <hr>
        <ul class="nav nav-pills">
            <li><a href="holding-reservations.php"> Holding Reservations </a></li>
            <li><a href="canceling-reservation.php"> Canceling Reservations </a></li>
            <li class="active"><a href="company-trips.php"> Company Trips </a></li>
        </ul>
    </div>
    <hr>
    <div class="container">

        <table class="table" style="color: black">
            <table class="table" style="color: black">
                <thead>
                <tr>
                    <th> ID </th>
                    <th> Departure </th>
                    <th> Desination </th>
                    <th> Duration </th>
                    <th> Status </th>
                    <th> Available E_Seats </th>
                    <th> Available F_Seats </th>
                    <th>
                        <form method="post" action="company-trips.php">
                            <input type="text" name="search" placeholder="Search..">
                        </form> </th>
                </tr>
                </tr>
                </thead>
                <thead>
                <?php

                if (isset($_POST['search'])){
                    $search=$_POST['search'];
                    $query="SELECT * from trip_info WHERE t_status='available' and t_company_id=" . $e_company_id . " AND t_id = " . $search . "
					or t_from LIKE '%" . $search . "%' OR t_to LIKE '%" . $search . "%' or t_status LIKE '%" . $search . "%'";
                }
                else
                {
                    $query= "select * from trip_info WHERE t_status='available' and  t_company_id=" . $e_company_id;
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
                            <th>'. $row["t_econ_seats"] .' </th>
                            <th>'. $row["t_first_seats"] .' </th>
                             <th>
                                <a data-target="#'. $row["t_id"] .'" class="accordion-toggle" data-toggle="collapse">
                                    <button type="button" class="btn  btn-default"> <strong class="text-info">More</strong> </button>
                                </a>
                            </th>
                        </tr> 
                        <tr>
                            <td class="hiddenRow" colspan="12"><div class="accordian-body collapse" id="'. $row["t_id"] .'"> 
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
                                                <th> '. $row["t_departure_time"] .'  </th>
                                                <th> '. $row["t_arrival_time"] .'  </th>
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

            </table>

    </div>
</section>

<?php
// -- Footer -- //
include "layout/footer.php";
?>
