
<!-- Link -->

<?php

include "layout/link.php";

?>

<title>Syria Travel SignUp</title>
</head>

<!-- Header -->

<?php

include "../assets/layout/header.php";

?>

<section id="header" class="section-wrapper contact-and-map">
	<div class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form action="register.php" method="post" class="form-group" >
				<h2 style="color: black">Please Sign Up <small>It's free and always will be.</small></h2>
					<hr class="colorgraph">

					<div class="form-group">
						<input type="text" name="client_username" id="client_username" class="form-control input-lg" placeholder="Username"
							   	data-validation="required length custom server" data-validation-length="max25" data-validation-regexp="^[a-zA-Z0-9_]+$"
							    data-validation-url="validate-signup.php"
							    data-validation-error-msg="Uername can't contain special characters , and must be less than 25 ." >
					</div>
					<div class="form-group">
						<input type="email" name="client_email_phone" id="lient_email_phone" class="form-control input-lg" placeholder="Email Address "
							   data-validation="required" >
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="client_password" id="password" class="form-control input-lg" placeholder="Password"
									   data-validation="required length custom" data-validation-length="8-25"
									   data-validation-regexp="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$"
									   data-validation-error-msg="
									    Contain 8-25 characters <br>
										contain at least 1 number <br>
										contain at least 1 lowercase character <br>
										contain at least 1 uppercase character <br>
										contains only 0-9a-zA-Z
									   " >

							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="client_password_confirmation" id="password_confirmation" class="form-control input-lg"
									   placeholder="Confirm Password" data-validation="confirmation" data-validation-confirm="client_password">

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 col-sm-3 col-md-3">
							<span class="button-checkbox">
								<button type="button" class="btn" data-color="info" tabindex="9" >I Agree</button>
								<input type="checkbox" id="t_and_c" name="t_and_c" id="t_and_c" class="" value="0"
									   data-validation="required" data-validation-error-msg="You have to Agree our terms to continue" >
							</span>
						</div>
						<div class="text-muted col-xs-8 col-sm-9 col-md-9">
							By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
						</div>
					</div>

					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg"></div>
						<div class="col-xs-12 col-md-6"><a href="client-login.php" class="btn btn-success btn-block btn-lg">Login</a></div>
					</div>
				</form>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
					</div>
					<div class="modal-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
					</div>
					<div class="modal-footer">
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
</section>



<!-- Footer -->

<?php
include "layout/footer.php";
?>