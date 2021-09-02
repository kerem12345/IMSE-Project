<!-- links the image-effects -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
	session_start();
	//echo 'test' . $_SESSION['user'];
	//if(!isset($user)){
	//	header('location:login.php')
	//}
?>




<!DOCTYPE html>
<html>
	<title>StarHotel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style_images.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
	</style>
	<body class="w3-light-grey">

	<!-- Navigation Bar -->
	<div class="w3-bar w3-white w3-large">
	  <a href="#" class="w3-bar-item w3-button w3-white w3-mobile"> <!--Logo -->
		<img class="w3-image" src="img/logo.jpg" alt="The Hotel" width="15%" height="15%"></a>
	  <a href="soon.php" class="w3-bar-item w3-button w3-mobile">MyBookings</a>
	  <a href="booking.php" class="w3-bar-item w3-button w3-mobile">Rooms</a>
	  <a href="reservation.php" class="w3-bar-item w3-button w3-mobile">Restaurant</a>
	  <a href="soon.php" class="w3-bar-item w3-button w3-mobile">Conference</a>
	  <a href="logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
	</div>
	<!-- Header -->
	<header class="w3-display-container w3-content" style="max-width:1500px;"> </header>

	<!-- Page content -->
	<div class="w3-content" style="max-width:1532px;">
		<div class="w3-container w3-margin-top" id="rooms">
			<h3 align="center" style="margin:50px">Hello <?php echo $_SESSION['firstname']." ".$_SESSION['lastname']."!" ?> </h3>
		
			<h4>Feel Welcome. Best Rates Guaranteed at StarHotels. </h4>
			<p>Get inspired and book your Hotel here. StarHotels tucks inspiration around every corner. 
			We relieve stressors and anticipate every need of our guests to stimulate new ideas. 
			Because when our minds can travel, inspiration follows. </p>
		</div>
		

		<div class="container-fluid topDest">
			<div class="container">
				<div class="">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<a href="booking.php" data-toggle="modal" class="destLinks">
							<div class="destiBoxWrap">
								<img src="https://p1.pxfuel.com/preview/779/613/208/hotel-room-curtain-green.jpg" alt="Image" title="Project" class="img-responsive width100">
								<div class="destiBox hangBox">
									<h4>Enjoy your time and relax</h4>
									<button class="btn btn-black">Roombooking</button>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<a href="reservation.php" data-toggle="modal" class="destLinks">
							<div class="destiBoxWrap">
								<img src="https://cdn.pixabay.com/photo/2018/01/15/17/32/table-3084384_960_720.jpg" alt="Image" title="Project" class="img-responsive width100">
								<div class="destiBox hangBox">
									<h4 class="col1">Meet up, catch up, have a laugh</h4>
									<button class="btn btn-black">Tablereservation </button>
								</div>
							</div>
						</a>
					</div>
				   
					<div class="col-md-4 col-sm-6 col-xs-12">
						<a href="rental.php" data-toggle="modal" class="destLinks">
							<div class="destiBoxWrap">
								<img src="https://cdn.pixabay.com/photo/2015/05/15/14/22/conference-room-768441_960_720.jpg" alt="Image" title="Project" class="img-responsive width100">
								<div class="destiBox hangBox">
									<h4>Connect for Business</h4>
									<button class="btn btn-black">Conferenceroom Rental</button>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

  
  
  

	</div>
	<div class="w3-container" id="contact">
		<h2>Contact</h2>
		<p>If you have any questions, do not hesitate to ask them.</p>
		<i class="fa fa-map-marker w3-text-red" style="width:30px"></i> Vienna, AUT<br>
		<i class="fa fa-phone w3-text-red" style="width:30px"></i> Phone: +00 151515<br>
		<i class="fa fa-envelope w3-text-red" style="width:30px"> </i> Email: mail@mail.com<br>
	</div>

	<!-- End page content -->

	<!-- Footer -->
	<footer class="w3-padding-32 w3-black w3-center w3-margin-top">
	  <h5>Find Us On</h5>
	  <div class="w3-xlarge w3-padding-16">
		<i class="fa fa-facebook-official w3-hover-opacity"></i>
		<i class="fa fa-instagram w3-hover-opacity"></i>
		<i class="fa fa-snapchat w3-hover-opacity"></i>
		<i class="fa fa-pinterest-p w3-hover-opacity"></i>
		<i class="fa fa-twitter w3-hover-opacity"></i>
		<i class="fa fa-linkedin w3-hover-opacity"></i>
	  </div>
	</footer>

</body>
</html>
