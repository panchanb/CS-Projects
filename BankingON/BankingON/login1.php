<?php

require('MySQL_Connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT login FROM Customers WHERE login = '$username'";
$result = @mysqli_query($db, $query);
$query2 = "SELECT password FROM Customers WHERE login = '$username' and password = '$password'";
$result2 = @mysqli_query($db, $query2);

// This code will run when the username is in the database
if(mysqli_num_rows($result) == 1){
	
	// This code will run when both the username and password is in the database;
	if(mysqli_num_rows($result2) == 1){

		//This code is to find the ip address of the user

		$ip = $_SERVER['REMOTE_ADDR'];
		$IPv4 = explode(".", $ip);

		echo "<center>Your IP address is: $ip </center>";

		if ($IPv4[0] == "10"){
			echo "<center>You are using Kean wireless network</center>";
		}
		elseif($IPv4[0] == "131"){
			echo"<center>You are using Kean Wired network</center>";
		}
		else {
			echo "<center>You are NOT from Kean University</center>";
		}

		//This code is to find the browser and operating system of the user

		$SystemInfo = $_SERVER['HTTP_USER_AGENT'];
		echo "<center>$SystemInfo</center>";
		
		if(strpos($SystemInfo,"Safari")){
			if(strpos($SystemInfo,"Chrome")){
				if(strpos($SystemInfo,"Edge") || strpos($SystemInfo,"Edg")){
					$browserInfo = "Edge";
				}
				else{
					$browserInfo = "Chrome";
				}
			}
			else{
				$browserInfo = "Safari";
			}
		}
		elseif(strpos($SystemInfo,"Firefox")){
			$browserInfo = "Firefox";
		}
		elseif(strpos($SystemInfo,"Trident")){
			$browserInfo = "Internet Explorer";
		}
		else{
			$browserInfo = "Unkown";
		}

		if(strpos($SystemInfo,"Macintosh")){
			$OSInfo = "MacOS";
		}
		elseif(strpos($SystemInfo,"Windows")){
			$OSInfo = "Windows";
		}
		elseif(strpos($SystemInfo,"Linux")){
			$OSInfo = "Linux";
		}
		else{
			$OSInfo = "Unknown";
		}
		
		echo "<center>You are using $browserInfo Browser on a $OSInfo Operating System</center>";

		//This code is to get name, age, and address of the customer

		$getCustomerDetails = "SELECT * FROM Customers WHERE login = '$username'";
    	$result3 = @mysqli_query($db, $getCustomerDetails);
		$row = mysqli_fetch_array($result3);

    	$name = $row['name'];
    	$DOB = $row['DOB'];
		$Street = $row['street'];
		$City = $row['city'];
		$State = $row['state'];
		$ZipCode = $row['zipcode'];
		$Address = $Street . ", " . $City . ", " . $State . ", " . $ZipCode;

		// Calculate Age
		$currentDate =  date("Y-m-d");
		$difference = abs(strtotime($currentDate) - strtotime($DOB));
		$Age = floor($difference / (365*60*60*24));  

		echo "<center>Welcome: $name</center>";
		echo "<center>Age: $Age</center>";
		echo "<center>Address: $Address</center>";

		// This code will display the Money_panchab table

		echo "<center><br><h1> The transactions for $name are: </h1></br></center>";

		// this query retrives the columns if cid in CPS3740_2020S.Money_panchanb is equal to id in CPS3740.Customers
		// and only if the login = $username (huang)
		// if huang is not the username (login) then there should be no data available
		$query = "select mid, code, type, amount, mydatetime, note from CPS3740_2020S.Money_panchanb m, CPS3740.Customers s where m.cid = s.id and login = '$username'";
		$result = @mysqli_query($db, $query);
		// $num counts the rows that are retrived from the tables
		$num = mysqli_num_rows($result);

		if($num > 0){
			
			echo "<center><Table border =1></center>";
			echo '<table width = "100%">
			<thead>
			<tr>
				<th align = "left">mid</th>
				<th align = "left">code</th>
				<th align = "left">type</th>
				<th align = "left">amount</th>
				<th align = "left">mydatetime</th>
				<th align = "left">note</th>
			</tr>
			</thead>
			<tbody> ';

			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

				echo '<tr>
				<td align="center">' . $row['mid'] . ' </td>
				<td align="center">' . $row['code'] . ' </td>
				<td align="center">' . $row['type'] . ' </td>';
				// This checks the amount that is retrieved from the database
				// and if the amount is less then zero (negative) it will be shown in red color
				// other will be green color
				if($row['amount'] < 0){
					echo'<td align="center"><font color = red>' . $row['amount'] . ' </td></font>';
				}
				else{
					echo'<td align="center"><font color = green>' . $row['amount'] . ' </td></font>';
				}
				echo'
				<td align="center">' . $row['mydatetime'] . ' </td> 
				<td align="center">' . $row['note'] . ' </td>
				</tr>
				';
			}

			echo '</tbody></table>';

			mysqli_free_result ($result);

		} 	
		
		else { 
			echo '<center><h1><font color = red> No transactions</font></h1></center>';
		}

		// this query calculates the sum of amount column from CPS3740_2020S.Money_panchanb
		// only cid from Money_panchanb table is equal to id from Customers table
		// and the login is equal to $username (huang)
		// and if huang is not the username (login) then there should be no data available
		$query4 = "SELECT SUM(amount) as total FROM CPS3740_2020S.Money_panchanb, CPS3740.Customers where cid = id and login = '$username'";
		$result4 = @mysqli_query($db, $query4);
		$num = mysqli_num_rows($result4);

		$row = mysqli_fetch_array($result4);
		$total = $row['total'];

		// if statment checks if the number of rows is greater than 0
		// and $total ($total is the column name) is not empty or NULL
		if($num > 0 && !$total == ''){
			echo "<h2><font color = blue> Total Balance: </font> <font color = green> $$total </font></h2>";
		}
		else{
			echo "<center><h2><font color = blue> Total Balance: </font> <font color = red> Not available </font></h2></center>";
		}

		// Close the database connection
		mysqli_close($db);	
	}

	// This error is displayed when username in the database matched and password did not match!
	else{
		echo "<script>
	window.alert('$username is in the bank system but password did not matched!');
	window.location='p1.html'; 
	</script>";
	}
}
// This error is displayed when both username and password did not match!
else{
	echo "<script>
	window.alert('$username is not in the bank system');
	window.location='p1.html'; 
	</script>";
}

?>


<!-- Style sheet for tables -->
<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;	
	}

	td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
	  	background-color: #dddddd;
	}
</style>