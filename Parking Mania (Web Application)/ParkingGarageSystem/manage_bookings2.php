<?php
require('session.php');
sessionFunction();
?>

<!DOCTYPE html>
<html>
<head>
<style>
	table {
	  font-family: arial, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	}

	td, th {
	  border: 1px solid black;
	  text-align: left;
	  padding: 8px;
	}
	
	
	th {
  background-color: #696969;
  color: white;
	}

	tr:nth-child(even) {
	  background-color: #C0C0C0;
	}
</style>

	<title>All Vehicles!</title> 

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
              <a class="nav-link" href="admin_dashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="feedbacks.php">Feedbacks</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_bookings.php">Manage Bookings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view_vehicles.php">View Parked Vehicles</a>
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

</body>
</html>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	require('mysql.php');

	if (isset($_POST['parkingsbt'])){
		if (empty($_POST ['parkingnum'])){
		echo "Please enter all the fields";
		}
		else{

		$parkingnum = mysqli_real_escape_string($db, trim($_POST['parkingnum']));
		$query = "SELECT ID, ParkingNumber, NameOnCard, CardNum, ExpirationDate, SecurityCode, InTime, CancelTime, status, Plan FROM tblvehicle WHERE ParkingNumber='$parkingnum'";
		$result = @mysqli_query($db, $query);
		$num = mysqli_num_rows($result);

		if ($num > 0){
			echo "<p> $num record found.</p>\n";
			echo "<center><Table border =1>";
			echo '<table width = "100%">
			<thead>
			<tr>
		<th align = "left">ID</th>
		<th align = "left">ParkingNumber</th>
		<th align = "left">status</th>
		<th align = "left">InTime</th>
		<th align = "left">CancelTime</th>
		<th align = "left">Plan</th>
		<th align = "left">CardHolderName</th>
		<th align = "left">CardNumber</th>
		<th align = "left">CardExpirationDate</th>
		<th align = "left">CardSecurityCode</th>
	</tr>
	</thead>
	<tbody> ';

	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<tr>
		<td align="center">' . $row['ID'] . ' </td>
		<td align="center">' . $row['ParkingNumber'] . ' </td>
		<td align="center">' . $row['status'] . '</td>
		<td align="center">' . $row['InTime'] . '</td>
		<td align="center">' . $row['CancelTime'] . '</td>
		<td align="center">' . $row['Plan'] . '</td>
		<td align="center">' . $row['NameOnCard'] . ' </td>
		<td align="center">' . $row['CardNum'] . ' </td>
		<td align="center">' . $row['ExpirationDate'] . ' </td>
		<td align="center">' . $row['SecurityCode'] . ' </td> 
		</tr>
		';
	}

			echo '</tbody></table>';

			mysqli_free_result ($result);

		} else { 
			echo '<p class="error">No records found.</p>';

		}

		mysqli_close($db);
				}
			}

	if (isset($_POST['expsbt'])){

		//$newprice = $_REQUEST['newprice'];
		$PlanInfo = $_REQUEST['PlanInfo'];


		if($PlanInfo == 'Daily'){

		$newprice = mysqli_real_escape_string($db, trim($_POST['newprice']));
		$query = "UPDATE prices SET Daily = '$newprice'";
		$result = @mysqli_query($db, $query);

		echo "<script>
	 				window.alert('$PlanInfo price changed to $$newprice');
					 window.location='manage_bookings.php';
   				</script>";

		}

		elseif($PlanInfo == 'Weekly'){

		$newprice = mysqli_real_escape_string($db, trim($_POST['newprice']));
		$query = "UPDATE prices SET Weekly = '$newprice'";
		$result = @mysqli_query($db, $query);

		echo "<script>
	 				window.alert('$PlanInfo price changed to $$newprice');
					 window.location='manage_bookings.php';
   				</script>";
		}

		elseif($PlanInfo == 'Monthly'){

		$newprice = mysqli_real_escape_string($db, trim($_POST['newprice']));
		$query = "UPDATE prices SET Monthly = '$newprice'";
		$result = @mysqli_query($db, $query);

		echo "<script>
	 				window.alert('$PlanInfo price changed to $$newprice');
					 window.location='manage_bookings.php';
   				</script>";
		}

		else{
			echo "Something went wrong. Please try again!";
		}

	} 
}
?>

<!DOCTYPE html>
<html>
<body>

	&nbsp;
    &nbsp;
    &nbsp;

	<div class="container">
		<form action="manage_bookings2.php" method="post">
		<div class="row">
		<div class="col-25">
			<label for="make">Delete Information:</label>
			</div>
			<div class="col-75">
			  <input type="text" required id="mke" name="deleteid" placeholder="Enter ID number to delete information.." size="25" maxlength="60" value="<?php if (isset($_POST['deleteid'])) echo $_POST['deleteid']; ?>">
			</div>
		  </div>
		   <div class="row">
			<center><input type="submit" name="deleteb" value="Submit"></center>
			</div>
		  </form>
		  </div>

		&nbsp;
    	&nbsp;
</body>
</html>

<?php  

	if(isset($_POST['deleteb'])){

		$deleteid = mysqli_real_escape_string($db, trim($_POST['deleteid']));

		$query = "DELETE FROM tblvehicle WHERE ID = '$deleteid'";
		$result = @mysqli_query($db, $query);

		if ($result){

			echo "<script>
	 				window.alert('Information is deleted from id number $deleteid');
					 window.location='manage_bookings.php';
   				</script>";		
   			}
		else{
			echo "Something went wrong. Please try again later";
		}

	}


?>