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
var roomId = '';
var CheckIn = '';
var CheckOut = '';

	$('#guests').on('change', function(){ //if the Guests changes, load new Rooms
		guests = $('#guests').val();
		hotelId = $('#hotel').val();
		CheckIn = $('#CheckIn').val();
		CheckOut = $('#CheckOut').val();
		
		if(hotelId){
            $.ajax({
                type:'POST',
                url:'booking_ajaxData.php',
				data: {hotelId: hotelId, guests: guests},
				//data: {hotelId: hotelId, guests: guests, CheckIn: CheckIn, CheckOut: CheckOut},
                success:function(html){
                    $('#room').html(html);
                    $('#guestroom').html('<option value="">Select Room first</option>'); 
                }
            }); 
        }
	});
    $('#hotel').on('change', function(){ //if the Hotel changes, load new Rooms
		hotelId = $('#hotel').val();
		guests = $('#guests').val();
		CheckIn = $('#CheckIn').val();
		CheckOut = $('#CheckOut').val();

        if(hotelId){
            $.ajax({
                type:'POST',
                url:'booking_ajaxData.php',
				data: {hotelId: hotelId, guests: guests},
				//data: {hotelId: hotelId, guests: guests, CheckIn: CheckIn, CheckOut: CheckOut},
                success:function(html){
                    $('#room').html(html);
                    $('#guestroom').html('<option value="">Select Room first</option>'); 
                }
            }); 
        }else{
            $('#room').html('<option value="">Select hotel first</option>');
            $('#guestroom').html('<option value="">Select Room first</option>'); 
        }
    });
    
    $('#room').on('change', function(){
        roomId = $(this).val();
        if(roomId){
            $.ajax({
                type:'POST',
                url:'booking_ajaxData.php',
                data:'roomId='+roomId,
                success:function(html){
                    $('#guestroom').html(html);
                }
            });
			document.getElementById("guestroomId").value = $(this).val();			
        }else{
            $('#guestroom').html('<option value="">Select Room first</option>'); 
        }
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
			<h4>Book a Room and leave the rest to us.</h4>
			<p>Change your view & relax, it’s StarHotel. Hotels with personality.</p>

		</div>

		<div class="w3-row-padding">
		<form action="booking_insert.php" method="post">

			<div class="w3-col m1">
				<label><i class="fa fa-male"></i> Guests</label>
				<select id="guests" name="guests" class="w3-input w3-border"  required>
					<option value="1">1</option>
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
				<label><i class="fa fa-euro"></i> Price </label> <!-- From the Table Room -->
				<select id="room" class="w3-input w3-border" required>
					<option value="">Select Hotel first</option>
				</select>
			</div>
			<div class="w3-col m2">
				<label><i class="fa fa-bed"></i> Bookingrate</label>
				<select name="flexibleRate" id="flexibleRate" class="w3-input w3-border" required>
					<option value="1">flexible</option>
					<option value="0">non-flexible</option>
				</select>
			</div>

			<div class="w3-col m2">
			  <label><i class="fa fa-calendar-o"></i> Check In</label>
			  <input name="CheckIn" name="CheckIn" class="w3-input w3-border" type="text" placeholder="YYYY-MM-DD" required>
			</div>
			<div class="w3-col m2">
			  <label><i class="fa fa-calendar-o"></i> Check Out</label>
			  <input name="CheckOut" name="CheckOut" class="w3-input w3-border" type="text" placeholder="YYYY-MM-DD" required>
			</div>

			<div class="w3-col m2"><!-- guestroomId -->
				<input id="guestroomId" name="guestroomId" class="form-control" type="hidden" value="roomNr" >
			</div>
			<div class="w3-col m2"><!-- Username -->
				<input name="user" class="form-control" type="hidden" value="<?php echo $user ?>" >
			</div>
			<div class="w3-col m2"><!-- Paymenttype -->
				<input name="paymenttype" class="form-control" type="hidden" value="<?php echo $paymenttype ?>" >
			</div>

			<div class="w3-col w3-center m4">
				</br>
				<!-- From the Table Guestroom, just an Overview for the User, Select is diabled --> 
				<select id="guestroom" name="guestroom" class="w3-input w3-block w3-border" size="4" style="border-style:none; scrollbar-width: none; border:0; outline:none; background-color:transparent;" disabled >
					<!-- <option value="">Select Room first</option> -->
				</select>
			</div>
			<div class="w3-col m2">
				</br>
				<button class="w3-button w3-right w3-black"> Complete Roombooking </button>
			</div>
	  </form>
	  </div>

	   <h3 align="center" style="margin:50px">Feel Welcome!</h3>
		<!-- Sliders -->
		<div class="accordian">
			<ul>   
				<li><img src="https://live.staticflickr.com/3742/13735308745_8e38556d84_b.jpg" width="640px"/> </li>
				<li><img src="https://cdn.splendia.com/images/property/32146/hotel_mas_de_torrent_518831_600x356.jpg"width="640px" /> </li>
				<li><img src="https://i2.pickpik.com/photos/237/572/957/hotelroom-guestroom-florida-hotel-preview.jpg" width="640px"/> </li>
				<li><img src="https://p1.pxfuel.com/preview/779/613/208/hotel-room-curtain-green.jpg" width="640px"/> </li>
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
