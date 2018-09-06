<?php

session_start();
if(!isset($_SESSION['a_id'])) {
    $_SESSION['a_id'] = $row['client_id'];
    header("Location: ../Auth/signup.php");
}

// Database Connect
include_once "../db_connect.php";
try{
    $c_id= $_POST['c_id'];
    $c_name= $_POST['c_name'];
    $c_username= $_POST['c_username'];
    $c_password= $_POST['c_password'];
    $hash = hash("sha256", $c_password);
    $c_details= $_POST['c_details'];
    $c_type = $_POST['c_type'];
    $c_icon= $_FILES['c_icon']['name'];

    $query= "UPDATE companies SET c_name='" . $c_name . "', c_username='" . $c_username . "', c_password='" . $hash
        . "', c_details = '" . $c_details . "', c_icon = '" . $c_icon ."', c_type = '" . $c_type . "' WHERE c_id=" . $c_id ;

    $result= mysqli_query($conn,$query);

    if($_FILES['c_icon']['name'])
    {
        //if no errors...
        if(!$_FILES['c_icon']['error'])
        {
            //now is the time to modify the future file name and validate the file
            $target_dir = "../assets/images/companies/icons/";
            $target_file = $target_dir . basename($_FILES["c_icon"]["name"]);
            move_uploaded_file($_FILES['c_icon']['tmp_name'], $target_file);
        }
    }

    header("Location: manage-companies.php");
}catch (Exception $e){
    die("Error In Query");
}
?>