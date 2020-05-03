<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<style type="text/css">
		
		.card{
			width:50%;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
			margin-top:3%;
		}

	</style>

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">My Books Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
            require('dbconnection.php');
              $query = "SELECT * FROM Category";
              $result = @mysqli_query($conn, $query);
              $i=0;
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '
                  <form action="category-filter.php" method="post">
                    <input type="hidden" name='."category_id[$i]".' >
                    <input type="submit" class="dropdown-item" name='."category_name[$i]".' value='.$row['category_name'].'>
                  </form>
                ';
                $i++;
              }
          ?>
          
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contact-us.php">Contact us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="get" action="search-results.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Search Books.." aria-label="Search" name="keyword">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      <a class="nav-link" target="_blank" href="admin/">Admin Login</a>
    </form>
  </div>
</nav>

<div class="container card">
	<form method="post" action="contact-us.php">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Enter your first name" name="first_name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last Name</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Enter your last name" name="last_name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Country</label>
      <select id="inputState" class="form-control" name="country">
        <option selected>Select your country</option>
        <option>United States of America</option>
        <option>Canada</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Subject</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Enter subject.." name="subject">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Message</label>
    <textarea type="text" cols="40" rows="8" class="form-control" id="inputAddress2" name="message">Enter your message..</textarea>
  </div>
  <div class="text-center">
  	<button type="submit" class="btn btn-outline-primary" name="submit-btn">Submit</button>
  </div>
</form>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>

<?php

	if(isset($_POST['submit-btn'])){
		// echo "button pressed";
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$country = $_POST['country'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	require('dbconnection.php');
	$query = "Insert into ContactUs (first_name, last_name, subject, message, country) values ('$first_name', '$last_name', '$subject', '$message', '$country')";
	$result = @mysqli_query($conn, $query); 

		if($result){
			echo "<script>
				window.alert('Your response has been saved!');
				window.location='contact-us.php'; 
				</script>";
		}
		else{
			echo "<script>
				window.alert('Something went wrong. Please try again later!');
				window.location='contact-us.php'; 
				</script>";
		}
	}

?>