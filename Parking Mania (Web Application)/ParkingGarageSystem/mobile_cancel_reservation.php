<?php

require "mysql.php";

	//$status = mysqli_real_escape_string($db, trim('canceled'));
	$username = $_POST['username'];
	$query = "UPDATE tblvehicle SET status = 'canceled', CancelTime = CURRENT_TIMESTAMP(), username = null WHERE username = '$username'";

	$result = @mysqli_query($db, $query);

	if ($result){

		echo "Cancellation success";		
	}

	else{
		echo "Cancellation failed. Please try again later!";
	}
?>