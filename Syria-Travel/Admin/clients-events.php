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
            <h1 class="text-left text-muted"> Clients Events </h1>
            <hr>
            <ul class="nav nav-pills" style="background-color: #f3f3f3">
                <li><a href="manage-companies.php"> Manage Companies </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> Manage Clients</b> <span class="caret"></span></a>
                    <ul  class="dropdown-menu">
                        <li> <a href="active-clients.php"> <strong class="text-primary"> Active Clients </strong> </a> </li>
                        <li> <a href="blocked-clients.php"> <strong class="text-primary"> Blocked Clients </strong> </a> </li>
                    </ul>
                </li>
                <li class="active dropdown">
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
                    <th> ID </th>
                    <th> User Name </th>
                    <th> Event Date </th>
                    <th> Event Time </th>
                    <th> Event Action </th>
                    <th> Event Details </th>
                </tr>
                </thead>
                <thead>
                <?php
                $query= "SELECT * FROM `clients`, `event_history` WHERE client_id = event_actor_id AND event_action in 
                        ('login','logout', 'signup') ORDER  BY event_date, event_time DESC ";
                $result= mysqli_query($conn,$query);
                while ($row= mysqli_fetch_assoc($result)){
                    echo '<tr>
                            <th>'. $row["client_id"] .'</th>
                            <th>'. $row["client_username"] .'</th>
                            <th>'. $row["event_date"] .'</th>
                            <th>'. $row["event_time"] .'</th>
                            <th>'. $row["event_action"] .'</th>
                            <th> <a data-toggle="modal" data-target="#details' . $row["event_id"] . '"> Details </a> </th>
                            <th>
                                <a href="client-events.php?id=' . $row["client_id"]  .'"> <button type="button" class="btn-sm btn-default">
                                    <strong class="text-info"> ' . $row["client_username"] . ' Events </strong></button>
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