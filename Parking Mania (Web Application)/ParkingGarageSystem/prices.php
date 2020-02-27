<?php
require('session.php');
sessionFunction();

require('mysql.php');

    $query = "SELECT * FROM prices";
    $result = @mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    $Daily = $row[1];
    $Weekly = $row[2];
    $Monthly = $row[3];

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>prices</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">


  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">

  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body >


  <section class="colored-section-index" id="navBar">

    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark" >
      <a class="navbar-brand" style="color:#33B9B3" >Parking Mania</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleMenu">
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="prices.php">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="testimonials.php">Testimonials</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reserve.php">Reserve</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>

      </div>
    </nav>
  </section>
  

  <!-- Pricing -->

  <section class="colored-body-prices" id="pricing">

    <h2 class="section-heading animated zoomIn">Simple and affordable price plans</h2>
    <div class="row">

      <div class="pricing-column col-lg-4 col-md-6 animated fadeIn2">
        <div class="card animated pulse">
          <div class="card-header">
            <h3>Daily Parking</h3>
          </div>
          <div class="card-body">
            <h2 class="price-text">Rate</h2>
            <h2 class="price-text"><?php echo "$$Daily"; ?></h2>
            
            
            <button class="btn btn-lg btn-block btn-dark" type="button" id="register1">Sign Up</button>
            <script type="text/javascript">
              document.getElementById("register1").onclick = function () {
                location.href = "register.php";
              };
            </script>
          </div>
        </div>
      </div>

      <div class="pricing-column col-lg-4 col-md-6 animated fadeIn3">
        <div class="card animated pulse2">
          <div class="card-header">
            <h3>Weekly Parking</h3>
          </div>
          <div class="card-body">
            <h2 class="price-text">Rate</h2>
            <h2 class="price-text"><?php echo "$$Weekly"; ?></h2>
            <p>Free Exterior Wash</p>
            <p>Valet Parking</p>

            <button class="btn btn-lg btn-block btn-dark" type="button" id="register2">Sign Up</button>
            <script type="text/javascript">
              document.getElementById("register2").onclick = function () {
                location.href = "register.php";
              };
            </script>
          </div>
        </div>
      </div>

      <div class="pricing-column col-lg-4 animated fadeIn4">
        <div class="card animated pulse3">
          <div class="card-header">
            <h3>Monthly Parking</h3>
          </div>
          <div class="card-body">
            <h2 class="price-text">Rate</h2>
            <h2 class="price-text"><?php echo "$$Monthly"; ?></h2>
            <p>Free Exterior Wash</p>
            <p>Interior Vacuum</p>
            <p>Valet Parking</p>
            <button class="btn btn-lg btn-block btn-dark" type="button" id="register3">Sign Up</button>
            <script type="text/javascript">
              document.getElementById("register3").onclick = function () {
                location.href = "register.php";
              };
            </script>
          </div>
        </div>
      </div>



    </div>

  </section>


  <!-- Footer -->


  <?php

  include('includes/footer.html');
  ?>


</body>

</html>
