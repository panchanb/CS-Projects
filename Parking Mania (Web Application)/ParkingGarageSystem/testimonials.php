<?php
require('session.php');
sessionFunction();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>testimonials</title>

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

<body>

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


  <!-- Testimonials -->

  <section class="colored-section-testimonials" id="testimonials">

    <div id="testimonial-carousel" class="carousel slide animated fadeIn" data-ride="false">
      <div class="carousel-inner">
        <div class="carousel-item active container-fluid">
          <h2 class="testimonial-text">The staff couldn't have been lovelier. They have 24hr security surveillance and they offer a complimentary car wash. Now I know whom I'll be leaving my car with next time. Thank you parking mania staff!</h2>
          <img class="testimonial-image" src="images/pia.png" alt="Pia">
          <em>Pia, New Jersey</em>
        </div>
        <div class="carousel-item container-fluid">
          <h2 class="testimonial-text">Reserved a spot an hour beforehand because the rates there were the lowest I found. I got there quickly and all the employees were friendly. Seemed like a very safe place and I will use them again.</h2>
          <img class="testimonial-image" src="images/umar.png" alt="Umar">
          <em>Umar, New Jersey</em>
        </div>
      </div>
      <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>

  </section>

  <?php

  include('includes/footer.html');
  ?>
  
</body>

</html>
