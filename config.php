<?php
$dbhost = "localhost";
$dbuser = "thors01";
$dbpassword = "thors01";
$dbname = "thors01";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


function listCategory($connection) {
	echo "<h1>Categories</h1><ul>";
	$sql_category = "SELECT * FROM CATEGORY";
	$result_category = $connection->query($sql_category);
	while ($row_category = $result_category->fetch_object()) {       
		echo "<li><a href=\"#\">{$row_category->Title}</a></li>";
	} 
	echo "</ul>";
}
?>