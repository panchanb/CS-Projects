<!DOCTYPE html>
<html>
<head>
	<title>Book Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<style type="text/css">
	/*body {
  background-image: url('admin/images/3.jpg');
}*/
	.images{
		width:400px;
		height:500px;
		object-fit: cover;
		margin-top: 20px;
		border-radius: 8px;
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);
	}
	.content{
		border:solid;
		border-color: white;
		border-radius: 8px;
		margin-left: 25%;
		margin-right: 25%;
		margin-top: 20px;
		padding-left: 20px;
		padding-right: 20px;
		padding-top: 10px;
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);
	}
	.comment{
		border:solid;
		border-color: white;
		border-radius: 8px;
		margin-left: 25%;
		margin-right: 25%;
		margin-top: 20px;
		padding-left: 20px;
		padding-right: 20px;
		padding-top: 10px;
		margin-bottom: 5%;
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);
	}
	p{
		font-size: 20px;
	}
	

	</style>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">My Books Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
            require('dbconnection.php');
              $query = "SELECT * FROM Category";
              $result = @mysqli_query($conn, $query);
              $i=0;
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '
                  <form action="category-filter.php" method="post">
                    <input type="hidden" name='."category_id[$i]".' >
                    <input type="submit" class="dropdown-item" name='."category_name[$i]".' value='.$row['category_name'].'>
                  </form>
                ';
                $i++;
              }
          ?>
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact-us.php">Contact us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="get" action="search-results.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Search Books.." aria-label="Search" name="keyword">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      <a class="nav-link" target="_blank" href="admin/">Admin Login</a>
    </form>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>


<?php

	require('dbconnection.php');
	$query = "SELECT * FROM Books";
	$result = @mysqli_query($conn, $query);
	$num = mysqli_num_rows($result); 

	for($i=0;$i<$num;$i++)  {

		if(isset($_POST["title"][$i])){
			$title[$i] = $_POST["title"][$i];
		// echo "$title[$i]";

		$query2 = "Select * from Books where title='$title[$i]'";
		$result2 = @mysqli_query($conn, $query2); 

		if($result2){
			while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
				// echo "$row[details]";
				echo "<div class = 'container text-center'>";
				echo "<img class='images' src='admin/images/$row[image]'>";
				echo "</div>";
				echo "<div class='content'><table>";
				echo "<tr><p>Title: $row[title]</p></tr>";
				echo "<tr><p>Author: $row[author]</p></tr>";
				echo "<tr><p>Date Published: $row[date]</p></tr>";
				echo "<tr><p>Details: $row[details]</p></tr>";
				echo "</table></div>";
			}

		}
		else{
			echo "<script>
			window.alert('Unable to get data about the book. Please try again later!');
			window.location='index.php'; 
			</script>";
		}

		$query3="select c.comment_id, c.comment, b.title, ca.category_name from Comment c, Books b, Category ca where c.books_id = b.books_id and c.category_id = ca.category_id and b.title='$title[$i]';";
		$result3 = @mysqli_query($conn, $query3); 

		echo "<div class='comment'>";
		echo "<h1>Comments</h1><hr>";
		if($result3){
			while($row2 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
				// echo "$row[details]";
				echo "<table>";
				echo "<tr><p>$row2[comment]</p></tr><hr>";
				echo "</table>";
			}

			// echo '
			// 	<div class="comment-form">
			// 		<form action="add-comment.php" method="post">
			// 		  <div class="form-group">
			// 		  <input type="hidden" name="title" value="$title[$i]">
			// 		    <input type="text" class="form-control new_comment" placeholder="Write a comment.." name="new_comment">
			// 		  </div>
			// 		  <button type="submit" class="btn btn-outline-primary mb-2" name="add_btn">Add Comment</button>
			// 	</form></div>
			// ';

			echo "
				<div class='comment-form'>
					<form action='add-comment.php' method='post'>
					  <div class='form-group'>
					  <input type='hidden' name='title' value='$title[$i]'>
					    <input type='text' class='form-control new_comment' placeholder='Write a comment..'' name='new_comment'>
					  </div>
					  <button type='submit' class='btn btn-outline-primary mb-2' name='add_btn'>Add Comment</button>
				</form></div>
			";

			echo "</div>";

		}
		else{
			echo "<script>
			window.alert('Unable to load Comments!');
			</script>";
		}

		}
	}

?>