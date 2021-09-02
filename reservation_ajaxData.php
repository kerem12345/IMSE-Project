<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php 
// Include the database config file 
include_once 'db_connection.php'; 
 
if(!empty($_POST["hotelId"])){ 
    // Fetch restauranttable data based on the specific hotel 
    $query = "SELECT * FROM restauranttable WHERE hotelId = ".$_POST['hotelId']." and seats = ".$_POST['guests']." ORDER BY place  "; 
    
    $result = $db->query($query); 
     
    // Generate HTML of restauranttable options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Table</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['tableId'].'">'.$row['place'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Table not available</option>'; 
    } 
}

?>