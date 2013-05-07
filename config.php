<?php
// config.php consists of common functions which are used on all pages

// establish db connection
$dbhost = "localhost";
$dbuser = "group4";
$dbpassword = "n4ecv3w8";
$dbname = "group4";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// create logfile
function createLog($activity) {
	$logfile = 'log/activity.txt';
	$logtime = date('Y-m-d H:i:s');
	$activity_log = $logtime . " -- " . $activity . "\n";
	file_put_contents($logfile, $activity_log, FILE_APPEND | LOCK_EX);
}

// create left sidebar with category navigation
function listCategory($connection) {
	echo "<h1>Categories</h1><ul>";
	$sql_category = "SELECT * FROM CATEGORY";
	$result_category = $connection->query($sql_category);
	while ($row_category = $result_category->fetch_object()) {
		if(isset($_GET["category"])) {
			$categoryid = $_GET["category"];
			if($categoryid == $row_category->CategoryId) {
				echo "<li><a href=\"index.php?category={$row_category->CategoryId}\"><b>{$row_category->Title}</b></a></li>";
			} else {
				echo "<li><a href=\"index.php?category={$row_category->CategoryId}\">{$row_category->Title}</a></li>";			
			}
		} else {
			echo "<li><a href=\"index.php?category={$row_category->CategoryId}\">{$row_category->Title}</a></li>";
		}
	}
	echo "</ul>";
}

// create global navigation in header
function globalNavigation($connection) {
	session_start();
	if(isset($_SESSION['sellerid'])) {
		$sellerFirstname = $_SESSION['sellerfirstname'];
		if($_SESSION['sellerid'] == 1) {
			echo "<ul>
					<li class='smallcaps'>You're logged in as <b>$sellerFirstname (Admin)</b></li>
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