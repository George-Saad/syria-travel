
<!-- Link -->
<?php
include "layout/link.php";

?>

<title>Syria Travel SignUp</title>
</head>

<!-- Header -->

<?php
include "../assets/layout/client-header.php";
// Database Connect
include "../db_connect.php";
$query="SELECT * from exchanging_message, companies WHERE m_company_id = c_id and m_id = " . $_GET['m_id'];
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
?>

<section id="header" class="section-wrapper contact-and-map">
	<div class="container-fluid" >

		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" style="background-color:#f4f4f4; padding-bottom: 10%;padding-top: 3%">
				<h2 style="color: black"><?php echo $row['c_name']; ?> <small style="color: black"> replied to your request.</small></h2>
				<hr class="colorgraph">
			<pre style="background-color: white;margin-left: 0%;margin-right: 0%">
			<?php
				echo $row['m_details'];
			?>
		</pre>
			</div>
		</div>

	</div>
</section>



<!-- Footer -->

<?php
include "layout/footer.php";
?>