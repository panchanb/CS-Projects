<!DOCTYPE html>
<html>
	<head>
		<title>All Customers</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
		<link href="animation/animate.css" rel="stylesheet">
	</head>

	<body>
	

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>

</html>

<?php

	require('MySQL_Connection.php');

	echo "<center><br><h1> The following customers are in the bank system </h1></br></center>";

	$query = "SELECT * FROM Customers";
	$result = @mysqli_query($db, $query);


	if($result){

		echo '<div class = "container">';
		echo "<center><Table border =1></center>";
		echo '<table class="table table-hover table-responsive" width = "100%">
		<thead class="table-success">
		<tr>
			<th align = "left">ID</th>
			<th align = "left">Login</th>
			<th align = "left">Password</th>
			<th align = "left">Name</th>
			<th align = "left">Gender</th>
			<th align = "left">DOB</th>
			<th align = "left">Street</th>
			<th align = "left">City</th>
			<th align = "left">State</th>
			<th align = "left">Zipcode</th>
		</tr>
		</thead>
		<tbody> ';

		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo '<tr>
			<td align="center">' . $row['id'] . ' </td>
			<td align="center">' . $row['login'] . ' </td>
			<td align="center">' . $row['password'] . '</td>
			<td align="center">' . $row['name'] . ' </td>
			<td align="center">' . $row['gender'] . ' </td>
			<td align="center">' . $row['DOB'] . ' </td>
			<td align="center">' . $row['street'] . ' </td> 
			<td align="center">' . $row['city'] . ' </td>
			<td align="center">' . $row['state'] . ' </td>
			<td align="center">' . $row['zipcode'] . ' </td>
			</tr>
			';
		}

		echo '</tbody></table></div>';

		mysqli_free_result ($result);

	} 	
	
	else { 
			echo '<p>No Customer Data in the Bank System.</p>';

	}

mysqli_close($db);

?>

<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}
</style>