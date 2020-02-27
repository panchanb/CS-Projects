<?php
require('session.php');
sessionFunction();

require('mysql.php');

$username = mysqli_real_escape_string($db, trim($_SESSION['username']));
$query = "SELECT * FROM tblvehicle WHERE username = '$username'";
$result = @mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

if($row > 0){
	echo"<script>
			window.alert('Seems like you already have a reservation. Click OK to see your reservation');
		 	window.location='viewmyreservation.php';
		</script>";	
}
?>

<html>
<head>

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
						<a class="nav-link" href="reserve.php">Reserve</a>
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
		<form action="reserve.php" method="post">
			<h1 class = "animated fadeIn">Vehicle Information</h1>

			<div class="row animated fadeIn2">
				<div class="col-25">
					<label for="make">Make:</label>
				</div>
				<div class="col-75">
					<input required type="text" id="mke" name="make" placeholder="Your Car Make.." pattern="^[A-Z]{1}[a-z]{1,19}$" title="The first letter has to be Uppercase, then one to nineteen lowercase letters"size="25" maxlength="60" re value="<?php if (isset($_POST['make'])) echo $_POST['make']; ?>">

				</div>
			</div>
			
			<div class="row animated fadeIn3">
				<div class="col-25">
					<label for="model">Model:</label>
				</div>
				<div class="col-75">
					<input required type="text" id="mdel" name="model" pattern="^[A-Z]{1}[a-z0-9_-]{3,15}$" title="The first letter has to be Uppercase, then three to fifteen lowercase letters, numbers, underscores or hyphens" placeholder="Your Car Model.." size="25" maxlength="25" value="<?php if (isset($_POST['model'])) echo $_POST['model']; ?>">
				</div>
			</div>
			
			<div class="row animated fadeIn4">
				<div class="col-25">	
					<label for="ownername">Owner Name:</label>
				</div>
				<div class="col-75">
					<input  required type="text" id="oname" name="ownername" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="Your first name with first letter uppercase then space then your last name with first letter uppercase" placeholder="Your First and Last Name.." size="25" maxlength="30" value="<?php if (isset($_POST['ownername'])) echo $_POST['ownername']; ?>">
				</div>
			</div>
			
			<div class="row animated fadeIn5">
				<div class="col-25">
					<label for="ownercontactnum">Owner Contact Number:</label>
				</div>
				<div class="col-75">
					<input  required type="text" id="owcon" name="ownercontactnum" pattern="^\(\d{3}\)\s\d{3}-\d{4}$" title="The phone number has to be like this: (###) ###-####" placeholder="Your Contact Number.." size="25" maxlength="60" value="<?php if (isset($_POST['ownercontactnum'])) echo $_POST['ownercontactnum']; ?>">
				</div>
			</div>
			
			<div class="row animated fadeIn6">
				<div class="col-25">
					<label for="license">License Plate Number:</label>
				</div>
				<div class="col-75">
					<input  required type="text" id="lic" name="license" pattern="^[A-Z0-9]{3}-[A-Z0-9]{3}$" title="Licese Plate has to be Uppercase or numbers and this format ###-###" placeholder="Your License Plate Number.." size="25" maxlength="60" value="<?php if (isset($_POST['license'])) echo $_POST['license']; ?>">
				</div>
			</div>
			
			&nbsp;
			&nbsp;

			<h1 class = "animated fadeIn7">Payment Information</h1>	

			<div class="row animated fadeIn8">
				<div class="col-25">
					<label for="make">Choose a plan:</label>
				</div>
				<div class="col-75">
					<select name="plan">
						<option value="dialy">Daily</option>
						<option value="weekly">Weekly</option>
						<option value="monthly">Monthly</option>		
					</select>
				</div>
			</div>


			<div class="row animated fadeIn9">
				<div class="col-25">
					<label for="make">Name on Card:</label>
				</div>
				<div class="col-75">
					<input  required type="text" id="mke" name="cardname" pattern="^[A-Z][a-zA-Z]{2,}(?: [A-Z][a-zA-Z]*){0,2}$" title="The first name, middle name and last name have to start with Uppercase and First name at least 3 letters" placeholder="The first name, middle name and last name have to start with Uppercase" size="25" maxlength="60" value="<?php if (isset($_POST['cardname'])) echo $_POST['cardname']; ?>">
				</div>
			</div>
			
			<div class="row animated fadeIn10">
				<div class="col-25">
					<label for="model">Card Number:</label>
				</div>
				<div class="col-75">
					<input  required type="text" id="mdel" name="cardnum" pattern="^(?:4[0-9]{12}(?:[0-9]{3})?|[25][1-7][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$" title="Invalid Card Number" placeholder="Enter number on your card.." size="25" maxlength="25" value="<?php if (isset($_POST['cardnum'])) echo $_POST['cardnum']; ?>">
				</div>
			</div>
			
			<div class="row animated fadeIn11">
				<div class="col-25">	
					<label for="ownername">Expiration date:</label>
				</div>
				<div class="col-75">
					<input required type="text" id="oname" name="expdate"pattern="^(0[1-9]|1[0-2])\/\d{2}$" title="Invalid E.g. 11/22"  placeholder="Enter date on your card. E.g. 11/22" size="25" maxlength="30" value="<?php if (isset($_POST['expdate'])) echo $_POST['expdate']; ?>">
				</div>
			</div>
			
			<div class="row animated fadeIn12">
				<div class="col-25">
					<label for="ownercontactnum">Security Code:</label>
				</div>
				<div class="col-75">
					<input required type="text" id="owcon" name="seccode" pattern="^[0-9]{3}$" title="Three numbers E.g. 586"  placeholder="Enter security code on your card. E.g. 586" size="25" maxlength="60" value="<?php if (isset($_POST['seccode'])) echo $_POST['seccode']; ?>">
				</div>
			</div>
			&nbsp;
			<div class="row animated fadeIn13">
				<center><input type="submit" name="submit" value="Submit"></center>
			</div>

		</form>

		<form action="viewmyreservation.php" method="post">
		   <div class="row animated fadeIn13">
			
				<center><center><input type="submit" name="deletebtn" value="My Reservation"></center></center>
			</div>
		</form>
	</div>

	&nbsp;
	&nbsp;
	&nbsp;
	
