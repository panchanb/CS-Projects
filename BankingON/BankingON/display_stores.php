<!DOCTYPE html>
<html>
    <head>
        <title>All Stores | Bonus Project</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                margin-top: 1%;   
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            .heading{
                margin-top: 1%;
            }

            #map{
                height: 500px;
                width: 100%;
                border-radius: 5px;
            }
        </style>
    </head>

    <body>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>


<?php

    require('MySQL_Connection.php');

    $query = "select sid, name, address, city, state, Zipcode, concat('(',latitude, ',',longitude,')') as Location from CPS3740.Stores where latitude is not null and longitude is not null;";
    $result = @mysqli_query($db,$query);
    $num = mysqli_num_rows($result);

    if($result){

        echo '<div class = "container">';
        echo '<h3 class = "text-center text-primary heading">The following stores are in the database:</h3>';
		echo "<center><Table border =1></center>";
		echo '<table class="table table-hover" width = "100%">
		<thead class="table-success">
		<tr>
			<th align = "left">ID</th>
			<th align = "left">Name</th>
			<th align = "left">Address</th>
			<th align = "left">City</th>
			<th align = "left">State</th>
            <th align = "left">Zipcode</th>
            <th align = "left">Location</th>
		</tr>
		</thead>
        <tbody> ';
        
        // $i=0;
        // $array = array();
        // $array2 = array();

		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo '<tr>
			<td align="center">' . $row['sid'] . ' </td>
			<td align="center">' . $row['name'] . ' </td>
			<td align="center">' . $row['address'] . '</td>
			<td align="center">' . $row['city'] . ' </td>
			<td align="center">' . $row['state'] . ' </td>
			<td align="center">' . $row['Zipcode'] . ' </td>
			<td align="center">' . $row['Location'] . ' </td> 
			</tr>
            ';
            
            // echo "$row[sid]";
            // $array[] = $row['sid'];
            // $array2[] = $row['name'];
            // $i++;
		}

		echo '</tbody></table></div>';

		mysqli_free_result ($result);

	} 	
	
	else { 
		echo '<p>Location of Stores is not available</p>';
    }

    // echo $array[0]['sid'];

    // for($j=0;$j<$num;$j++){
    //     // echo $array[$j]['sid'] . "<br>";
    //     $sid = $array[$j];
    //     // $name = $array[$j]['name'];
    //     // $address = $array[$j]['address'];

    //     echo "<script>
    //     document.write($sid + ', ');
    //     // document.write($name + ', ');
    //     // document.write($address + ', ');
    //     </script>";
    // }

mysqli_close($db);

?>

    <div class = "container text-center"> <div id = "map"></div> </div>
    
    <script>
        function initMap(){
            
            var mapOptions = {
                zoom: 4,
                //center: new google.maps.LatLng(39.521741, -96.848224),
                center: new google.maps.LatLng(40.114437,-94.81995),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var infowindow = new google.maps.InfoWindow();

      	    var markerIcon = {
                scaledSize: new google.maps.Size(80, 80),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(32,65),
                labelOrigin: new google.maps.Point(40,33)
      	    };

            var location;
            var mySymbol;
            var marker, m;
            var MarkerLocations= [
            ['1002','ABC',37.77772900,-122.45887800,'699 Argulello Blvd','San Francisco','CA','07811' ] ,
            ['1003','Store1',40.68121200,-74.23543200,'1000 Morris Ave.','Union','NJ','07083' ] ,
            ['1008','Store2',41.88437000,-87.76554000,'210 N Central Ave.','Chicago','IL','60644' ] 
            ];

            
            // alert(hello);
            // var i = "<?php echo $i; ?>";
            // for(i = 0; i < "<?php echo $num; ?>"; i++){
            //     var hello = "<?php echo $array[i]['sid']; ?>";
            //     alert(hello);
            // }

            // var hello = "<?php
            //     echo 
            //     'hello there'
            //     ;
            // ?>";

            // alert(hello);
            
            for (m = 0; m < "<?php echo $num; ?>"; m++) {
                location = new google.maps.LatLng(MarkerLocations[m][2], MarkerLocations[m][3]),
                marker = new google.maps.Marker({ 
                    map: map, 
                    position: location, 
                    icon: markerIcon,	
                    label: {
                        text: MarkerLocations[m][0] ,
                        color: "black",
                        fontSize: "16px",
                        fontWeight: "bold"
                    }  
                });
                google.maps.event.addListener(marker, 'click', (function(marker, m) {
                    return function() {
                    infowindow.setContent("Store Name: " + MarkerLocations[m][1] + "<br>" + MarkerLocations[m][4] + ", " + MarkerLocations[m][5] + ", " + MarkerLocations[m][6] + " " + MarkerLocations[m][7]);
                    infowindow.open(map, marker);
                    }
                })
                (marker, m));
            } 
        }
        google.maps.event.addDomListener(window, 'load', initialize);;
        
    </script>
    <script async defer src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAxLjIpyrsJipRlakpoPEX-IcymihVuL7c&callback=initMap"></script>

</html>

<!-- <html>
    <head>
        <style>
            body:hover{
                cursor: progress;
            }
        </style>
    </head>
    <body>

    </body>
</html> -->