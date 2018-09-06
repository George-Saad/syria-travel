
<?php
// -- Link -- //
session_start();
if(!isset($_SESSION['client_id'])){
    $_SESSION['client_id']= $_GET['client_id'];
}

include "layout/link.php";

?>

<title>Syria Travel</title

</head>

<?php

// -- DataBase -- //
include_once "../db_connect.php";
$client_id = $_SESSION['client_id'];

$query = "select * from clients where client_id=" . $client_id;
$result= mysqli_query($conn,$query);
$row= mysqli_fetch_assoc($result);
// -- Header -- //
include_once "../assets/layout/client-header.php";
?>

<section id="header" class="section-wrapper intro">

    <div class="container">
        <h1 class="text-left text-muted">Edit Profile</h1>
        <hr>
        <div class="row">

            <!-- edit form column -->
            <div class="col-md-9 personal-info text-primary text-left">
                <h3>Personal info</h3>

                <form class="form-horizontal text-muted" role="form" method="post" action="edit.php">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Username:</label>
                        <div class="col-md-8">
                            <input class="form-control" readonly type="text" name="client_username" value="<?php echo $row['client_username']; ?>" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email / Phone:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="client_email_phone" value="<?php echo $row['client_email_phone']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="client_password" value="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Confirm password:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="client_c_password" value="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" name="submit" class="btn btn-primary" type="button" value="Save Changes">
                            <span></span>
                            <input class="btn btn-default" type="reset" value="Cancel">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>

</section>


<?php
// -- Footer -- //

include "layout/footer.php";


?>


