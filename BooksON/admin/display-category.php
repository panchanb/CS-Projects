<!DOCTYPE html>
<html>
<head>
	<title>Display Category</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		.center2{
			text-align: center;
		}
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
		.add-btn{
			margin-bottom: 2%;
		}
		.id[readonly]{
            border: white;
            background-color: white;
        }
        .id-row{
        	width:20%;
        }
        .form-check-input{
                margin-left: 25px;
            }
        .btn{
        	width:15%;
        }
        .buttons-container{
        	margin-bottom: 10%;
        }
	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      </li>
      <li class="nav-item active">
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

	echo "<center><br><h1>Displaying data from Category table</h1></center>";
	echo 
	"<center><h3><font color ='red'>
		Note: You can change and delete the values from this table and hit the update button below!
	</font></h3></center><br>";	
	
	$query = "SELECT * FROM Category";
	$result = @mysqli_query($conn, $query);

	if($result){

		echo '<div class="center2"><div class = "container">';
		echo "<Table border =1>";
		echo '<table class="table">
		<thead class="table-success">
		<tr>
			<th align = "left">Category ID</th>
			<th align = "left">Category Name</th>
			<th align = "left">Delete</th>
		</tr>
		</thead>
		<tbody> ';

		$i=0;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            echo "<tr>
            <td class='id-row' align='center'>

            	<form action='update-category.php' method='POST'>

            	<input type='text' class='form-control id' name='category_id[$i]' value='$row[category_id]' readonly = 'true'>

            </td>

            <td align='center'>
            	<input type='text' class='form-control' name='category_name[$i]' value='$row[category_name]'> 
            </td>

            <td align='center'><input type='checkbox' class='form-check-input' id='inlineCheckbox1' name='delete_check[$i]' value = 'delete'></td>
            </tr>
            ";
            $i++;
        }

		echo '</tbody></table></div></div>';

		echo "<div class='container text-center animated fadeIn4 buttons-container'>
				<a class='btn btn-outline-primary' href='add-category.php'>Add New Category</a>
				<button type='submit' name='update-btn' class='btn btn-outline-success submit-btn'>Update table</button>
			</div>";
        echo "</form>";

		mysqli_free_result ($result);
	} 	
	
	else { 
			echo '<p>No data availale</p>';
	}
?>