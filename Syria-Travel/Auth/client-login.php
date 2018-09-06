
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
				<form action="login.php" method="post" class="form-group" >
					<?php

					if(isset($_GET['failed'])) {
						if($_GET['failed'] == 1){
							$str = '<h3> We couldn\'t sign you in. </h3>
							<strong>*  Email or password is incorrect </strong>';
						}
						elseif($_GET['failed'] == 2){
							$str = '<h3>Please Check your Email for activate your account.</h3>';
						}
						else{
							$str = '<h3> Your account has been activated.</h3>';
						}
						echo '
						<div class="alert alert-danger alert-dismissable text-center">
							' . $str . '
						</div>
						';
					}

					?>
					<h2 style="color: black"> Login </h2>
					<hr class="colorgraph">
					<div class="form-group">
						<input type="text" name="username" class="form-control input-lg" placeholder="Username" required>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<input type="password" name="password" class="form-control input-lg" placeholder="Password"  required>

							</div>
						</div>
					</div>
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-md-6"><input type="submit" value="Login" class="btn btn-primary btn-block btn-lg"></div>
						<div class="col-xs-12 col-md-6"><a href="signup.php" class="btn btn-success btn-block btn-lg"> Register </a></div>
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