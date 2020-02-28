<?php

	require('MySQL_Connection.php');

	echo "<center><br><h1> The following customers are in the bank system </h1></br></center>";

	$query = "SELECT * FROM Customers";
	$result = @mysqli_query($db, $query);


	if($result){

		echo "<center><Table border =1></center>";
		echo '<table width = "100%">
		<thead>
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

		echo '</tbody></table>';

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

	tr:nth-child(even) {
	  	background-color: #dddddd;
	}
</style>