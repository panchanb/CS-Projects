<?php
require('session.php');
sessionFunction();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>contact</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">


  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/form.css">

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

<section class="colored-section-contact" >

  <div class="container-fluid">

    <h5 class="middle-heading animated fadeIn" style="color:red; font-size:30px;">Got A Question?</h5>
    <p><h3 class = "animated fadeIn2">Contact Parking Mania</h3></p><br/>
    <p><h5 class = "animated fadeIn3">We are here to help and answer any question you might<br/> have. We look forward to hearing from you 🙂</h5></p>
    <hr color = "black"></hr>

    <form method="POST" action="mysqli_connect_contact.php" autocomplete="on" class = "animated slideInUp">
     
     <div class="container">
      <form action="reserve.php" method="post">
        <div class="row">
          <div class="col-25">
           <label for="frst">First Name:</label>
         </div>
         <div class="col-75">
           <input type="text" id="frst" name="firstName" placeholder="Your First Name." size="25" maxlength="60" pattern="^[A-Z]{1}[a-z]{1,19}$" title="The first letter has to be Uppercaseone, then one to nineteen lowercase letters"required>
         </div>
       </div>
       
       <div class="row">
        <div class="col-25">
         <label for="lst">Last Name:</label>
       </div>
       <div class="col-75">
         <input type="text" id="lst" name="lastName" placeholder="Your Last Name.." size="25" maxlength="30" pattern="^[A-Z]{1}[a-z]{1,19}$" title="The first letter has to be Uppercaseone, then one to nineteen lowercase letters"required>
       </div>
     </div>
     
     <div class="row">
      <div class="col-25">
       <label for="tel">Telephone:</label>
     </div>
     <div class="col-75">
       <input type="text" id="tel" name="telephone" placeholder="(123) 456-7890" size="25" maxlength="60" pattern="^\(\d{3}\)\s\d{3}-\d{4}$" title="The phone number has to be like this: (###) ###-####" required>
     </div>
   </div>
   
   <label for="comment">Comments:</label>
   <textarea id="comment" name="comment" placeholder="Write something.." style="height:250px" required></textarea>
   
   <div class="row">
     <center><input type="submit" name="submit" value="Submit"></center>
     
   </div>
 </br>
  <input type="reset" value="Clear" />
</form>
</div>


</br>
<p align="center" style="color:white; font-size:30px;"><b>Contact Information:</b></p>
<hr color = "black"></hr>
<p align="center">📍  Kean University<br/>&nbsp&nbsp&nbsp 1000 Morris Avenue<br/> &nbsp&nbsp&nbsp Union, NJ 07083 </p>
<p align="center">☎️  +732-827-9860</p>
<p align="center">✉️  &nbsp&nbsp&nbspKhalmuha@kean.edu<br/>&nbsp&nbsp&nbsp&nbsp&nbsp  Ojedada@kean.edu<br/>&nbsp&nbsp&nbsp&nbsp&nbsp  Bhavin@kean.edu</p>
<button id = "appStore" type="button" class="btn btn-dark btn-lg download-button"><i class="fab fa-apple"></i> Download</button>
<script type="text/javascript">
  document.getElementById("appStore").onclick = function () {
    location.href = "https://itunes.apple.com/us/developer/apple/id284417353?mt=8#see-all/i-phonei-pad-apps";
  };
</script>

<button  id = "playStore" type="button" class="btn btn-dark btn-lg download-button"><i class="fab fa-google-play"></i> Download</button>
<script type="text/javascript">
  document.getElementById("playStore").onclick = function () {
    location.href = "https://play.google.com/store/apps?hl=en_US";
  };
</script>

</div>
</section>

<!-- Footer -->

<?php

include('includes/footer.html');
?>


</body>

</html>
