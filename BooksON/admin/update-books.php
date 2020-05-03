<!DOCTYPE html>
<html>
<head>
	<title>Update Books</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		
		.card{
			width: 50%;
			margin-top: 10%;
			box-shadow: 0 8px 16px 0 rgba(0,0,0,0.3);
			padding: 10px;
			border-radius: 8px;
		}

		.button{
			text-align: center;
		}

		.btn{
			width:25%;
		}

		.label{
			margin-left: 4px;
		}

	</style>
</head>
<body>

	<div class="container card text-center">
		<h3>All the changes have been recorded!</h3>
		<div class="text-center">
		<a href="display-books.php" class="btn btn-outline-success">Go back</a>
		</div>
	</div>

</body>
</html>

<?php

	require('../dbconnection.php');

	// $name = $_POST['name'];
	// echo "$name";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		for($i=0;$i<count($_POST["books_id"]);$i++)  {

			$books_id[$i] = $_POST["books_id"][$i];
			$title[$i] = $_POST["title"][$i];
			$author[$i] = $_POST["author"][$i];
			$date[$i] = $_POST["date"][$i];
			$details[$i] = $_POST["details"][$i];

	        // $category_id[$i] = $_POST["category_id"][$i];

            // $query2 = "select * from Category";
            // $result2 = @mysqli_query($conn, $query2);
            // $row = @mysqli_fetch_array($result2);

            $query = "UPDATE Books SET title='$title[$i]', author='$author[$i]', date='$date[$i]', details='$details[$i]' WHERE books_id='$books_id[$i]';";
            $result = @mysqli_query($conn, $query);

	            if(isset($_POST["delete_check"][$i])){
	            	$query3 = "DELETE FROM Books WHERE books_id = '$books_id[$i]'";
	                $result3 = @mysqli_query($conn, $query3);
	            }
            }
	}
?>