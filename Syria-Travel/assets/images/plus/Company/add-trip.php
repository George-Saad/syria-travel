<?php

session_start();
if(!isset($_SESSION['c_id'])){
    header("Location: /Auth/signup.php");
}


// -- Link -- //

include "layout/link.php";

?>

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
        <h1 class="text-left text-muted"> Add Trip </h1>
        <hr>
        <ul class="nav nav-pills">
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
                    <li> <a href="employees-logs.php"> <strong class="text-primary"> Emloyees Logs </strong> </a> </li>
                </ul>
            </li>
        </ul>
    </div>
    <hr>
    <div class="container">

        <div class="col-xs-12 col-sm-8 col-md-10">
            <form action="add.php" method="post" role="form"">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <input type="text" name="f_from" id="f_from" class="form-control input-lg" placeholder="From" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <input type="text" name="f_departure_date" id="f_departure_date" class="form-control input-lg" placeholder="yyyy-mm-dd" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <input type="text" name="f_departure_time" id="f_departure_time" class="form-control input-lg" placeholder="hh:mm:ss" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <input type="text" name="f_to" id="f_to" class="form-control input-lg" placeholder="To" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <input type="text" name="f_arrival_time" id="f_arrival_time" class="form-control input-lg" placeholder="hh:mm:ss" required>
                    </div>
                </div>
                
            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_econ_price" id="f_econ_price" class="form-control input-lg" placeholder="Economy Seat Price" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_first_price" id="f_first_price" class="form-control input-lg" placeholder="First Seat Price" required>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_child_price" id="f_child_price" class="form-control input-lg" placeholder="Child Seat Price" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_round_sold" id="f_round_sold" class="form-control input-lg" placeholder="Round Trip Sold" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_econ_seats" id="f_econ_seats" class="form-control input-lg" placeholder="Economy Seats Number" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_first_seats" id="f_first_seats" class="form-control input-lg" placeholder="First Seats Number" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_total_weight_value" id="f_total_weight_value" class="form-control input-lg" placeholder="Total Weight To Each Passenger" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_extra_weight_price" id="f_extra_weight_price" class="form-control input-lg" placeholder="Extra Weight Cost  .. Dollar/KG" required>
                    </div>
                </div>
            </div>

            <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                <strong class="text-danger">
                    Trip status must be available to show in searching results.
                </strong>
            </div>

            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_status" id="f_status" class="form-control input-lg" placeholder="Trip Status (available)" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <input type="submit" name="submit" value="Add Trip" class="btn btn-primary btn-block btn-lg">
                </div>
            </div>


            <div class="row">
                <div>
                    <input type="hidden" name="value" value="1">
                </div>
                <div>
                    <input type="hidden" name="f_company_id" value="<?php echo $_SESSION['c_id'] ?>">
                </div>

            </div>

            </form>
        </div>

    </div>
</section>

<?php
// -- Footer -- //

include "layout/footer.php";
?>
