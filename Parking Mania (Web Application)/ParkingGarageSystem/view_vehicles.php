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

echo '<h1>All Vehicles Data</h1>';

require ('mysql.php');

$query = "SELECT ID, ParkingNumber, Make, Model, OwnerName, LicensePlateNum, OwnerContactNumber, InTime, CancelTime, status, Plan FROM tblvehicle";
$result = @mysqli_query($db, $query);
$num = mysqli_num_rows($result);

if ($num > 0){
	echo "<p> There are currently $num Vehicles.</p>\n";
	echo "<center><Table border =1>";
	echo '<table width = "100%">
	<thead>
	<tr>
		<th align = "left">ID</th>
		<th align = "left">ParkingNumber</th>
		<th align = "left">Make</th>
		<th align = "left">Model</th>
		<th align = "left">OwnerName</th>
		<th align = "left">LicensePlateNumber</th>
		<th align = "left">OwnerContactNumber</th>
		<th align = "left">inTime</th>
		<th align = "left">CancelTime</th>
		<th align = "left">status</th>
		<th align = "left">Plan</th>
	</tr>
	</thead>
	<tbody> ';

	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<tr>
		<td align="center">' . $row['ID'] . ' </td>
		<td align="center">' . $row['ParkingNumber'] . ' </td>
		<td align="center">' . $row['Make'] . '</td>
		<td align="center">' . $row['Model'] . ' </td>
		<td align="center">' . $row['OwnerName'] . ' </td>
		<td align="center">' . $row['LicensePlateNum'] . ' </td>
		<td align="center">' . $row['OwnerContactNumber'] . ' </td> 
		<td align="center">' . $row['InTime'] . ' </td>
		<td align="center">' . $row['CancelTime'] . ' </td>
		<td align="center">' . $row['status'] . ' </td>
		<td align="center">' . $row['Plan'] . ' </td>
		</tr>
		';
	}

	echo '</tbody></table>';

	mysqli_free_result ($result);

} else { 
	echo '<p class="error">There are currently no Vehicles.</p>';

}

mysqli_close($db);

//include('includes/footer.html');

?>

<!DOCTYPE html>
<html>
<body>

	&nbsp;
    &nbsp;
    &nbsp;

	<div class="container">
		<form action="view_vehicles.php" method="post">
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
		require ('mysql.php');

		$deleteid = mysqli_real_escape_string($db, trim($_POST['deleteid']));

		$query = "DELETE FROM tblvehicle WHERE ID = '$deleteid'";
		$result = @mysqli_query($db, $query);

		if ($result){

			echo "<script>
					 window.location='view_vehicles.php';
   				</script>";		
   			}
		else{
			echo "Something went wrong. Please try again later";
		}

	}


?>