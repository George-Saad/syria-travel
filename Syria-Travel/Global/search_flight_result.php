<?php

if(!isset($_GET['submit'])){
    header("Location: ../index.php");
}

if ($_GET['ticket_type'] == "one" ) {

	$f_from =  htmlentities($_GET['f_from']);
	$f_to =  htmlentities($_GET['f_to']);
	$f_price = htmlentities($_GET['f_price']);
	$originalDate = htmlentities($_GET['f_departure_date']);
	$f_departure_date = htmlentities(date("Y-m-d", strtotime($originalDate)));
	if(isset($_GET['c_id'])){
		$c_id = htmlentities($_GET['c_id']);
		header("Location: search_flight_result_one.php?f_from=$f_from&f_to=$f_to&f_price=$f_price&f_departure_date=$f_departure_date&c_id=$c_id");
	}	
    else{
		$c_type = $_GET['c_type'];
		header("Location: search_flight_result_one.php?f_from=$f_from&f_to=$f_to&f_price=$f_price&f_departure_date=$f_departure_date&c_type=$c_type");
	}

}

else{

	$f_from =  htmlentities($_GET['f_from']);
	$f_to =  htmlentities($_GET['f_to']);
	$f_price = htmlentities($_GET['f_price']);
	$originalDate = htmlentities($_GET['f_departure_date']);
	$f_departure_date = date("Y-m-d", strtotime($originalDate));
	$originalDate = $_GET['f_return_date'];
	$f_return_date = date("Y-m-d", strtotime($originalDate));
	if(isset($_GET['c_id'])){
		$c_id = htmlentities($_GET['c_id']);
		header("Location: search_flight_result_round.php?f_from=$f_from&f_to=$f_to&f_price=$f_price&f_departure_date=$f_departure_date&f_return_date=$f_return_date&c_id=$c_id");
	}
	else{
		$c_type = $_GET['c_type'];
		header("Location: search_flight_result_round.php?f_from=$f_from&f_to=$f_to&f_price=$f_price&f_departure_date=$f_departure_date&f_return_date=$f_return_date&c_type=$c_type");
	}
}


?>