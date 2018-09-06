
<!-- Link -->

<?php
session_start();
include "layout/link.php";

?>

<style>

	.features{
		background: #f9f9f9;
	}
	.features .custom-button{
		display: inline;
	}

	.grid-50{
		width: 40%;
		padding: 15px;
		margin: -15px;
		position: relative;
		height: auto;
	}

	.table-cell{
		display: table-cell;
		vertical-align: middle;
	}

	ul.features-list li {
		padding: 0;
		margin-left: -15px;
		list-style-type: none;
		color: #969595;
	}

	ul.features-list li:before
	{
		content: "\f24e";
		font-family: 'ionicons';
		color: #60c9eb;
		margin-left: -5px;
		padding-right: 10px;
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


?>

section> <!-- /.section-background -->

<section class="features section-wrapper">
	<div class="container">
		<h2 class="section-title" style="text-align: left">
			Features
		</h2>
		<p class="section-subtitle" style="text-align: left">
			Android application for smarter use.
		</p>
		<div class="row custom-table" style="margin-top: -12%">
			<div class="grid-50 table-cell">
				<p class="features-details">
					Compare travel options from hundreds of travel sites on one simple screen!
				</p>
				<ul class="features-list">
					<li>Compatible with android 4.0.3</li>
					<li>Search for flights and wild in one app!</li>
					<li>We've made it even easier for you to find the best deals online!</li>
				</ul>
				<br>
				<a href="#" class="btn btn-default custom-button border-radius">
					Download
				</a>
			</div>

			<div class="grid-50 table-cell">
				<img src="../assets/images/plus/M_screen.png" alt="" class="features-img img-responsive _pos-abs">
			</div>
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</section> <!-- /.features -->


<!-- Footer -->

<?php
// header("Content-type: application/pdf");
//header("Content-Disposition: attachment; filename='syria-travel.pdf');

include "layout/footer.php";
?>