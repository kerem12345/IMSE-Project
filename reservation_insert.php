<?php
	session_start();

	//Include Connection File
	include 'db_connection.php'; 
	
	$user = $_POST['user'];
	$paymenttype = $_POST['paymenttype'];
	$tableId = $_POST['restauranttableId'];
	$hotelId = $_POST['hotelId'];
	$guests = $_POST['guests'];
	$datetime = $_POST['datetime'];

		
	$sql="INSERT INTO `reservation` (`guest_user`, `guest_paymenttype`, `restauranttable_tableId`, `restauranttable_hotelId`, `persons`, `datetime`) VALUES ('$user', '$paymenttype', '$tableId', '$hotelId', '$guests', '$datetime')";
	
	if ($db->query($sql) == TRUE) {
		echo "<center></br><h2>Reservation was successfully!</h2><hr>";
		echo "<table>";
		echo "<tr><th>Username:</th><td>".$user."</td></tr>";
		//echo "<tr><th>Paymenttype:</th><td>".($paymenttype == 1  ? "Credit-Card" : "Debit-Card")."</td></tr>";
		echo "<tr><th>Hotel:</th><td>".$hotelId."</td></tr>";
		echo "<tr><th>Seats:</th><td>".$guests."</td></tr>";
		echo "<tr><th>Datetime:</th><td>".$datetime."</td></tr>";
		echo "</table>";
		echo "</br><a href='reservation.php' class='w3-bar-item w3-button w3-mobile'>Back</a></center>";
	} else {
		echo "Error: " . $sql . "<br>" . $db->error;
		echo "Please try again!";
	}

	$db->close();

 ?>