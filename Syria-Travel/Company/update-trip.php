<?php

session_start();
if(!isset($_SESSION['c_id'])){
    header("Location: /Auth/signup.php");
}
// Database Connect
include_once "../db_connect.php";

$query = "select * from trip_info  where t_id = " . $_GET['f_id'];
$result = mysqli_query($conn,$query);
$row= mysqli_fetch_assoc($result);

if($row['t_company_id'] != $_SESSION['c_id']){
    header("Location: /404-page-not-found");
}


// -- Link -- //

include "layout/link.php";

?>

<title> Manage Trips </title>
</head>

<?php

// Header -- //

include "../assets/layout/company-header.php";

$query="select * from trip_info  where t_id=" . $_GET['f_id'];
$result= mysqli_query($conn,$query);
$row= mysqli_fetch_assoc($result);
?>

<section id="header" class="section-wrapper intro">
    <div class="container">
        <h1 class="text-left text-muted"> Update Trip </h1>
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
                    <li> <a href="employees-events.php"> <strong class="text-primary"> Emloyees Logs </strong> </a> </li>
                </ul>
            </li>
        </ul>
    </div>
    <hr>
    <div class="container">

        <div class="col-xs-12 col-sm-8 col-md-10">
            <form action="update.php" method="post" role="form"">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <input type="text" name="f_from" id="f_from" class="form-control input-lg" value="<?php echo $row['t_from']; ?>" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <input type="text" name="f_departure_date" id="f_departure_date" class="form-control input-lg" value="<?php echo $row['t_departure_date']; ?>" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <input type="text" name="f_departure_time" id="f_departure_time" class="form-control input-lg" value="<?php echo $row['t_departure_time']; ?>" required>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="form-group">
                        <input type="text" name="f_to" id="f_to" class="form-control input-lg" value="<?php echo $row['t_to']; ?>" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="form-group">
                        <input type="text" name="f_arrival_time" id="f_arrival_time" class="form-control input-lg" value="<?php echo $row['t_arrival_time']; ?>" required>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_econ_price" id="f_econ_price" class="form-control input-lg" value="<?php echo $row['t_econ_price']; ?>" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_first_price" id="f_first_price" class="form-control input-lg" value="<?php echo $row['t_first_price']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_child_price" id="f_child_price" class="form-control input-lg" value="<?php echo $row['t_child_price']; ?>" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_round_sold" id="f_round_sold" class="form-control input-lg" value="<?php echo $row['t_round_sold']; ?>" required>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_econ_seats" id="f_econ_seats" class="form-control input-lg" value="<?php echo $row['t_econ_seats']; ?>" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_first_seats" id="f_first_seats" class="form-control input-lg" value="<?php echo $row['t_first_seats']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_total_weight_value" id="f_total_weight_value" class="form-control input-lg" value="<?php echo $row['t_total_weight_value']; ?>" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_extra_weight_price" id="f_extra_weight_price" class="form-control input-lg" value="<?php echo $row['t_extra_weight_price']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="f_status" id="f_status" class="form-control input-lg" value="<?php echo $row['t_status']; ?>" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <input type="submit" name="submit" value="Update Trip" class="btn btn-primary btn-block btn-lg">
                </div>
                <div>
                    <input type="hidden" name="value" value="1">
                </div>
                <div>
                    <input type="hidden" name="f_id" value="<?php echo $row['t_id']; ?>">
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


