<?php

include_once "../db_connect.php";

@header('Content-Type: text/html; charset=utf-8');
$client_username = $_POST['client_username'];
$client_email_phone = $_POST['client_email_phone'];
$client_password = $_POST['client_password'];
$hash = hash("sha256", $client_password);
$code = '';

for ($i=0;$i<20;$i++){
    $code = $code . chr(rand(48, 57));
    $code = $code . chr(rand(65, 90));
    $code = $code . chr(rand(97, 122));
}

$query = "INSERT into clients (client_username,client_email_phone,client_password, client_status) VALUES ('" . $client_username . "',
 		'" . $client_email_phone . "', '" . $hash . "', '" . $code . "')" ;
$result= mysqli_query($conn,$query);


$link = 'http://localhost/Auth/email-validate.php?code=' . $code;
$body = 'please click the link to activate your acount :  ' . $link;
//mail($client_email_phone, 'Account activation', wordwrap($body,70), 'From: syria-travel@....');

header("Location: /Auth/client-login.php?failed=2");
?>


