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
        <h1 class="text-left text-muted"> Add Employee </h1>
        <hr>
        <ul class="nav nav-pills">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> Manage Trips</b> <span class="caret"></span></a>
                <ul  class="dropdown-menu">
                    <li> <a href="available-trips.php"> <strong class="text-primary"> Available Trips </strong> </a> </li>
                    <li> <a href="unavailable-trips.php"> <strong class="text-primary"> Unavailable Trips </strong> </a> </li>
                    <li> <a href="canceled-trips.php"> <strong class="text-primary"> Canceled Trips </strong> </a> </li>
                    <li> <a href="arrived-trips.php"> <strong class="text-primary"> Arrived Trips </strong> </a> </li>
                </ul>
            </li>
            <li class="active"><a href="manage-employees.php"> Manage Employees </a></li>
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

        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form action="add.php" method="post" role="form"">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="text" name="e_username" class="form-control input-lg" placeholder="Userame" required>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="e_password" id="e_password" class="form-control input-lg" placeholder="Password" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control input-lg" placeholder="Confirm Password"  required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <input type="submit" name="submit" value="Add Employee" class="btn btn-primary btn-block btn-lg">
                </div>
                <div>
                    <input type="hidden" name="e_company_id" value="<?php echo $_SESSION['c_id'] ?>">
                </div>
                <div>
                    <input type="hidden" name="value" value="2">
                </div>

            </div>
            </form>
        </div>
    </div>

    </div>
</section>

<?php
// -- Footer -- //
include "layout/footer.php";
?>
