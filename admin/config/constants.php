<?php
session_start();
define('SITEURL', 'http://localhost/onlinejob/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('PASSWORD', '');
define('DB_NAME', 'dreamjobs');

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,PASSWORD) or die(mysqli_error());
$db_select = mysqli_select_db($conn,DB_NAME ) or die(mysqli_error());
?>