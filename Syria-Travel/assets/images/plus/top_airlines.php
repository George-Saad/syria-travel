<!-- Top Airlines -->

<div class="section-wrapper sponsor">
	<div class="container">
		<h2 class="section-title">
			Top Companies <br><br>
		</h2>
		<div class="owl-carousel sponsor-carousel">

<?php

if(!isset($conn)){
	include_once "db_connect.php";
}

$query = "SELECT r_company_id, COUNT(r_id) FROM `reservations` GROUP by r_company_id ORDER by COUNT(r_id) DESC LIMIT 6";
$result= mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($result)){
	$query1 = "select * from companies where c_id = " . $row['r_company_id'];
	$result1 = mysqli_query($conn,$query1);
	$row1 = mysqli_fetch_assoc($result1);

	echo '<div class="item">
				<a href="company.php?c_id=' . $row1["c_id"] .  '">
					<img src="assets/images/companies/icons/' . $row1["c_icon"] . '" alt="sponsor-brand" class="img-responsive sponsor-item">
				</a>
		  </div>';

}

?>



		</div> <!-- /.owl-carousel -->
	</div> <!-- /.container -->
</div> <!-- /.sponsor -->
