<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<style type="text/css">
		.greeting{
			font-size: 100px;
			text-align: center;
			color: skyblue;
		}
		.denied{
			font-size: 100px;
			text-align: center;
			color:red;
		}
	</style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display-category.php">Display Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display-books.php">Display Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display-comments.php">Display Comments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact-us.php">Contact us</a>
      </li>
    </ul>
    <a class="nav-link" href="index.html"><font color='red'>Logout</font></a>
  </div>
</nav>



</body>
</html>

<?php

	require('../dbconnection.php');

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT username, password FROM Admin WHERE username='$username' and password='$password'";
	$result = @mysqli_query($conn, $query);
	$row = @mysqli_fetch_array($result);

	if(@mysqli_num_rows($result) == 1){
		echo "<script>
			window.location='display-category.php'; 
			</script>";
	}
	else{
		echo "<script>
			window.alert('Username or password did not match, Please try again later!');
			window.location='index.html'; 
			</script>";
	}

?>