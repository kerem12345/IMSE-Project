<?php
	session_start();

	//Include Connection File
	include_once 'db_connection.php'; 
	
	$user = $_POST['user'];
	$email = $_POST['email'];
	$first = $_POST['first'];
	$last = $_POST['last'];
	$pass = $_POST['pass'];
	$paymenttype = $_POST['payment'];
	
	//Check connection
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	}

	$sql="INSERT INTO guest (`user`, `firstname`, `lastname`, `emailaddress`, `password`, `paymenttype`) VALUES  ('$user', '$first', '$last', '$email', '$pass', '$paymenttype')";
	
	
	if ($db->query($sql) == TRUE) {
		echo "<center></br><h2>Registration was successfully!</h2><hr>";
		echo "<table>";
		echo "<tr><th>User:</th><td>".$user."</td></tr>";
		echo "<tr><th>Firstname:</th><td>".$first."</td></tr>";
		echo "<tr><th>Lastname:</th><td>".$last."</td></tr>";
		echo "<tr><th>Email-Address:</th><td>".$email."</td></tr>";
		echo "<tr><th>Paymenttype:</th><td>".($paymenttype ==1  ? "Credit-Card" : "Debit-Card")."</td></tr>";
		echo "</table>";
		echo "</br><a href='index.html' class='w3-bar-item w3-button w3-mobile'>Back</a></center>";
		//echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
		//header('location:index.html');
	} else {
		echo "Error: " . $sql . "<br>" . $db->error;
		echo "Please choose another username!";
	}

	$db->close();

 ?>