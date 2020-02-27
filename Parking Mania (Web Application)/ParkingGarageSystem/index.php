<?php
require('session.php');
sessionFunction();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Parking Mania</title>

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
      <a class="navbar-brand animated fadeInLeft" style="color:#33B9B3" >Parking Mania</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleMenu">
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item animated fadeIn">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item animated fadeIn2">
            <a class="nav-link" href="prices.php">Pricing</a>
          </li>
          <li class="nav-item animated fadeIn3">
            <a class="nav-link" href="testimonials.php">Testimonials</a>
          </li>
          <li class="nav-item animated fadeIn4">
            <a class="nav-link" href="reserve.php">Reserve</a>
          </li>
          <li class="nav-item animated fadeIn5">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item animated fadeIn6">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>

      </div>
    </nav>
  </section>

  <!-- Title -->
  <section class="colored-section-index" > 
    <div class="container-fluid" id= "title"> 

      <div class="row">

        <div class="col-lg-12 animated fadeInUp">
          <h1 class="heading"><br/>Please Sign in, in order to make a reservation. We have the cheapest prices in EWR. Thank you for giving us the opportunity to serve you. If you have any questions go to the Contact page.<br/></h1>
          
          <h4><br/>Download the EWR Parking App, it's simple, and easy to manage your account.<br/></h4>

          <button id = "appStore" type="button" class="btn btn-outline-light btn-lg download-button"><i class="fab fa-apple"></i> 
          Download</button>
          <script type="text/javascript">
            document.getElementById("appStore").onclick = function () {
              location.href = "https://itunes.apple.com/us/developer/apple/id284417353?mt=8#see-all/i-phonei-pad-apps";
            };
          </script>
          <button  id = "playStore" type="button" class="btn btn-outline-light btn-lg download-button"><i class="fab fa-google-play"></i> Download</button>
          <script type="text/javascript">
            document.getElementById("playStore").onclick = function () {
              location.href = "https://play.google.com/store/apps?hl=en_US";
            };
          </script>
          
        </div>

      </div>

    </div>

  </section>
</body>

<?php
include('includes/footer.html');
?>
</html>
