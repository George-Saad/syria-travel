
<!-- Link -->

<?php

include "layout/link.php";

?>

<title>Syria Travel SignUp</title>
</head>

<style>

	.table {
		border-bottom:0px !important;
	}
	.table th, .table td {
		border: 1px !important;
	}

	.fixed-table-container {
		border:0px !important;
	}

</style>
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

$f_from =  $_GET['f_from'];
$f_to =  $_GET['f_to'];
$f_price = $_GET['f_price'];
$f_departure_date =  $_GET['f_departure_date'];
$f_return_date = $_GET['f_return_date'];
if(isset($_GET['c_type'])){
	$c_type = $_GET['c_type'];
}

if(isset($_GET['c_id'])){
	$c_id = $_GET['c_id'];
	$query1 = "select * from companies where c_id = " . $c_id;
	$result1= mysqli_query($conn,$query1);
	$row = mysqli_fetch_assoc($result1);
	$c_type = $row['c_type'];
	$query= "SELECT * FROM `trip_info`,companies WHERE t_company_id=c_id and c_id=" . $c_id . " AND t_status='available' AND T_from like 
	'%" . $f_from ."%' AND t_to like '%" . $f_to ."%'  AND t_departure_date = '" . $f_departure_date . "'";
}
else{
	$query= "SELECT * FROM `trip_info`,companies WHERE t_company_id=c_id and c_type = '" . $c_type . "' and t_status='available' AND t_from like '%" . $f_from ."%' AND t_to
	 like '%" . $f_to ."%' AND t_departure_date = '" . $f_departure_date . "'";
}

$query1= "SELECT * FROM `trip_info`,companies WHERE t_company_id=c_id and t_status='available' AND t_from like '%" . $f_to ."%' AND t_to like
 		  '%" . $f_from ."%' AND t_departure_date = '" . $f_return_date . "'";

$result= mysqli_query($conn,$query);
$result1= mysqli_query($conn,$query1);
?>

