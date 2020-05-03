<!DOCTYPE html>
<html>
<head>
	<title>Category Filter</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	 <style type="text/css">
    body{
      margin: auto;
    }
    .images{
      width:400px;
      height:500px;
      object-fit: cover;
      border-radius: 8px;
    }
    .images:hover{
      box-shadow: 0 16px 32px 0 rgba(0,0,0,0.4);
    }
    .img-container{
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);
      margin:4px;
      transition: 3s;
    }
    .main{
      margin:auto;
      padding:50px;
      padding-left:70px;
    }
    .btn2{
      width:100%;
      margin-top:10px;
      /*box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);*/
    }
    .heading{
      margin-top:20px;
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
      <li class="nav-item dropdown active">
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
	$query = "SELECT * FROM Category";
	$result = @mysqli_query($conn, $query);
	$num = mysqli_num_rows($result); 

	for($i=0;$i<$num;$i++)  {

		if(isset($_POST["category_name"][$i])){
			$category_name[$i] = $_POST["category_name"][$i];
		echo "<div class='container text-center'>";
		echo "<h1 class = 'heading text-success'>Available $category_name[$i] Books</h1>";
		echo "</div>";

		$query2 = "select * from Category c, Books b where c.category_id = b.category_id and c.category_name='$category_name[$i]'";
    
		$result2 = @mysqli_query($conn, $query2);
		$num2 = mysqli_num_rows($result2);

			if($num2>0){
			    $a=0;
			    while($row = mysqli_fetch_assoc($result2)){
			      if($a%3 == 0){
			        echo "<div class='text-center main'>
			        <form action='book-details.php' method='post'>
			        <table><tr>";
			      }
			      echo "<td>
			        <div class='img-container'><img class='images' src='admin/images/$row[image]'></div>
			        <input class='btn btn2 btn-outline-success' type='submit' name='title[$a]' value='$row[title]'>
			        </td>";
			      if($a%3 == 2){
			        echo "</tr></table></form></div>";
			      }
			      $a++;
			    }
			}
			else{
				echo "<script>
			window.alert('No $category_name[$i] Books available right now!');
			window.location='index.php'; 
			</script>";
			}
		}
	}

?>