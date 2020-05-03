<!DOCTYPE html>
<html>
<head>
	<title>Add Book</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		
		.card{
			width: 50%;
			margin-top: 3%;
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
	<form method="post" action="add-books.php" enctype="multipart/form-data">
	  <div class="form-group">
	    <label class="label" for="exampleInputEmail1">Title</label>
	    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter book title">
	  </div>
	  <div class="form-group">
	    <label class="label" for="exampleInputEmail1">Author</label>
	    <input type="text" name="author" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter author name">
	  </div>
	  <div class="form-group">
	    <label class="label" for="exampleInputEmail1">Date</label>
	    <input type="text" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter date published">
	  </div>
	  <div class="form-group">
	    <label class="label" for="exampleInputEmail1">Details</label>
	    <textarea type="text" rows='4' cols='50' name="details" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter details about this book"></textarea>
	  </div>
	  <div class="form-group">
                <label class="form-check-label label" style="margin-top: 10px; margin-bottom: 8px" for="inlineRadio1">Category</label>
                    <select class="form-control" name="category_name">
                        <option>Select a Category..</option>
                        <?php
                        	require('../dbconnection.php');
                            $query = "SELECT * FROM Category";
                            $result = @mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo '<option>' . $row['category_name'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
		  <div class="form-group">
		    <label for="exampleFormControlFile1">Choose an Image</label>
		    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
		  </div>
	  <div class="button">
	  <button type="submit" class="btn btn-outline-primary" name="add_button">Add</button>
	  <a href="display-books.php" class="btn btn-outline-danger">Cancel</a>
	  </div>
	</form>
</div>

</body>
</html>

<?php

	require('../dbconnection.php');

	if(isset($_POST['add_button'])){
		// $category_name = $_POST['category_name'];
		// echo "$category_name";

		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];

		$title = $_POST['title'];
		$author = $_POST['author'];
		$date = $_POST['date'];
		$details = $_POST['details'];
		$category_name = $_POST['category_name'];

		$query = "select category_id from Category where category_name='$category_name'";
		$result = @mysqli_query($conn, $query);
        $row = @mysqli_fetch_array($result);

        $category_id = $row['category_id'];


		$query2 = "Insert into Books (category_id, title, author, date, image, details) values ($category_id, '$title', '$author', '$date', '$image', '$details')";
		$result2 = @mysqli_query($conn, $query2);

		if($result2){
			if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
				echo "<script>
					 window.location='display-books.php';
   				</script>";
			}
			else{
				echo "<script>
					 alert('There was a problem uploading the image to database. Please try again later!');
   				</script>";
			}
		}
		else{
			echo "<script>
					 alert('Something went wrong! Please try again later!');
   				</script>";
		}
	}

?>
