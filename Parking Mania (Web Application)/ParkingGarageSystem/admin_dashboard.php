<?php
require('session.php');
sessionFunction();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>View # vehicles</title>

<!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

      <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">

    <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link href="css/animate.css" rel="stylesheet">


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
            
            <li class="nav-item animated fadeIn2">
              <a class="nav-link" href="admin_dashboard.php">Home</a>
            </li>
            <li class="nav-item animated fadeIn3">
              <a class="nav-link" href="feedbacks.php">Feedbacks</a>
            </li>
            <li class="nav-item animated fadeIn4">
              <a class="nav-link" href="manage_bookings.php">Manage Bookings</a>
            </li>
            <li class="nav-item animated fadeIn5">
              <a class="nav-link" href="view_vehicles.php">View Parked Vehicles</a>
            </li>
            <li class="nav-item animated fadeIn6">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>

        </div>
      </nav>
    </section>
        

<?php
// connect to the databas
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'ProjectInformationS');

// Make the connection:
$db = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );
// Set the encoding...
mysqli_set_charset($db, 'utf8');
?>

    
<?php
//todays Vehicle Entries
$query=mysqli_query($db,"select ID from tblvehicle where date(InTime)=CURDATE();");
$count_today_vehentries=mysqli_num_rows($query);
 ?>

        <center>
        <section id="cars">
        <div class="col-lg-4 col-md-6 animated fadeIn2">
            <div class="card animated pulse">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon flat-color-1">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left">
                                <div class="stat-text"><span class="count"><?php echo $count_today_vehentries;?></span></div>
                                <div class="stat-heading">Todays Vehicle Entries</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </center>

                

<?php
//Last Sevendays Vehicle Entries
$query2=mysqli_query($db,"select ID from tblvehicle where date(InTime)>=(DATE(NOW()) - INTERVAL 7 DAY);");
$count_lastsevendays_vehentries=mysqli_num_rows($query2);
?>
        <center>
        <div class="col-lg-4 col-md-6 animated fadeIn3">
            <div class="card animated pulse2">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon flat-color-2">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left">
                                <div class="stat-text"><span class="count"><?php echo $count_lastsevendays_vehentries?></span></div>
                                <div class="stat-heading">Last 7 days Vehicle Entries</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </center>

                    
                        
<?php
//Total Vehicle Entries
$query3=mysqli_query($db,"select ID from tblvehicle");
$count_total_vehentries=mysqli_num_rows($query3);
?>
        <center>
        <div class="col-lg-4 col-md-6 animated fadeIn4">
            <div class="card animated pulse3">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon flat-color-3">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left">
                                <div class="stat-text"><span class="count"><?php echo $count_total_vehentries?></span></div>
                                <div class="stat-heading">Total Vehicle Entries</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </center>
    
</section>


<!-- Footer -->


<?php

include('includes/footer.html');
?>


</body>
</html>