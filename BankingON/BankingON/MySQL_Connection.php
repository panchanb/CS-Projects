<?php

define('DB_USER', 'panchanb');
define('DB_PASSWORD', '1099821');
define('DB_HOST', 'imc.kean.edu');
define('DB_NAME', 'CPS3740');

$db = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

mysqli_set_charset($db, 'utf8');

?>