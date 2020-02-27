<?php
require('session.php');
sessionFunction();
?>

<html>
<head>

  <meta charset="utf-8">
  <title>Reserve</title>

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
            <a class="nav-link" href="admin_dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="feedbacks.php">Feedbacks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage_bookings.php">Manage Bookings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view_vehicles.php">View Parked Vehicles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>

      </div>
    </nav>
  </section>

  <h1 class = "animated fadeIn">Search by Parking Number</h1>
  <div class="container animated fadeIn">
    <form action="manage_bookings2.php" method="post">
      <div class="row animated fadeIn2">
        <div class="col-25">
         <label for="make">Parking number:</label>
       </div>
       <div class="col-75">
         <input type="text" required id="mke" name="parkingnum" placeholder="Enter customer's parking number.." size="25" maxlength="60" value="<?php if (isset($_POST['parkingnum'])) echo $_POST['parkingnum']; ?>">
       </div>
     </div>
     <div class="row animated fadeIn3">
       <center><input type="submit" name="parkingsbt" value="Submit"></center>
     </div>
   </form>
 </div>


 <h1 class = "animated fadeIn4">Update Pricing</h1>


 <div class="container animated fadeIn4">
  <form action="manage_bookings2.php" method="post">
    <div class="row animated fadeIn5">
      <div class="col-25">
       <label for="make">Select one option:</label>
     </div>
     <div class="col-75">
       <select name="PlanInfo">
        <option value="Daily">Daily</option>
        <option value="Weekly">Weekly</option>
        <option value="Monthly">Monthly</option>

      </select>
    </div>
  </div>

  <div class="row animated fadeIn6">
    <div class="col-25">
      <label for="model">New Price</label>
    </div>
    <div class="col-75">
      <input type="text" id="mdel" required name="newprice" placeholder="Enter new price here, do not include $ sign.." size="25" maxlength="25" pattern="[0-9]+(\.[0-9][0-9])?" title="Enter a number wiht or without decimal"  value="<?php if (isset($_POST['newprice'])) echo $_POST['newprice']; ?>">
    </div>
  </div>
  <div class="row animated fadeIn7">
   <center><input type="submit" name="expsbt" value="Submit"></center>
 </div>
</form>
</div>
</body>
</html>

<?php 

include('includes/footer.html');

?>