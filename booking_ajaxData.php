<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php 
// Include the database config file 
include_once 'db_connection.php'; 
 
if(!empty($_POST["hotelId"])){ 
    // Fetch room data based on the specific hotel 
	//$booked = "SELECT guestroom_room_roomId FROM booking WHERE ((".$_POST['CheckIn']." < checkOutDate) AND (".$_POST['CheckIn']." > checkInDate )) OR (".$_POST['CheckOut']." = checkInDate) OR (".$_POST['CheckOut']." = checkInDate) ORDER BY checkInDate";
    //$query = "SELECT * FROM room WHERE hotelId = ".$_POST['hotelId']." AND status = 1 and guests = ".$_POST['guests']."  AND room_roomId NOT IN (".$booked.") ORDER BY guests  "; 
    $query = "SELECT * FROM room WHERE hotelId = ".$_POST['hotelId']." AND status = 1 and guests = ".$_POST['guests']."  ORDER BY guests  "; 
	//$query = "SELECT * FROM room WHERE hotelId = ".$_POST['hotelId']." AND status = 1 and guests < 5 ORDER BY guests  "; 
    $result = $db->query($query); 
     
    // Generate HTML of room options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Room</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['roomId'].'">'.$row['guests'].' '.($row['guests']>1 ? Guests : Guest).' for '.$row['price'].'€ ('.$row['size'].'m<sup>2</sup>) </option>'; 
        } 
    }else{ 
        echo '<option value="">Room not available</option>'; 
    } 
}elseif(!empty($_POST["roomId"])){ 
    // Fetch guestroom data based on the specific room 
    $query = "SELECT * FROM guestroom WHERE room_roomId = ".$_POST['roomId'].""; 
    $result = $db->query($query); 
     
    // Generate HTML of guestroom options list 
    if($result->num_rows > 0){ 
        //echo '<option value="">Select Bed</option>'; 
        while($row = $result->fetch_assoc()){ 
			if($row['balcony']){ $balcony ="with Balcony";}
			else $balcony ="no Balcony";
			
			if($row['view']){ $view ="with View";}
			else $view =" ";
			
			echo '<option value="'.$row['room_roomId'].'">Your Choice: </option>';
            echo '<option value="'.$row['room_roomId'].'">'.$row['bed'].'-Bed </option>';
			echo '<option value="'.$row['room_roomId'].'">'.$balcony.'</option>';
			echo '<option value="'.$row['room_roomId'].'">'.$view.'</option>'; 			
        } 
    }else{ 
        //echo '<option value="">Room not available</option>'; 
		echo '<input name="guestroom" id="guestroom" class="form-control" type="text" value="Room not available" >';
    } 
}

?>