
<!-- Link -->
<?php
session_start();
if(!isset($_SESSION['client_id'])){
	header("Location: /Auth/signup.php");
}
include "layout/link.php";
// Database Connect
include "../db_connect.php";
?>

<title>Syria Travel SignUp</title>
</head>

<!-- Header -->

<?php
include "../assets/layout/client-header.php";

?>

<section id="header" class="section-wrapper contact-and-map intro">
	<div class="container-fluid" >

		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<h2 style="color: black">Your Notifications </h2>
				<hr class="colorgraph">
				<ul class="text-left" style="background-color: #f7f9f6; list-style-type:none">
					<?php
					$query= "SELECT * FROM `exchanging_message`, `companies` where m_company_id = c_id and m_client_id = " . $_SESSION['client_id'] .
						" ORDER by m_date,m_time DESC";
					$result= mysqli_query($conn,$query);
					while ($row = mysqli_fetch_assoc($result)){
						if($row['m_employee_id'] == NULL){
							echo '<li class="text-lowercase" style="color: #000000;">
									  	<a href="my-reservations-c.php">
									  		<img src="../assets/images/companies/icons/' . $row['c_icon'] .  '"  width="60" height="60" alt="icon " /> 
									  		<strong class="text-uppercase" >' . $row["c_name"] . '</strong> 
									  		<small>has updated the trip you booked in.</small> <br>
									  		
									  	</a>		
									  </li><hr style="padding: 0px ;margin: 0px;">';

						}
						else{
							echo '<li class="text-lowercase" style="color: #000000;">
										<a href="message-content.php?m_id=' . $row['m_id'] . '">
									  		<img src="../assets/images/companies/icons/' . $row['c_icon'] .  '"  width="60" height="60" alt="icon " /> 
									  		<strong class="text-uppercase" >' . $row["c_name"] . '</strong> 
									  		<small>replied to your request. </small>
									  		
									  	</a>
									  </li><hr style="padding: 0px ;margin: 0px;">';
						}
					}
					?>
				</ul>
			</div>
		</div>

	</div>
</section>



<!-- Footer -->

<?php
include "layout/footer.php";
?>