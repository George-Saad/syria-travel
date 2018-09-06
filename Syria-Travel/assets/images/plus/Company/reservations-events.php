<?php

session_start();
if(!isset($_SESSION['c_id'])) {
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
include_once "../assets/layout/company-header.php";

?>
    <section id="header" class="section-wrapper intro">
        <div class="container">
            <h1 class="text-left text-muted"> Reservations Events </h1>
            <hr>
            <ul class="nav nav-pills" style="background-color: #f3f3f3">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> Manage Trips</b> <span class="caret"></span></a>
                    <ul  class="dropdown-menu">
                        <li> <a href="available-trips.php"> <strong class="text-primary"> Available Trips </strong> </a> </li>
                        <li> <a href="unavailable-trips.php"> <strong class="text-primary"> Unavailable Trips </strong> </a> </li>
                        <li> <a href="canceled-trips.php"> <strong class="text-primary"> Canceled Trips </strong> </a> </li>
                        <li> <a href="arrived-trips.php"> <strong class="text-primary"> Arrived Trips </strong> </a> </li>
                    </ul>
                </li>
                <li><a href="manage-employees.php"> Manage Employees </a></li>
                <li class="active dropdown">
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
                    <th> Employee ID </th>
                    <th> Event Action </th>
                    <th> Event Date </th>
                    <th> Event Time </th>
                    <th> Event Details </th>
                    <th> Employees Events </th>
                </tr>
                </thead>
                <thead>
                <?php
                $query= "SELECT * FROM `Employee`, `event_history` WHERE e_id = event_actor_id AND  e_comapny_id = " . $_SESSION['c_id'] . " AND  event_action in 
                        ('confirm_reservation','cancel_reservation', 'void_reservation', 'igrone_cancel_reservation') ORDER  BY event_date, event_time DESC ";
                $result= mysqli_query($conn,$query);
                while ($row= mysqli_fetch_assoc($result)){
                    echo '<tr>
                            <th>'. $row["e_id"] .'</th>
                            <th>'. $row["event_action"] .'</th>
                            <th>'. $row["event_date"] .'</th>
                            <th>'. $row["event_time"] .'</th>
                            <th> <a data-toggle="modal" data-target="#details' . $row["event_id"] . '"> Details </a> </th>
                            <th>
                                <a href="employee-events.php?id=' . $row["e_id"]  .'"> <button type="button" class="btn-sm btn-default">
                                    <strong class="text-info"> ' . $row["e_username"] . ' Events </strong></button>
                                </a>
                            </th>
                        </tr> 
                        
                        <!-- Modal -->
                        <div class="modal fade" id="details' . $row["event_id"] . '" role="dialog">
                            <div class="modal-dialog">
                        
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p> ' . $row["event_details"] .  '</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                  
                            </div>
                        </div>        
                        ';
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

    <script type="text/javascript">
        function details(e) {
            alert(e);
        }
    </script>

<?php
// -- Footer -- //
include "layout/footer.php";
?>