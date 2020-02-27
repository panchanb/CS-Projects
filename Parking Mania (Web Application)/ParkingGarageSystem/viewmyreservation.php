<?php
require('session.php');
sessionFunction();

	require('mysql.php');

	$username = mysqli_real_escape_string($db, trim($_SESSION['username']));
    $query = "SELECT * FROM tblvehicle WHERE username = '$username'";
    $result = @mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    $num = mysqli_num_rows($result);

   	$dbusername = $row[1];
	$parkingnum = $row[2];
    $plan = $row[10];
    $intime = $row[8];
    $make = $row[3];
    $model = $row[4];
    $license = $row[6];
    $ownername = $row[5];
    $ownercontactnum = $row[7];
    $status = $row[15];

    //$plan == 'dialy'

	 if($row == 0 || $status == 'canceled'){
	 	echo "<script>
	 				window.alert('Seems like you do not a reservation yet or your reservation was deleted by admin!');
					 window.location='reserve.php';
   				</script>";	
	 }
?>

<html>
<head>
	<title>My Reservation</title>

	<link href="css/animate.css" rel="stylesheet">

	<meta charset="utf-8">
	<title>Reserve</title>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">

	<!-- CSS Stylesheets -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/form.css">

	<!-- Font Awesome -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

	<!-- Bootstrap Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

	<section class="colored-section-index" id="navBar">

		<!-- Nav Bar -->
		<nav class="navbar navbar-expand-lg navbar-dark" >
			<a class="navbar-brand" style="color:#33B9B3" >Parking Mania</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleMenu">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleMenu">
				<ul class="navbar-nav ml-auto">
					
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="prices.php">Pricing</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="testimonials.php">Testimonials</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="reserve.php">Reserve</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
				</ul>

			</div>
		</nav>
	</section>

	&nbsp;
	&nbsp;


	<div class="container animated fadeIn">
		<form action="viewmyreservation.php" method="post">
			<h1 class = "animated fadeIn">My Reservation</h1>

			<div class="row animated fadeIn2">
				<div class="col-25">
					<label for="make">Parking number:</label>
				</div>
				<div class="col-75">
					<input required type="text" id="mke" name="make" readonly value="<?php echo "$parkingnum"; ?>">
				</div>
			</div>

			<div class="row animated fadeIn3">
				<div class="col-25">
					<label for="license">Plan:</label>
				</div>
				<div class="col-75">
					<input required type="text" id="mke" name="make" readonly value="<?php echo "$plan"; ?>">
				</div>
			</div>

			<div class="row animated fadeIn4">
				<div class="col-25">
					<label for="license">In Time:</label>
				</div>
				<div class="col-75">
					<input required type="text" id="mke" name="make" readonly value="<?php echo "$intime"; ?>">
				</div>
			</div>
			
			<div class="row animated fadeIn5">
				<div class="col-25">
					<label for="model">Car Make:</label>
				</div>
				<div class="col-75">
					<input required type="text" id="mke" name="make" readonly value="<?php echo "$make"; ?>">
				</div>
			</div>
			
			<div class="row animated fadeIn6">
				<div class="col-25">	
					<label for="ownername">Car Model:</label>
				</div>
				<div class="col-75">
					<input required type="text" id="mke" name="make" readonly value="<?php echo "$model"; ?>">
				</div>
			</div>
			
			<div class="row animated fadeIn7">
				<div class="col-25">
					<label for="ownercontactnum">License Plate Number:</label>
				</div>
				<div class="col-75">
					<input required type="text" id="mke" name="make" readonly value="<?php echo "$license"; ?>">
				</div>
			</div>
			
			<div class="row animated fadeIn8">
				<div class="col-25">
					<label for="license">Owner Name:</label>
				</div>
				<div class="col-75">
					<input required type="text" id="mke" name="make" readonly value="<?php echo "$ownername"; ?>">
				</div>
			</div>

			<div class="row animated fadeIn9">
				<div class="col-25">
					<label for="license">Owner Contact Number:</label>
				</div>
				<div class="col-75">
					<input required type="text" id="mke" name="make" readonly value="<?php echo "$ownercontactnum"; ?>">
				</div>
			</div>

			&nbsp;
			&nbsp;
			&nbsp;
			
			<div class="row animated fadeIn10">
				<center><input type="submit" name="cancelbtn" value="Cancel"></center>
			</div>

		</form>
	</div>
</body>
</html>

<?php
	if(isset($_POST['cancelbtn'])){

		$status = mysqli_real_escape_string($db, trim('canceled'));
		$username = mysqli_real_escape_string($db, trim($_SESSION['username']));
		$query2 = "UPDATE tblvehicle SET status = '$status', CancelTime = CURRENT_TIMESTAMP(), username = null WHERE username = '$username'";
		$result = @mysqli_query($db, $query2);

		if ($result){

			echo "<script>
	 				window.alert('Your reservation is canceled!');
					 window.location='reserve.php';
   				</script>";		
   		}

		else{
			echo "Something went wrong. Please try again later";
		}

	}
?>