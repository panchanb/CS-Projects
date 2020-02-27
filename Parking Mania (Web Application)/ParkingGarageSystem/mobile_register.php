<?php

require "mysql.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if (empty($username) || empty($email) || empty($password)){
	echo "Please fill out all the input fields";
}

elseif ($confirmPassword == $password) {
	$password = md5($password);
	$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
	$results = mysqli_query($db, $query); 

	if ($results) {
	echo "Insert success";
	}
	else {
	echo "Something went wrong. Please try again later!!";
	}
}

else{
	echo "Passwords does not match! Please try again..";
}



$db->close();

?>