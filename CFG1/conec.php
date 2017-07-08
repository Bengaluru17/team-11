
<?php
$MyUsername = "root";  // enter your username for mysqli
$MyPassword = "blueguys";  // enter your password for mysqli
$MyHostname = "localhost";      // this is usually "localhost" unless your database resides on a different server

$dbh = mysqli_connect($MyHostname , $MyUsername, $MyPassword);
$selected = mysqli_select_db($dbh, "team11");
//mysqli(instead of mysql) is used throughout the code
//In mysqli_select_db() function the db name should come second
?>
