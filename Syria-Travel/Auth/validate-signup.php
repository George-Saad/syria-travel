<?php

include_once ('../db_connect.php');

$response = array(
	'valid' => false,
	'message' => 'Post argument "user" is missing.'
);

if( isset($_POST['client_username']) ) {

	$query= "SELECT * FROM clients WHERE client_username = '" . $_POST['client_username'] . "'" ;
	$result= mysqli_query($conn,$query);

	if( $result->num_rows >= 1 ) {
		// User name is registered on another account
		$response = array('valid' => false, 'message' => 'This user name is already registered.');
	} else {
		// User name is available
		$response = array('valid' => true);
	}
}
echo json_encode($response);