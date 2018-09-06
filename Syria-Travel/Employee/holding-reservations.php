<?php

session_start();
if(!isset($_SESSION['e_id'])){
    header("Location: /Auth/signup.php");
}

// -- Link -- //
include "layout/link.php";
?>

<title> Manage Trips </title>
</head>

<?php
// Header -- //
include "../assets/layout/employee-header.php";

?>

<section id="header" class="section-wrapper intro">
    <div class="container">
        <h1 class="text-left text-muted"> Holding Reservations </h1>
        <hr>
        <ul class="nav nav-pills">
            <li class="active"><a href="holding-reservations.php"> Holding Reservations </a></li>
            <li><a href="canceling-reservation.php"> Canceling Reservations </a></li>
            <li><a href="company-trips.php"> Company Trips </a></li>
        </ul>
    </div>
    <hr>
    <div class="container">

        <table class="table" style="color: black">
            <thead>
            <tr>
                <th> Trip_id </th>
                <th> Client Name </th>
                <th> Client National Number </th>
                <th> Client Email/Phone </th>
                <th> Date </th>
                <th> Time </th>
                <th> Type </th>
                <th> Seats </th>
            </tr>
            </thead>
            <thead id="l1">

            </thead>
            <div class="alert alert-info alert-dismissable text-left hidden" id="alert">
                <a href="holding-reservations.php" class="panel-close close">×</a>
                <i class="fa fa-coffee"></i>
                <strong class="text-danger">You should explain the voiding reason to the Client.</strong>
                <hr>
                <form action="void.php"  method="post" role="form">
                    <textarea class="form-control" rows="3" name="m_details" required></textarea>
                    <hr>
                    <input type="hidden" id="r" name="r_id">
                    <input type="submit" name="submit" value="Send" class="btn btn-primary">
                </form>
            </div>
        </table>

    </div>
</section>

<?php
// -- Footer -- //
include "layout/hold-footer.php";
?>
