<?php
session_start();
if(isset($_COOKIE['customerID'])){
    setcookie('customerID', '', time()-3600);
	header('location: p2.html');	
}
else{
    echo "
        <script>
            window.alert('Cookie has not been set. Please login again to continue!!');
            window.location='p2.html';
        </script>";
}
?>