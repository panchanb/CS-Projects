<?php

require "mysql.php";

$username = $_POST['username'];

$query = "SELECT * FROM tblvehicle WHERE username = '$username'";
$result = @mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

if($row == 0){

	$parkingnumber = mt_rand(100000000, 999999999);
	$make = $_POST['make'];
	$model = $_POST['model'];
	$ownername = $_POST['ownername'];
	$telephone = $_POST['telephone'];
	$license = $_POST['license'];
	$plan = $_POST['plan'];
	$cardname = $_POST['cardname'];
	$cardnum = $_POST['cardnum'];
	$expdate = $_POST['expdate'];
	$seccode = $_POST['seccode'];

	$query2 = "INSERT INTO tblvehicle (username, ParkingNumber, Make, Model, OwnerName, LicensePlateNum, OwnerContactNumber, Plan, NameOnCard, CardNum, ExpirationDate, SecurityCode) VALUES ('$username', '$parkingnumber', '$make', '$model', '$ownername', '$license', '$telephone','$plan', '$cardname', '$cardnum', '$expdate', '$seccode')";

	$result2 = @mysqli_query($db, $query2);

	if($result2){
	
	echo "reserve success";
	
	}
	else { // If it did not run OK.

	// Public message:
	echo '<p>' . mysqli_error($db) . '<br><br>Query: ' . $query . '</p>';

	} // End of if ($r) IF.
}
		
else {
	
	echo"Has Reservation";	

} 

$db->close();

?>