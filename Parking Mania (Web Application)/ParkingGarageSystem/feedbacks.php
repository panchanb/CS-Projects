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

echo '<h1>Customer Feedbacks</h1>';

require ('mysql.php');

$query = "SELECT ID, firstname, lastname, comment, telephone FROM contactUs";
$result = @mysqli_query($db, $query);
$num = mysqli_num_rows($result);

if ($num > 0){
	echo '<table width = "110%">
	<thead>
	<tr>
		<th align = "left">ID</th>
		<th align = "left">First Name</th>
		<th align = "left">Last Name</th>
		<th align = "left">Contact number</th>
		<th align = "left">Feedback</th>
	</tr>
	</thead>
	<tbody> ';

	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<tr>
		<td align="center">' . $row['ID'] . ' </td>
		<td align="center">' . $row['firstname'] . ' </td>
		<td align="center">' . $row['lastname'] . '</td>
		<td align="center">' . $row['telephone'] . ' </td>
		<td align="center">' . $row['comment'] . ' </td>
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