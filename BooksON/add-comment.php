<!DOCTYPE html>
<html>
<head>
	<title>Add Comment</title>
</head>
<body>

</body>
</html>

<?php

	require('dbconnection.php');
	
	if(isset($_POST['add_btn'])){
		$title = $_POST['title'];
		$new_comment = $_POST['new_comment'];

		$query = "select * from Books where title='$title'";
		$result = @mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		$query2 = "Insert into Comment (category_id, books_id, comment) values($row[category_id], $row[books_id],'$new_comment')";
		$result2 = @mysqli_query($conn, $query2);

		if($result2){
			echo "<script>
			window.alert('Your comment has been saved! Click OK to go home..');
			window.location='index.php'; 
			</script>";
		}
		else{
			echo "<script>
			window.alert('Something went wrong. Please try again later!');
			window.location='index.php'; 
			</script>";
		}
	}

?>