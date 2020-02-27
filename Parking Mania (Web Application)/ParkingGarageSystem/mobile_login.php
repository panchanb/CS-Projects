<?php

require "mysql.php";

$username = $_POST["username"];
$password = $_POST["password"];

$password = md5($password);
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$results = mysqli_query($db, $query); 

if (mysqli_num_rows($results) == 1) {
	echo "login success";
}
elseif (empty($username) || empty($password)) {
	echo "Please fill out all the input fields!";
}
elseif (mysqli_num_rows($results) < 1 ){
	echo "No user data found by the given username and password! Please signup to continue!";
}
else {
	echo "Something went wrong! Please try again later...";
}

?>