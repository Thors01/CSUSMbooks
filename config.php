<?php
$dbhost = "localhost";
$dbuser = "thors01";
$dbpassword = "thors01";
$dbname = "thors01";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>