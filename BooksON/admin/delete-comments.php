<!DOCTYPE html>
<html>
<head>
	<title>Delete Comments</title>
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
		<a href="display-comments.php" class="btn btn-outline-success">Go back</a>
		</div>
	</div>

</body>
</html>

<?php

	require('../dbconnection.php');

	// $name = $_POST['name'];
	// echo "$name";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		for($i=0;$i<count($_POST["comment_id"]);$i++)  {

			$comment_id[$i] = $_POST["comment_id"][$i];

	            if(isset($_POST["delete_check"][$i])){
	            	$query = "DELETE FROM Comment WHERE comment_id = '$comment_id[$i]'";
	                $result = @mysqli_query($conn, $query);
	            }
            }
	}
?>