<?php
	session_start();

	//Connection File with $db
	require_once 'db_connection.php'; 
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	$sql="select * from  guest where (user ='$user' && password='$pass')";
	$result = $db->query($sql);
	//$result=mysqli_query($db, $sql); //not working for $row

	//if(mysqli_fetch_assoc($result)){ //not working for $row
	if($result->num_rows > 0){	
		//successfull Login
		if($user =='admin'){ //for registered admin's
			header('location:report.php');
		}
		else{
			$_SESSION['user']=$user;
			while($row = $result->fetch_assoc()){ 
				$_SESSION['paymenttype']=$row['paymenttype'];
				$_SESSION['firstname']=$row['firstname'];
				$_SESSION['lastname']=$row['lastname'];
			}
			header('location:home.php');
			//echo $_SESSION['paymenttype'];
		}
	} 
	else {
		echo "Wrong Username or Password, Please try again or Register!</br>";
		echo "</br><a href='index.html' class='w3-bar-item w3-button w3-mobile'>Back</a></center>";
		//header('location:index.html');
	}
	
	//$conn->close();

 ?>