<div id="header" class="container">

	<hgroup class="mb20">
		<h1>Search Results</h1>
		<h2 class="lead"><strong class="text-primary"><?php  echo "$result->num_rows "; ?></strong> results were found for the search</h2>
	</hgroup>


	<section class="section-wrapper col-xs-12 col-sm-6 col-md-12">

		<?php

		if($c_type == 'f'){
			$glyph = '<span style="color:#248dc1" class="glyphicon glyphicon-plane gly-rotate-90"> </span>';
			$glyph_l = '<span class="glyphicon glyphicon-plane gly-rotate-45" style="color: #ff6c00"></span> Take Off </i>';
			$glyph_a = '<span class="glyphicon glyphicon-plane gly-rotate-135" style="color: #ff6c00"> </span> Landing </i>';
			$glyph_d = '<span style="color:#248dc1" class="glyphicon glyphicon-plane gly-rotate-270"> </span> ';
		}
		else{
			$glyph = '<i style="color:#248dc1" class="ionicons ion-android-train"> </i>';;
			$glyph_l = '<span style="color: #ff6c00" class="ionicons ion-android-train"> </span> Leaving </i>';
			$glyph_a = '<span style="color: #ff6c00" class="ionicons ion-android-train">  </span> Arrival </i>';
			$glyph_d = '<span style="color:#248dc1" class="ionicons ion-android-train"> </span> ';
		}

		while ($row = mysqli_fetch_assoc($result)){
			while ($row1 = mysqli_fetch_assoc($result1)) {
					if ($row['c_id'] == $row1['c_id']) {

						$d_day  = DateTime::createFromFormat('Y-m-d', $row['t_departure_date']);
						$d_day1 = DateTime::createFromFormat('Y-m-d', $row1['t_departure_date']);

						$price = $row[$f_price] + $row1[$f_price] - $row['t_round_sold'] - $row['t_round_sold'];
						echo ' 
 							<article class="search-result row" style="background-color: #eeeeee;">
								<div class="col-xs-12 col-sm-6 col-md-2 excerpet" style="background-color: white">
									<h6 style="text-align: center">
										<img src="../assets/images/companies/icons/' . $row['c_icon'] . '"  width="100" height="80" alt="icon " />
									</h6>
									<a href="../company.php?c_id=' . $row['c_id'] . '" > <h5 class="text-muted text-center">' . $row['c_name'] . ' </h5> </a>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-2" >
									<ul class="meta-search">
										<h3 style="padding-top: 10%">	
											<li> ' . $glyph . ' 
											<span class="text-primary"> Departure </span>	</li>
										</h3>									
										<h3>	
											<li>	<i class="glyphicon glyphicon-calendar">	</i> 
											<span class="text-primary"> ' . $row['t_departure_date'] . ' </span>	</li>
										</h3>
										<span class="plus"><a data-target="#'. $row["t_id"] .'" class="accordion-toggle" 
										data-toggle="collapse" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>	
									</ul>
									<ul class="meta-search">
										<h3 style="padding-top: 10%">	
											<li> ' . $glyph_d . ' 
											<span class="text-primary"> Return </span>	</li>
										</h3>									
										<h3>	
											<li>	<i class="glyphicon glyphicon-calendar">	</i> 
											<span class="text-primary"> ' . $row1['t_departure_date'] . ' </span>	</li>
										</h3>
										<span class="plus"><a data-target="#r'. $row["t_id"] .'" class="accordion-toggle" 
										data-toggle="collapse" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>	
									</ul>
									
								</div>
								
								<div class="col-xs-12 col-sm-12 col-md-8 excerpet">
					
									<table class="table">
										<thead>
											<tr >
												<th> 
													<h3 style="color: #585858;padding-top: 10%;font-weight: bold"> ' . $row['t_from'] . ' </h3>  
												</th>
												<th> 
													<h3 style="color: #585858;font-weight: bold"> ' . $row['t_to'] . ' </h3>  
												</th>
												<th> 
													<p> <i class="glyphicon glyphicon-briefcase"></i>
													<span style="color: grey"> ' . $row['t_total_weight_value'] . ' KGs <small>(Per Person)</small>  </span> </p> 
												</th>
												<th>

												</th>
											</tr>
										</thead>
										<thead>
											<tr>
												<th>
													<p style="color: grey;"> <i class="text-info" > 
													' . $glyph_l . '
													<br> <small> ' . $d_day->format('D ') .  date('h:i  a ', strtotime($row['t_departure_time'])) . '  </small>
													</p>
												</th>
												<th>
													<p style="color: grey;">
														<i class="text-info" > ' . $glyph_a . '
														<br>	<small> ' . $d_day->format('D ') .  date('h:i  a ', strtotime($row['t_arrival_time'])) . ' </small>
													</p>
												</th>
												<th>
													<p style="color: grey;">
														<i class="text-info" > <span class="glyphicon glyphicon-time" style="color: #ff6c00"></span>
														 Time </i> <br>	<small> ' . (int)substr($row['t_duration'], 0, -6) . ' Hours, 
														 ' . (int)substr($row['t_duration'], 3, -3) . ' Minutes </small>
													</p>
												</th>
												<th>
													<h3 style="color: #ff6c00; text-align: center;padding-top: 10%;font-weight: bold"> $
													' . $price . ' <small> (Per Person) </small></h3>
												</th>
											</tr>
											
											<tr>
											<td class="hiddenRow" colspan="12"><div class="accordian-body collapse" id="'. $row["t_id"] .'"> 
												<table class="table table-striped">
													  <thead>
															<tr class="text-info">
				
																<th> Economy Price </th>
																<th> First Class Price </th>
																<th> Children Price </th>
																<th> Round Trip Sold </th>
																<th> Extra Weight </th>
															</tr>      
													  </thead>
													  <tbody>
														<tr class="text-muted">
																<th> '. $row["t_econ_price"] .' $</th>
																<th> '. $row["t_first_price"] .'  $</th>
																<th> '. $row["t_child_price"] .'  $</th>
																<th> '. $row["t_round_sold"] .' $</th>
																<th> '. $row["t_extra_weight_price"] .' . $/KG </th>
														</tr>
													  </tbody>
													  <thead>
															<tr class="text-info">
																<th> Status </th>
																<th> Available Economy Seats </th>
																<th> Available First Seats </th>
															</tr>      
													  </thead>
													  <tbody>
														<tr class="text-muted">
																<th> '. $row["t_status"] .'  </th>
																<th> '. $row["t_econ_seats"] .' </th>
																<th> '. $row["t_first_seats"] .'  </th>
														</tr>
													  </tbody>
												</table>
											  
											  </div> 
											</td>
                        				</tr>
											
										</thead>
										

										</thead>
										
										<thead>
											<tr >
												<th> 
													<h3 style="color: #585858;padding-top: 10%;font-weight: bold"> ' . $row1['t_from'] . ' </h3>  
												</th>
												<th> 
													<h3 style="color: #585858;font-weight: bold"> ' . $row1['t_to'] . ' </h3>  
												</th>
												<th> 
													<p> <i class="glyphicon glyphicon-briefcase"></i>
													<span style="color: grey"> ' . $row1['t_total_weight_value'] . ' KGs <small>(Per Person)</small>  </span> </p> 
												</th>
												<th>

												</th>
											</tr>
										</thead>
										<thead>
											<tr>
												<th>
													<p style="color: grey;"> <i class="text-info" > 
													' . $glyph_l . '
													<br> <small>' . $d_day1->format('D ') .  date('h:i  a ', strtotime($row1['t_departure_time'])) . ' </small>
													</p>
												</th>
												<th>
													<p style="color: grey;">
														<i class="text-info" > ' . $glyph_a . '
														<br>	<small> ' . $d_day1->format('D ') .  date('h:i  a ', strtotime($row1['t_arrival_time'])) . ' </small>
													</p>
												</th>
												<th>
													<p style="color: grey;">
														<i class="text-info" > <span class="glyphicon glyphicon-time" style="color: #ff6c00"></span>
														 Time </i> <br>	<small> ' . (int)substr($row1['t_duration'], 0, -6) . ' Houres, 
														 ' . (int)substr($row1['t_duration'], 3, -3) . ' Minutes </small>
													</p>
												</th>
												<th>
													<a href="/Client/reservation-info.php?f_id=' . $row['t_id'] . '&f_id2=' . $row1['t_id'] .
															 '&f_company_id=' . $row['t_company_id'] . '&r_type=' . $f_price . '&ticket_type=r">	
														<button class="btn btn-primary custom-button">	<b> Book Now </b> </button> 
													</a>
												</th>
											</tr>
											
											<tr>
											<td class="hiddenRow" colspan="12"><div class="accordian-body collapse" id="r'. $row["t_id"] .'"> 
												<table class="table table-striped">
													  <thead>
															<tr class="text-info">
				
																<th> Economy Price </th>
																<th> First Class Price </th>
																<th> Children Price </th>
																<th> Round Trip Sold </th>
																<th> Extra Weight </th>
															</tr>      
													  </thead>
													  <tbody>
														<tr class="text-muted">
																<th> '. $row1["t_econ_price"] .' $</th>
																<th> '. $row1["t_first_price"] .'  $</th>
																<th> '. $row1["t_child_price"] .'  $</th>
																<th> '. $row1["t_round_sold"] .' $</th>
																<th> '. $row1["t_extra_weight_price"] .' . $/KG </th>
														</tr>
													  </tbody>
													  <thead>
															<tr class="text-info">
																<th> Status </th>
																<th> Available Economy Seats </th>
																<th> Available First Seats </th>
															</tr>      
													  </thead>
													  <tbody>
														<tr class="text-muted">
																<th> '. $row1["t_status"] .'  </th>
																<th> '. $row1["t_econ_seats"] .' </th>
																<th> '. $row1["t_first_seats"] .'  </th>
														</tr>
													  </tbody>
												</table>
											  
											  </div> 
											</td>
                        				</tr>
											
										</thead>
									</table>
								</div>
					
							</article>
							<hr>		
						';
					}
					break;
			}
		}

		?>


	</section>
</div>

<!-- Footer -->

<?php
include "/layout/footer.php";
?>
