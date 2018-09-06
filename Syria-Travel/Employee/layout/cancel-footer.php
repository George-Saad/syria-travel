<!-- Footer  -->

<footer class="hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6 footerleft ">
				<div class="logofooter" style="color: #60c9eb;"> <i class="ion-paper-airplane"></i> Syria <span style="color: #58120a;">Travel</span></div>
				<p><i class="fa fa-phone"></i> Phone (Syria) : +963 933802782</p>
				<p><i class="fa fa-envelope"></i> E-mail : syria_travel@hotmail.com</p>
			</div>

			<div class="col-md-2 col-sm-6 paddingtop-bottom">
				<ul class="footer-ul" style="align-items: ">
					<li><a href="#"> Privacy Policy</a></li>
					<li><a href="#"> Terms & Conditions</a></li>
				</ul>
				<p class="fa fa-envelope" style="color: white"> &copy; Al_Baath University</p>
			</div>

			<div class="col-md-3 col-sm-6 paddingtop-bottom">
				<ul class="social-icon">
					<li><a href="#"><i class="ion-social-facebook"></i></a></li>
					<li><a href="#"><i class="ion-social-twitter"></i></a></li>
					<li><a href="#"><i class="ion-social-linkedin-outline"></i></a></li>
					<li><a href="#"><i class="ion-social-googleplus"></i></a></li>
				</ul>
			</div>

			<div class="col-md-3 col-sm-6 paddingtop-bottom">
				<a href="#"><img class="app_store" src="../assets/images/plus/f_store.png" alt="Get it on Google Play" /></a>
				<div class="top">
					<a href="#header" class="btn">
						<span class="glyphicon glyphicon-arrow-up"></span>
					</a>
				</div>
			</div>

		</div>
	</div>
</footer>


<script src="../assets/js/jquery.flexslider.js"></script>
<script src="../assets/js/jquery-1.11.2.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/bootstrap-datepicker.js"></script>
<script src="../assets/js/script.js"></script>
<script type="text/javascript">
	
	t = setInterval(function() {
		$('#l2').load('load-cancel.php');
	}, 3000);

	var running = true;

	function pause(i) {
		clearInterval(t);
		running = !running;
		if (!running)
			return;

		t = setInterval(function() {
			$('#l2').load('load-cancel.php');
		}, 3000);

	}
</script>
<?php
if(isset($conn)){
	mysqli_close($conn);
}
?>

</body>
</html>
