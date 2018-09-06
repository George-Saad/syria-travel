
<?php
session_start();
if(!isset($_SESSION['client_id'])){
	header("Location: /Auth/signup.php");
}
// -- Link -- //

include "layout/link.php";

?>

<title>Syria Travel</title

</head>

<?php
// -- DataBase -- //
include_once "../db_connect.php";
$client_id = $_SESSION['client_id'];
// -- Header -- //
include_once "../assets/layout/client-header.php";

?>

<section id="header" class="section-wrapper contact-and-map">
	<div class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form action="reserve.php" method="post" class="form-group" >
				<h2 style="color: black">Please Enter Your Informations</h2>
					<hr class="colorgraph">

					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="r_client_fname" id="r_client_fname" class="form-control input-lg" placeholder="First Name"
										data-validation="required length custom" data-validation-length="max20" data-validation-regexp="^[a-zA-Z ]+$" >
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="r_client_lname" id="r_client_lname" class="form-control input-lg" placeholder="Last Name"
									   data-validation="required length custom" data-validation-length="max20" data-validation-regexp="^[a-zA-Z ]+$" >
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="r_client_country" id="r_client_country" class="form-control input-lg" placeholder="Country"
									   data-validation="required length custom" data-validation-length="max25" data-validation-regexp="^[a-zA-Z ]+$" >
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="r_client_city" id="r_client_city" class="form-control input-lg" placeholder="City"
									   data-validation="required length custom" data-validation-length="max25" data-validation-regexp="^[a-zA-Z ]+$" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="r_client_national_number" id="r_client_national_number" class="form-control input-lg" placeholder="National Number"
									   data-validation="required length custom" data-validation-length="max25" data-validation-regexp="^[0-9]+$" >
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="r_client_email_phone" id="r_client_email_phone" class="form-control input-lg" placeholder="Phone Number"
									   data-validation="required length custom" data-validation-length="max25" data-validation-regexp="^[0-9]+$" >
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<select name="r_adult_num" class="form-control input-lg" required>
										<option value="1"> Adult 1 </option>
										<option value="2"> Adult 2 </option>
										<option value="3"> Adult 3 </option>
										<option value="4"> Adult 4 </option>
										<option value="5"> Adult 5 </option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<select name="r_children_num" class="form-control input-lg" required>
										<option value="0"> Child 0 </option>
										<option value="1"> Child 1 </option>
										<option value="2"> Child 2 </option>
										<option value="3"> Child 3 </option>
										<option value="4"> Child 4 </option>
										<option value="5"> Child 5 </option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<select name="r_extra_weight_value" class="form-control input-lg" required>
										<option value="0"> Extra Weight 0 KG </option>
										<option value="1"> Extra Weight 1 KG </option>
										<option value="2"> Extra Weight 2 KG </option>
										<option value="3"> Extra Weight 3 KG </option>
										<option value="4"> Extra Weight 4 KG </option>
										<option value="5"> Extra Weight 5 KG </option>
									</select>
								</div>
							</div>
						</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<img src="../assets/images/plus/credit.png" class="img-rounded" height="100%" width="100%">
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<h5 class="text-muted"> Credit Card Number</h5>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3">
							<input type="text" class="form-control" placeholder="0000" />
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3">
							<input type="text" class="form-control" placeholder="0000" />
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3">
							<input type="text" class="form-control" placeholder="0000" />
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3">
							<input type="text" class="form-control" placeholder="0000" />
						</div>
					</div>

					<div class="row ">
						<div class="col-md-3 col-sm-3 col-xs-3">
							<span class="help-block text-muted small-font"> Expiry Day</span>
							<input type="text" class="form-control" placeholder="DD" />
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3">
							<span class="help-block text-muted small-font"> Expiry Month</span>
							<input type="text" class="form-control" placeholder="MM" />
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3">
							<span class="help-block text-muted small-font">  Expiry Year</span>
							<input type="text" class="form-control" placeholder="YY" />
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3">
							<span class="help-block text-muted small-font">  CCV</span>
							<input type="text" class="form-control" placeholder="CCV" />
						</div>
					</div>

					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-md-6"><input type="submit" value="Submit" class="btn btn-warning btn-block btn-lg"></div>
						<div class="col-xs-12 col-md-6"><button class="btn btn-danger btn-block btn-lg" onclick="history.go(-1);"> Cancel </button></div>
						<input type="text" class="hidden" name="r_flight_id" value="<?php echo $_GET['f_id']?>">
						<input type="text" class="hidden" name="r_company_id" value="<?php echo $_GET['f_company_id']?>">
						<input type="text" class="hidden" name="r_type" value="<?php echo $_GET['r_type']; ?>">
						<input type="text" class="hidden" name="ticket_type" value="<?php echo $_GET['ticket_type']?>">
						<input type="text" class="hidden" name="r_flight_id2" value="<?php if(isset($_GET['f_id2'])){
							echo $_GET['f_id2'];
						}
						else{
							echo "NULL";
						}?>">
					</div>
				</form>

			</div>
		</div>
	</div>
</section>



<!-- Footer -->

<?php
include "layout/footer.php";
?>