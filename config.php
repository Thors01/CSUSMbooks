<?php
$dbhost = "localhost";
$dbuser = "thors01";
$dbpassword = "thors01";
$dbname = "thors01";
$connection = mysql_connect($dbhost, $dbuser, $dbpassword);

if (!$connection) {
	echo "<p>The database server is not available</p>";
}
$dbavailable = mysql_select_db($dbname);
?>