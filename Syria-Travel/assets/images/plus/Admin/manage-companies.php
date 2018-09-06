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
            <h1 class="text-left text-muted"> Manage Companies </h1>
            <hr>
            <ul class="nav nav-pills" style="background-color: #f3f3f3">
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
            <table class="table" style="color: black">
                <thead>
                <tr>
                    <th> Icon </th>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Username </th>
                    <th> Password </th>
                    <th>
                        <a href="add-company.php">
                            <button type="button" class="btn-sm  btn-primary">Add Company</button>
                        </a>
                    </th>
                </tr>
                </thead>
                <thead>
                <?php
                $query= "select * from companies";
                $result= mysqli_query($conn,$query);
                while ($row= mysqli_fetch_assoc($result)){
                    echo '<tr>
                            <th>
                                <img src="../assets/images/companies/icons/' .$row["c_icon"].'"  width="50" height="35" alt="icon ">
                            </th>
                            <th>'. $row["c_id"] .'</th>
                            <th>'. $row["c_name"] .'</th>
                            <th>'. $row["c_username"] .'</th>
                            <th>'. $row["c_password"] .'</th>
                            <th>
                                <a href="edit-company.php?id=' . $row["c_id"]  .'"> <button type="button" class="btn-sm  btn-default">Edit</button></a>
                                <a href="#"><button type="button" class="btn-sm  btn-danger" id="' . $row['c_id'] . '" onclick="showAlert(this.id)"> Remove </button></a>                               
                            </th>
                        </tr> ';
                }
                ?>
                </thead>
                <div class="alert alert-danger alert-dismissable text-left hidden" id="alert">
                    <a href="manage-companies.php" class="panel-close close">×</a>
                    <i class="fa fa-coffee"></i>
                    <strong> By clicking remove , This company will delete from the database. </strong>
                    <hr>
                    <form class="form-group" action="remove.php" method="post" role="form">
                        <input type="hidden" id="r" name="c_id">
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