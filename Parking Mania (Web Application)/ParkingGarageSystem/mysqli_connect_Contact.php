<?php
require('session.php');
sessionFunction();
?>

<html>
<body>
<?php

  require('mysql.php');

  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastName']);
	$comment = mysqli_real_escape_string($db, $_POST['comment']);
  $telephone = mysqli_real_escape_string($db, $_POST['telephone']);
  	$query = "INSERT INTO contactUs (firstname, lastname, comment, telephone) 
  			  VALUES('$firstname', '$lastname', '$comment', '$telephone')";
  $result =	mysqli_query($db, $query);
	
 
 if ($result){
  echo "<script>
	 window.alert('Your response is saved! Thank You for your feedback🙂');
	 window.location='index.php';
   </script>";
 }
 else{
          echo '<h1>System Error</h1>
          <p class="error">Something went wrong. Please try again. We apologize for any inconvenience.</p>';

          // Debugging message:
          echo '<p>' . mysqli_error($db) . '<br><br>Query: ' . $query . '</p>';
        
      } // End of if ($r) IF.
    mysqli_close($db); // Close the database connection.

    // Include the footer and quit the script:
    exit();
?>

</body>
</html>
 
