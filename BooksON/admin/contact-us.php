<!DOCTYPE html>
<html>
<head>
	<title>Feedbacks</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<style type="text/css">
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


</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
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
      <li class="nav-item active">
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

	echo "<center><br><h1>Displaying data from Contact us table</h1></center> <br>";

	$query = "SELECT * FROM ContactUs";
	$result = @mysqli_query($conn, $query);

	if($result){

		echo '<div class = "container">';
		echo "<center><Table border =1></center>";
		echo '<table class="table" width = "100%">
		<thead class="table-success">
		<tr>
			<th align = "left">Contact ID</th>
			<th align = "left">First Name</th>
			<th align = "left">Last Name</th>
			<th align = "left">Subject</th>
			<th align = "left">Message</th>
			<th align = "left">Country</th>
			<th align = "left">Date</th>
		</tr>
		</thead>
		<tbody> ';

		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo '<tr>
			<td align="center">' . $row['contact_id'] . ' </td>
			<td align="center">' . $row['first_name'] . ' </td>
			<td align="center">' . $row['last_name'] . '</td>
			<td align="center">' . $row['subject'] . ' </td>
			<td align="center">' . $row['message'] . ' </td>
			<td align="center">' . $row['country'] . ' </td> 
			<td align="center">' . $row['date'] . ' </td>
			</tr>
			';
		}

		echo '</tbody></table></div>';

		mysqli_free_result ($result);

	} 	
	
	else { 
			echo '<p>No Data availabe</p>';

	}

?>
