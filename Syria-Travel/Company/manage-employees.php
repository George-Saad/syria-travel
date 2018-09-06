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
        <h1 class="text-left text-muted"> Manage Employees </h1>
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
                    <li> <a href="employees-events.php"> <strong class="text-primary"> Emloyees Logs </strong> </a> </li>
                </ul>
            </li>
        </ul>
    </div>
    <hr>
    <div class="container">

        <table class="table" style="color: black">
            <thead>
            <tr>
                <th>  ID </th>
                <th>  Username </th>
                <th>
                    <a href="add-employee.php">
                        <button type="button" class="btn-sm  btn-primary">Add Employee</button>
                    </a>
                </th>
            </tr>
            </thead>

            <thead>
            <?php

            $query= "select * from employee WHERE e_comapny_id=" . $_SESSION['c_id'];
            $result= mysqli_query($conn,$query);
            while ($row= mysqli_fetch_assoc($result)){
                echo '<tr>
                            <th>'. $row["e_id"] .'</th>
                            <th>'. $row["e_username"] .'</th>
                            <th>
                                <a href="edit-employee.php?e_id='. $row['e_id'] .'">
                                    <button type="button" class="btn-sm  btn-default">Edit</button>
                                </a>
                                <a href="#"><button type="button" class="btn-sm  btn-danger" id="' . $row['e_id'] . '" onclick="showAlert(this.id)"> Remove </button></a>                               
                            </th>
                          </tr> ';
            }
            ?>

            </thead>
            <div class="alert alert-danger alert-dismissable text-left hidden" id="alert">
                <a href="manage-employees.php" class="panel-close close">×</a>
                <i class="fa fa-coffee"></i>
                <strong> By clicking remove , This company will delete from the database. </strong>
                <hr>
                <form class="form-group" action="remove.php" method="post" role="form">
                    <input type="hidden" id="r" name="e_id">
                    <input type="submit" name="submit" value="Remove" class="btn btn-danger">
                </form>
            </div>

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


