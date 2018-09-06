<?php

session_start();
if(!isset($_SESSION['a_id'])) {
    header("Location: ../Auth/signup.php");
}
// Link
include "layout/link.php";
?>

    <title>Syria Travel</title

<?php
// -- DataBase -- //
include_once "../db_connect.php";
// -- Header -- //
include_once "../assets/layout/admin-header.php";

?>
    <section id="header" class="section-wrapper intro">
        <div class="container">
            <h1 class="text-left text-muted"> Add New Company </h1>
            <hr>
            <ul class="nav nav-pills">
                <li class="active"><a href="manage-companies.php"> Manage Companies </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> Manage Clients</b> <span class="caret"></span></a>
                    <ul  class="dropdown-menu">
                        <li> <a href="active-clients.php"> <strong class="text-primary"> Active Clients </strong> </a> </li>
                        <li> <a href="blocked-clients.php"> <strong class="text-primary"> Blocked Clients </strong> </a> </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> Event History </b> <span class="caret"></span></a>
                    <ul  class="dropdown-menu">
                        <li> <a href="companies-events.php"> <strong class="text-primary"> Companies Events </strong> </a> </li>
                        <li> <a href="clients-events.php"> <strong class="text-primary"> Clients Events </strong> </a> </li>
                    </ul>
                </li> 
            </ul>
        </div>
        <hr>
        <div class="container">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <form action="add.php" method="post"  enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="c_name" id="c_name" class="form-control input-lg" placeholder="Company Name" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="c_username" id="c_username" class="form-control input-lg" placeholder="Company UserName" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="password" name="c_password" id="c_password" class="form-control input-lg" placeholder="Company Password" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control input-lg" placeholder="Confirm Password"  required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" type="password" name="c_details" id="c_details" placeholder="Company Details" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <img src="../assets/images/companies/no_icon.png" class="img-rounded" id="icon" width="100" height="100">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <input type="file" class="form-control input-lg"  name="c_icon" onchange="readURL(this)" style="margin-top: 10%">

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <select name="c_type" class="form-control input-lg">
                                <option value="f"> Flight </option>
                                <option value="t"> Train </option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <input type="submit" name="submit" value="Add" class="btn btn-primary btn-block btn-lg">
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