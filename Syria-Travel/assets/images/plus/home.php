
<!-- Home -->
<div id="header" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
	 xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
	    <div class="flexslider">
		    <!-- Find a Tour -->
			<section class="tour section-wrapper intro container" >
				<div class="container">
					<h2 class="section-title" style="text-align: left;color: white;">
						Find a Tour
					</h2>
					<p class="section-subtitle " style="text-align: left;color: white">
						New Journey Begins here
					</p>

					<form role="form" action="Global/search_flight_result.php">

						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="input-group">
									<div id="radioBtn" class="btn-group">
										<a class="btn btn-primary btn-lg active" data-toggle="trip" data-title="f">
											<span class="glyphicon glyphicon-plane"></span> Flight
										</a>
										<a class="btn btn-primary btn-lg notActive" data-toggle="trip" data-title="t">
											<i class="ionicons ion-android-train"> </i> Train
										</a>
									</div>
									<input type="hidden" id="trip_type" name="c_type" value="f">
								</div>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="margin-left: 4%">
								<div class="input-group">
									<div id="radioBtn" class="btn-group">
										<a class="btn btn-primary btn-lg active" style="padding-left: 5px; padding-right: 5px"
										   data-toggle="ticket" data-title="one">
											<small> One Way </small>
										</a>
										<a class="btn btn-primary btn-lg notActive" style="padding-left: 5px; padding-right: 5px"
										   data-toggle="ticket" data-title="round">
											<small> Round Trip </small>
										</a>
									</div>
									<input type="hidden" id="ticket_type" name="ticket_type" value="one">
								</div>
							</div>
						</div><br>


						<div class="row">

							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="input-group">
									<input type="text" class="form-control border-radius border-right" name="f_from" placeholder="Leaving from" required/>
									<span class="input-group-addon border-radius custom-addon">
										<i class="ion-ios-location"></i>
									</span>
								</div>
							</div>


							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12" style="margin-left: 4%">
								<div class="input-group">
									<input type="text" id="datepicker" class="form-control border-radius border-right" value="<?php echo date("Y-m-d") ?>"
										   name="f_departure_date" readonly="true" data-grip="rThdateFGrip" placeholder="Pick a date"/>
									<span class="input-group-addon border-radius custom-addon">
										<i class="ion-ios-calendar"></i>
									</span>
								</div>
							</div>

						</div>

						<div class="row">

							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
								<div class="input-group">
									<input type="text" class="form-control border-radius border-right" name="f_to" placeholder="Going to" required/>
									<span class="input-group-addon border-radius custom-addon">
										<i class="ion-ios-location"></i>
									</span>
								</div>
							</div>

							<div id="return_date" class="col-lg-2 col-md-3 col-sm-3 col-xs-12 hidden" style="margin-left: 4%">
								<div class="input-group">
									<input type="text" id="r_datepicker" class="form-control border-radius border-right" name="f_return_date"
										   value="<?php echo date("Y-m-d") ?>" readonly="true" data-grip="rThdateFGrip" placeholder="Pick a date"/>
									<span class="input-group-addon border-radius custom-addon">
										<i class="ion-ios-calendar"></i>
									</span>
								</div>
							</div>

						</div><br>

						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group-lg">
									<select name="f_price" class="form-control input-lg" required>
										<option value="t_econ_price">Economy Class</option>
										<option value="t_first_price">First Price</option>
									</select>
								</div>
							</div>

							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12" style="margin-left: 4%">
								<input type="submit" name="submit" value="Search" class="btn btn-primary btn-block btn-lg">
							</div>
						</div>
					</form>
				</div>
			</section> <!-- /.tour -->
		</div> <!-- /.flexslider -->
	</div> <!-- /#header -->

<!-- Top International Destination -->
<?php

include "top_international.php";

?>

<!-- Top Local Destination -->
<?php

include "top_local.php";

?>

<!-- Top Airlines -->
<?php

include "top_airlines.php";

?>


<!-- Mobile App -->
    <section id="mobaileapps" class="mobailapps">
        <div>
            <div class="container">
                <div class="row">
                    <div class="main_mobail_apps_content">
                        <div class="col-md-7 col-sm-8 col-xs-12 text-center">
                             <img src="assets/images/plus/M_screen.png" alt="" />
                         </div>
                         <div class="col-md-5 col-sm-4 col-xs-12">
                             <div class="single_monail_apps_text">
                                 <h4> Happy to Announce </h4>
                                 <h1> our Application <span>Available in Play Store.</span></h1>
                                 <a href=""><img src="assets/images/plus/p_store.png" alt="" /></a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

