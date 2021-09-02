<!-- For the Dynamic Dependent Select Boxes -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--For the Slider-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- PHP for the Dynamic Dependent Select Boxes  -->
<?php 
	session_start();
    include_once 'db_connection.php'; 
    $query = "SELECT * FROM hotel"; 
    $result = $db->query($query); 
	$user = $_SESSION['user'];
	$paymenttype = $_SESSION['paymenttype'];
?>
<!-- Java Script for the Dynamic Dependent Select Boxes  -->
<script>
$(document).ready(function(){
var hotelId = '';
var guests = '';
var tableId = '';

	$('#guests').on('change', function(){ //if the Seats changes, load new Tables
		guests = $('#guests').val();
		hotelId = $('#hotel').val();
		
		if(hotelId){
            $.ajax({
                type:'POST',
                url:'reservation_ajaxData.php',
				data: {hotelId: hotelId, guests: guests},
                success:function(html){
                    $('#restauranttable').html(html);
                }
            });			
        }
	});
    $('#hotel').on('change', function(){ //if the Hotel changes, load new Tables
		hotelId = $('#hotel').val();
		guests = $('#guests').val();

        if(hotelId){
            $.ajax({
                type:'POST',
                url:'reservation_ajaxData.php',
				data: {hotelId: hotelId, guests: guests},
                success:function(html){
                    $('#restauranttable').html(html);
                }
            });
			document.getElementById("hotelId").value = $(this).val();			
        }else{
            $('#restauranttable').html('<option value="">Select hotel first</option>');
        }
    });
	$('#restauranttable').on('change', function(){
		document.getElementById("restauranttableId").value = $(this).val();			
    });
    
});
</script>

<!DOCTYPE html>
<html>
	<title>StarHotel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style_sliders.css">
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
		<h3>Tablereservation</h3>
		<p>The good taste of food, Just have a seat!</p>
	  </div>
	  
	  <div class="w3-row-padding">
		<form action="reservation_insert.php" method="post">

			<div class="w3-col m1">
				<label><i class="fa fa-male"></i> Seats</label>
				<select id="guests" name="guests" class="w3-input w3-border"  required>
					<option value="2" selected>2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			</div>
			<div class="w3-col m2">
				<!-- Hotel dropdown -->
				<label><i class="fa fa-home"></i> Hotel</label>
				<select id="hotel" class="w3-input w3-border" required>
					<option value="">Select Hotel</option>
					<?php 
					if($result->num_rows > 0){ 
						while($row = $result->fetch_assoc()){  
							echo '<option value="'.$row['hotelId'].'">'.$row['name'].'</option>'; 
						} 
					}else{ 
						echo '<option value="">Hotel not available</option>'; 
					} ?>
				</select>
			</div>
			
			<div class="w3-col m3">
				<label><i class="fa fa-coffee"></i> Table </label> <!-- From the Table Room -->
				<select id="restauranttable" class="w3-input w3-border" required>
					<option value="">Select Hotel first</option>
				</select>
			</div>

			<div class="w3-col m2">
			  <label><i class="fa fa-calendar-o"></i> Date and Time</label>
			  <input name="datetime" class="w3-input w3-border" type="text" placeholder="YYYY-MM-DD HH:MM:SS" required>
			</div>

			<div class="w3-col m2">
				<input id="restauranttableId" name="restauranttableId" class="form-control" type="hidden" value="tableNr" ><!-- restauranttableId -->
				<input id="hotelId" name="hotelId" class="form-control" type="hidden" value="hotelNr" ><!-- hotelId -->
				<input name="user" class="form-control" type="hidden" value="<?php echo $user ?>" ><!-- Username -->
				<input name="paymenttype" class="form-control" type="hidden" value="<?php echo $paymenttype ?>" ><!-- Paymenttype -->
			</div>
			<div class="w3-col m2">
				<button class="w3-button w3-right w3-black">Send Tablereservation</button>
			</div>
	  </form>
	  </div>

	   <h3 align="center" style="margin:50px">Feel Welcome!</h3>
		<!-- Sliders -->
		<div class="accordian">
			<ul>   
				<li><img src="https://p1.pxfuel.com/preview/609/792/1010/breakfast-buffet-sweet-food-gourmet-cake-restaurant.jpg"width="640px" /> </li>
				<li><img src="https://c0.wallpaperflare.com/preview/538/30/428/uruguay-colonia-del-sacramento-elegant-restaurant.jpg" width="640px"/> </li>
				<li><img src="https://p1.pxfuel.com/preview/786/370/483/buffet-indian-food-spices.jpg" width="640px"/> </li>
				<li><img src="https://cdn.pixabay.com/photo/2018/01/15/17/32/table-3084384_960_720.jpg" width="640px"/> </li>
			</ul>
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
