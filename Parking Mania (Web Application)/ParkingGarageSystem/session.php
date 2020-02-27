<?php
	function sessionFunction(){
	session_start();
		if(isset($_SESSION['username']) && isset($_SESSION['password'])){
		}
		else{
	  		echo "
	  		<script>
	   		 	window.alert('Please login to continue!!');
	    		window.location='login.php';
		  		</script>";
		}
	}
?>