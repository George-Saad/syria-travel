
<!-- Link -->

<?php
session_start();
include "layout/link.php";

?>

<style>

	.section-background{
		background-repeat: no-repeat;
		background-position: bottom;
		background-attachment: fixed;
		text-transform: uppercase;
		background: url('../assets/images/section-header.png');
		text-align: center;
		background-size: cover;
	}

	.page-header{
		text-transform: uppercase;
		color: #fff;
		font-weight: 200;
		border-bottom: none;
		padding-top: 85px;
		padding-bottom: 40px;
		font-size: 34px;
	}

	.section-title{
		text-align: left;
	}
	.section-subtitle{
		padding-left: 1%;
		text-align: left;
		font-size: large;
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

<!-- Section Background -->
<section class="section-background">
	<div class="container">
		<h2 class="page-header">
			About Us
		</h2>

	</div> <!-- /.container -->
</section> <!-- /.section-background -->


<!-- Who we are -->
<section class="wwa section-wrapper intro">
	<div class="container">
        <div class="alert alert-info alert-dismissable">
            <a class="panel-close close" data-dismiss="alert">×</a>
            <i class="fa fa-coffee"></i>
            <strong class="text-warning">
                We recommend browsing this website from a computer until we finish transforming all the UX design to mobile friendly
            </strong>
        </div>
		<h2 class="section-title">
			Syria Travel
		</h2>
		<p class="section-subtitle">
            is an information system for managing flights and wild trips.<br>
            This project was made for a study in the 4th year at AL_Baath university Supervised by
            Dr. Shadi Shammas.
            <br><br>
            This project was made for study reasons and all the companies and the trips are virtual things.
            <br><br>
            You can try searching for a trip directly (there is a trip from Damascus to Dubai and from Dubai to Damascus on the last two days from the mounth)
            <br>
            -ex. if you in May 30/31-
            <br><br>
            To view all the features you can sign in as (company, employee, and client) and try to make reservaion,
            <br><br>
            To Sign in as:
            <br>
            Company (username: Company_1 | password: company_1)
            <br>
            Employee (username: employee_1 | password: employee_1)
            <br>
            Client (username: client_1 | password: client1CLIENT)
		</p>
	</div> <!-- /.container -->
</section> <!-- /.wwa -->


<!-- Footer -->

<?php
include "layout/footer.php";
?>