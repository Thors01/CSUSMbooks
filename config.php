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
		echo "<li><a href=\"index.php?category={$row_category->CategoryId}\">{$row_category->Title}</a></li>";
	} 
	echo "</ul>";
}


function globalNavigation($connection) {
	session_start();
	if(isset($_SESSION['sellerid'])) {
		$sellerFirstname = $_SESSION['sellerfirstname'];
		if($_SESSION['sellerid'] == 1) {
			echo "<ul>
					<li class='smallcaps'>You're logged in as <b>admin $sellerFirstname</b></li>
					<li>|</li>
					<li><a href='logout.php'>Logout</a></li>
					<li>|</li>
					<li><a href='register.php'>Register</a></li>
					<li>|</li>
					<li><a href='manageAccount.php'>Account</a></li>
					<li>|</li>
					<li><a href='howTo.php'>HowTo</a></li>
				</ul>";
		} 
		else {
			echo "<ul>
					<li class='smallcaps'>You're logged in as <b>$sellerFirstname</b></li>
					<li>|</li>
					<li><a href='logout.php'>Logout</a></li>
					<li>|</li>
					<li><a href='register.php'>Register</a></li>
					<li>|</li>
					<li><a href='manageAccount.php'>Account</a></li>
					<li>|</li>
					<li><a href='howTo.php'>HowTo</a></li>
				</ul>";
		}
	}
	else {
		echo "<ul>
				<li><a href='login.php'>Login</a></li>
				<li>|</li>
				<li><a href='register.php'>Register</a></li>
				<li>|</li>
				<li><a href='manageAccount.php'>Account</a></li>
				<li>|</li>
				<li><a href='howTo.php'>HowTo</a></li>
			</ul>";
	}
}
?>