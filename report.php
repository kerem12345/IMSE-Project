<!DOCTYPE html>
<html>
<head>
<style>
ul.a {
  list-style-position: outside;
}
h4 {
	padding-top:20px;
}
</style>
</head>
	<title>StarHotel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style_booking.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<body class="w3-light-grey">


		<!-- Navigation Bar -->
		<div class="w3-bar w3-white w3-large">
		  <a href="#" class="w3-bar-item w3-button w3-white w3-mobile">
			<img class="w3-image" src="img/logo.jpg" alt="The Hotel" width="15%" height="15%"></a>
		  <a href="logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
		</div>
		
		<!-- Header -->
		<header class="w3-display-container w3-content" style="max-width:1500px;">
		</header>

		<!-- Page content -->
		<div class="w3-content" style="max-width:1532px;">
			  <div class="w3-container w3-margin-top" id="rooms">
				<h3 style="text-align:center;">Reports</h3>
				<hr style="border: 1px solid grey;">
		</div>

<ul class='a'>
        <?php
             
            include_once 'db_connection.php';
            //This part of code calculates the total number of rooms reserved
            $query2 = "SELECT SUM(guests) FROM booking WHERE guests=1 or guests=2 or guests=3 or guests=4";
            $result2 = $db->query($query2);
            //This part of code calculates the total number of rooms with balcony reserved
            $query1 = "SELECT SUM(balcony) FROM guestroom WHERE balcony=1 ";
            $result1 = $db->query($query1);
            //This part of code calculates the total number of tables reserved
            $query3 = "SELECT SUM(persons) FROM reservation ";
            $result3 = $db->query($query3);
            //This part of code indicates the type of seat place of the restaurant tables
            //at the window
            $query4 = "SELECT SUM(seats) FROM restauranttable WHERE place='at the window' ";
            $result4 = $db->query($query4);
            //in the garden
            $query5 = "SELECT SUM(seats) FROM restauranttable WHERE place='in the garden' ";
            $result5 = $db->query($query5);
            //at the bar
            $query6 = "SELECT SUM(seats) FROM restauranttable WHERE place='at the bar' ";
            $result6 = $db->query($query6);
            //outside
            $query7 = "SELECT SUM(seats) FROM restauranttable WHERE place='outside' ";
            $result7 = $db->query($query7);
            //This part counts the total users
            $query8 = "SELECT COUNT(user) FROM guest WHERE user!='admin' ";
            $result8 = $db->query($query8);
            //The hotel ranking with the most booking for hotelId=1
            $query9 = "SELECT h.name as hotel, SUM(k.guests) as booking FROM room k ,hotel h WHERE k.hotelId=h.hotelId GROUP BY k.hotelId ORDER BY SUM(k.guests) DESC  ";
            $result9 = $db->query($query9);
            
            
            $printline= 'Booked guest rooms::';
            $printline2= 'Reserved restauranttables :';
            $printline3= 'Registered Total Number of Users:';
            $printline4= 'Hotel ranking with the most guest visits:';
            
            echo '<h4>' .$printline.'</h4>';
            echo '<li>';
            while($row1 = $result1->fetch_assoc()){
                        foreach($row1 as $cname => $cvalue){
                print "There are $cvalue\t rooms with balcony reserved!";
            }
            print "\r\n";
                    }
            echo '</li>';
            
            
            echo '<li>';
            while($row2 = $result2->fetch_assoc()){
                        foreach($row2 as $cname => $cvalue){
                print "There are totally $cvalue\t guests in hotels NOW !";
            }
            print "\r\n";
                    }
            echo '</li>';
            
            
            echo '<h4>' .$printline2.'</h4>';
            
            echo '<li>';
            while($row3 = $result3->fetch_assoc()){
                        foreach($row3 as $cname => $cvalue){
                print "There are totally $cvalue\t tables reserved !";
            }
            print "\r\n";
                    }
            echo '</li>';

            
            echo '<li>';
            while($row4 = $result4->fetch_assoc()){
                        foreach($row4 as $cname => $cvalue){
                print "There are $cvalue\t tables reserved at the window !";
            }
            print "\r\n";
                    }
            echo '</li>';
            
            
            echo '<li>';
            while($row5 = $result5->fetch_assoc()){
                        foreach($row5 as $cname => $cvalue){
                print "There are $cvalue\t tables reserved in the garden !";
                
            }
                
            print "\r\n";
                    }
            echo '</li>';
            

            echo '<li>';
            while($row6 = $result6->fetch_assoc()){
                        foreach($row6 as $cname => $cvalue){
                print "There are $cvalue\t tables reserved at the bar !";
            }
            print "\r\n";
                    }
            echo '</li>';
            
            
            echo '<li>';
            while($row7 = $result7->fetch_assoc()){
                        foreach($row7 as $cname => $cvalue){
                print "There are $cvalue\t tables reserved outside !";
            }
                print "\r\n";
              
			  
          echo '<h4>' .$printline3.'</h4>';                     }
          echo '<li>';
          while($row8 = $result8->fetch_assoc()){
                      foreach($row8 as $cname => $cvalue){
              print "There are $cvalue\t users registered !";
          }
              print "\r\n";
                             }
            echo '</li>';
            
            
            echo '<h4>'. $printline4. '</h4>';
            
                if($result9->num_rows > 0){
                echo '<ol>';
                while($row = $result9->fetch_assoc()){

                echo '<li>'.$row['hotel'].' with:  '.$row['booking'].' guests</li> ';
            
        }
        echo '</ol>';
    }
       ?>

         
		</div>




<script>
function goBack() {
  window.history.back();
}
</script>
<!-- Footer -->
<footer class="w3-padding-32 w3-black w3-center w3-margin-top">
  <h5>For Hotel-Staff Only</h5>
</footer>

</body>
</html>
