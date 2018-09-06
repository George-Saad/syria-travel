<?php

session_start();
if(!isset($_SESSION['a_id'])) {
    $_SESSION['a_id'] = $row['client_id'];
    header("Location: ../Auth/signup.php");
}
// Link
include "layout/link.php";
?>

    <title>Blocked Client</title

<?php
// -- DataBase -- //
include_once "../db_connect.php";
// -- Header -- //
include_once "../assets/layout/admin-header.php";

?>
    <section id="header" class="section-wrapper intro">
        <div class="container">
            <h1 class="text-left text-muted"> Manage Clients </h1>
            <hr>
            <ul class="nav nav-pills" style="background-color: #f3f3f3">
                <li><a href="manage-companies.php"> Manage Companies </a></li>
                <li class="active dropdown">
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
                    <th>  ID </th>
                    <th> User Name </th>
                    <th> Email_Phone </th>
                    <th> Password </th>
                    <th> Status </th>
                    <th>
                        <form method="post" action="blocked-clients.php">
                            <input type="text" name="search" placeholder="Search..">
                        </form> </th>
                </tr>
                </thead>

                <thead>
                <?php

                if (isset($_POST['search'])){
                    $search=$_POST['search'];
                    $query="select * from clients WHERE isAdmin ='no' and client_status = 'blocked' and client_username like '%" . $search . "%' OR client_email_phone like '%" . $search . "%'
                    OR client_password like '%" . $search . "%'";
                }
                else
                {
                    $query= "select * from clients where isAdmin='no' and client_status = 'blocked'";
                }
                $result= mysqli_query($conn,$query);
                while ($row= mysqli_fetch_assoc($result)){
                    echo '<tr>
                            <th>'. $row["client_id"] .'</th>
                            <th>'. $row["client_username"] . '</th>
                            <th>'. $row["client_email_phone"] .'</th>
                            <th>'. $row["client_password"] .'</th>
                            <th>'. $row["client_status"] .'</th>
                            <th>
                                <a href="#"><button type="button" class="btn-sm  btn-success" id="' . $row['client_id'] . '" onclick="showAlert(this.id)"> Active </button></a>
                            </th>
                          </tr> ';
                }
                ?>

                </thead>
                <div class="alert alert-info alert-dismissable text-left hidden" id="alert">
                    <a href="blocked-clients.php" class="panel-close close">×</a>
                    <i class="fa fa-coffee"></i>
                    <strong> Are you shure you want to active this client. </strong>
                    <hr>
                    <form class="form-group" action="active.php" method="post" role="form">
                        <input type="hidden" id="r" name="client_id">
                        <input type="submit" name="submit" value="Active" class="btn btn-success">
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