</body>
</html>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	require('mysql.php');

	if (empty($_POST ['make']) || empty($_POST['model']) || empty($_POST['ownername']) || empty($_POST ['ownercontactnum']) || empty($_POST ['license']) || empty($_POST['cardname']) || empty($_POST['cardnum']) || empty($_POST['expdate'] || empty($_POST['seccode']))){
		echo "Please enter all the fields";
	}

	else{

		$username = mysqli_real_escape_string($db, trim($_SESSION['username']));
		$parkingnumber = mt_rand(100000000, 999999999);
		$make = mysqli_real_escape_string($db, trim($_POST['make']));
		$model = mysqli_real_escape_string($db, trim($_POST['model']));
		$ownername = mysqli_real_escape_string($db, trim($_POST['ownername']));
		$ownercontactnum = mysqli_real_escape_string($db, trim($_POST['ownercontactnum']));
		$license = mysqli_real_escape_string($db, trim($_POST['license']));
		$plan = mysqli_real_escape_string($db, trim($_POST['plan']));
		$cardname = mysqli_real_escape_string($db, trim($_POST['cardname']));
		$cardnum = mysqli_real_escape_string($db, trim($_POST['cardnum']));
		$expdate = mysqli_real_escape_string($db, trim($_POST['expdate']));
		$seccode = mysqli_real_escape_string($db, trim($_POST['seccode']));

		$q = "INSERT INTO tblvehicle (username, ParkingNumber, Make, Model, OwnerName, LicensePlateNum, OwnerContactNumber, Plan, NameOnCard, CardNum, ExpirationDate, SecurityCode) VALUES ('$username', '$parkingnumber', '$make', '$model', '$ownername', '$license', '$ownercontactnum','$plan', '$cardname', '$cardnum', '$expdate', '$seccode')";
		$r = @mysqli_query($db, $q);
		
		if($r){
			
			echo "<script>
			window.alert('Vehicle information is added. Your reservation is confirmed!');
			window.location='index.php';
			</script>";
		}
		else { // If it did not run OK.

			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">Something went wrong! Please try again.. We apologize for any inconvenience.</p>';

			// Debugging message:
			echo '<p>' . mysqli_error($db) . '<br><br>Query: ' . $q . '</p>';

		} // End of if ($r) IF.

		mysqli_close($db); // Close the database connection.

		// Include the footer and quit the script:
		exit();

	} 

}

include('includes/footer.html');

?>