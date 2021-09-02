<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "1111";
    $db = "hotel";
	
    // Create connection
	$db = new mysqli($servername, $username, $password, $db); 
	
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error); 
	}
    //echo "Hello Hotel-DB :)";
?>