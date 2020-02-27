<?php

require "mysql.php";

$response = array();

$stusername = $_POST['stusername'];

$query = "SELECT ParkingNumber, Make, Model, OwnerName, LicensePlateNum, OwnerContactNumber, InTime, Plan FROM tblvehicle WHERE username = '$stusername'";

$results = mysqli_query($db, $query); 

if (mysqli_num_rows($results) > 0) {

	$response['success'] = 1;

	$vehicle_data = array();

	while ($row = mysqli_fetch_assoc($results)) {
		array_push($vehicle_data, $row);
	}

	$response['vehicle_data'] = $vehicle_data;
}

else {
	$response['success'] = 0;
	$response['message'] = 'No reservation found!';
}

echo json_encode($response);
mysqli_close($db);

?>