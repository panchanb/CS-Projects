<!DOCTYPE html>
<html>
<head>
	<title>Add Category</title>
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

	<div class="container card">
	<form method="post" action="add-category.php">
	  <div class="form-group">
	    <label class="label" for="exampleInputEmail1">Category Name</label>
	    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category name">
	  </div>
	  <div class="button">
	  <button type="submit" class="btn btn-outline-primary" name="add_button">Add</button>
	  <a href="display-category.php" class="btn btn-outline-danger">Cancel</a>
	  </div>
	</form>
</div>

</body>
</html>

<?php

	require('../dbconnection.php');

	if(isset($_POST['add_button'])){
		$category_name = $_POST['category_name'];
		echo "$category_name";

		$query = "Insert into Category (category_name) values ('$category_name')";
		$result = @mysqli_query($conn, $query);

		if($result){
			echo "<script>
					 window.location='display-category.php';
   				</script>";
		}
		else{
			echo "<script>
					 alert('Something went wrong! Please try again later!');
   				</script>";
		}
	}

?>
