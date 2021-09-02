<?php
	session_start();

	//Include Connection File
	include 'db_connection.php'; 
	
	$user = $_POST['user'];
	$paymenttype = $_POST['paymenttype'];
	$guests = $_POST['guests'];
	$flexibleRate = $_POST['flexibleRate'];
	$guestroom = $_POST['guestroomId'];
	$CheckIn = $_POST['CheckIn'];
	$CheckOut = $_POST['CheckOut'];
		
	$sql="INSERT INTO `booking` (`guest_user`, `guest_paymenttype`, `guestroom_room_roomId`, `flexibleRate`, `guests`, `checkInDate`, `checkOutDate`) VALUES ('$user', '$paymenttype', '$guestroom', '$flexibleRate', '$guests', '$CheckIn', '$CheckOut')";
	
	if($CheckOut < $CheckIn){
		echo "Wrong Date-Input, Please try again!";
		echo "</br><a href='booking.php' class='w3-bar-item w3-button w3-mobile'>Back</a></center>";
	}else{
	
		if ($db->query($sql) == TRUE) {
			echo "<center></br><h2>Booking was successfully!</h2><hr>";
			echo "<table>";
			echo "<tr><th>Username:</th><td>".$user."</td></tr>";
			echo "<tr><th>Paymenttype:</th><td>".($paymenttype == 1  ? "Credit-Card" : "Debit-Card")."</td></tr>";
			echo "<tr><th>Bookingrate:</th><td>".($flexibleRate  ? "with flexible-Rate" : "non-flexible")."</td></tr>";
			echo "<tr><th>Guests:</th><td>".$guests."</td></tr>";
			echo "<tr><th>Check-In Date:</th><td>".$CheckIn."</td></tr>";
			echo "<tr><th>Check-Out Date:</th><td>".$CheckOut."</td></tr>";
			echo "</table>";
			echo "</br><a href='booking.php' class='w3-bar-item w3-button w3-mobile'>Back</a></center>";
			//header('location:booking.html');
		} else {
			echo "Error: " . $sql . "<br>" . $db->error;
			echo "Please try again!";
		}
	}
	$db->close();

 ?>