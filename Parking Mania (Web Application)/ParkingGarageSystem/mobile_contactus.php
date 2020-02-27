<?php

require "mysql.php";

$stFname = $_POST['stFname'];
$stLname = $_POST['stLname'];
$stTelephone = $_POST['stTelephone'];
$stMsg = $_POST['stMsg'];

	$query = "INSERT INTO contactUs (firstname, lastname, comment, telephone) 
  			  VALUES('$stFname', '$stLname', '$stMsg', '$stTelephone')";
  	$result =	mysqli_query($db, $query);
	
 
 if ($result){
  echo "feedback sent";
 }
 else{
          // Debugging message:
          echo '<p>' . mysqli_error($db) . '<br><br>Query: ' . $query . '</p>';
        
      } // End of if ($r) IF.
    mysqli_close($db); // Close the database connection.
?>
