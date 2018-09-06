
<?php

if(!isset($_GET['c_id'])){
	header("Location: /index.php");
}


// Link
include "layout/link.php";

?>

<style>

	#datepicker {
		background-color: white;
		color: #676767;
		font-family:Verdana, Geneva, sans-serif;
		cursor:pointer;
	}
	#r_datepicker {
		background-color: white;
		color: #676767;
		font-family:Verdana, Geneva, sans-serif;
		cursor:pointer;
	}

</style>

<title>Syria Travel SignUp</title>
</head>

<!-- Header -->
<?php

if(isset($_SESSION['a_id'])) {
	include "../assets/layout/admin-header.php";
}
elseif(isset($_SESSION['c_id'])) {
	include "../assets/layout/company-header.php";
}
elseif(isset($_SESSION['e_id'])) {
	include "../assets/layout/employee-header.php";
}
elseif(isset($_SESSION['client_id'])) {
	include "../assets/layout/client-header.php";
}
else{
	include "../assets/layout/header.php";
}

// Database Connect
include_once "../db_connect.php";
$query="SELECT * from companies WHERE c_id = " . $_GET['c_id'];
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
?>



<div id="header" class="container">

	<hgroup class="mb20">
		<div class="row">
			<div class="col-md-8">
				<h1>Book Now</h1>
				<h1 class="text-primary"> <?php echo $row['c_name']; ?> <span style="color: black;" "> at cheaper rates with SyriaTravel.com </span> </h1>
			</div>

			<div class="col-md-3">
				<?php
					echo '<img src="../assets/images/companies/icons/' . $row['c_icon'] . '">'
				?>
			</div>
		</div>
	</hgroup>

</div>

<section class="tour section-wrapper container">

	<form role="form" action="search_flight_result.php">

	<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="input-group">
					<input type="text" class="form-control border-radius border-right" name="f_from" placeholder="Leaving from" required/>
				<span class="input-group-addon border-radius custom-addon">
					<i class="ion-ios-location"></i>
				</span>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="input-group">
						<input type="text" id="datepicker" class="form-control border-radius border-right" value="<?php echo date("Y-m-d") ?>"
							   name="f_departure_date" readonly="true" data-grip="rThdateFGrip" placeholder="Pick a date" required/>
									<span class="input-group-addon border-radius custom-addon">
										<i class="ion-ios-calendar"></i>
									</span>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="input-group">
					<input type="text" class="form-control border-radius border-right" name="f_to" placeholder="Going to" required/>
					<span class="input-group-addon border-radius custom-addon">
						<i class="ion-ios-location"></i>
					</span>
				</div>
			</div>

			<div id="return_date" class="col-md-3 col-sm-6 hidden">
				<div class="input-group">
					<input type="text" id="r_datepicker" class="form-control border-radius border-right" name="f_return_date"
						   value="<?php echo date("Y-m-d") ?>" readonly="true" data-grip="rThdateFGrip" placeholder="Pick a date" required/>
									<span class="input-group-addon border-radius custom-addon">
										<i class="ion-ios-calendar"></i>
									</span>
				</div>
			</div>

		</div>

		<div class="row">

			<div class="col-md-3 col-sm-6">
				<div class="form-group-lg">
					<select class="form-control" name="f_price" class="form-control input-lg" required>
						<option value="t_econ_price">Economy Class</option>
						<option value="t_first_price">First Price</option>
					</select>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="input-group">
					<div id="radioBtn" class="btn-group">
						<a class="btn btn-primary btn-lg active" data-toggle="ticket" data-title="one">
							One Way
						</a>
						<a class="btn btn-primary btn-lg notActive" data-toggle="ticket" data-title="round">
							Round Trip
						</a>
					</div>
					<input type="hidden" id="ticket_type" name="ticket_type" value="one">
				</div>
			</div>


			<div class="col-md-3 col-sm-6">
				<?php echo '<input type="hidden" name="c_id" value="' . $row['c_id'] . '">'; ?>
				<input type="submit" name="submit" value="Search" class="btn btn-primary btn-block btn-lg">
				<span class="glyphicon glyphicon-search">
				</div>
			</div>

		</div>

	</form>

</section>

<hr>

<section style="background-color:#f4f4f4">

	<div class="container" style="padding-bottom: 10%;padding-top: 3%">

		<pre style="background-color: white;margin-left: 0%;margin-right: 0%">
			<?php
				echo $row['c_details'];
			?>
		</pre>

	</div>


</section>


<!-- Footer -->

<?php
include "/layout/footer.php";
?>