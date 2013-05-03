<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Get more for your old books! Test</title>
		<link rel="stylesheet" media="screen" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="css/styles.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
		<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#offers").tablesorter();
			});
		</script>
        <script type="text/javascript" src="js/validation.js"></script>
	</head>
	<body>

	<div id="border">
		<div id="header">
			<div id="logo">
				<a href="index.php"><img src="img/header_logo.png" alt="Logo Books" /></a>
			</div>
			<div id="slogan">
				<img src="img/header_slogan.png" alt="Logo Slogan" />
			</div>
			<div class="globalnavigation">
				<? globalNavigation($connection); ?>
			</div>
		</div>
		<div id="contentarea">
			<div id="seperator">
				<a href="postOffer.php" id="post_offer">Post offer</a>
				<div id="searchbar">
				<form action="index.php" method="post">
					<label for="search_string">Search:</label>
					<input type="text" name="search_string" id="search_string" placeholder="by ISBN or title" />
					<input type="submit" name="search_submit" id="search_submit" value="" />
				</form>
				</div>
			</div>
			<div id="navigation">
				<? listCategory($connection); ?> 	
			</div>
			
			<div id="content">
				<? content($connection); ?>
			</div>
		</div>
		<div id="footer">
			<div class="bottomnavigation">
				<ul>
					<li><a href="imprint.php">Imprint</a></li>
					<li>|</li>
					<li><a href="contactAdmin.php">Contact</a></li>
				</ul>
				<p>Get more for your old books | CSUSMbooks</p>
			</div>
		</div>		
	</div>
	
	</body>
</html>