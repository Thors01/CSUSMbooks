<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Get more for your old books!</title>
		<link rel="stylesheet" media="screen" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="css/styles.css" />
	</head>
	<body>

	<div id="border">
		<?php    
			require_once("header.php");
		?>	
		<div id="contentarea">
			<?php    
				require_once("searchbar.php");
			?>
			<div id="navigation">
				<h1>Categories</h1>
				
				<ul>
					<li><a href="#">Arts & Photography</a></li>
					<li><a href="#">Business & Investing</a></li>
					<li><a href="#">Computers & Technology</a></li>
					<li><a href="#">Education & Reference</a></li>
					<li><a href="#">Medical</a></li>
					<li><a href="#">Professional & Technical</a></li>
					<li><a href="#">Science & Math</a></li>
				</ul>

			</div>
			
			<div id="content">
				<h1>Imprint</h1>
				<p>Responsible Admins:<br />
					Firstname Lastname<br />
					<br />
					Phone Number:<br />
					760.750.4000<br />
					<br />
					Mailing Address:<br />
					California State University San Marcos<br />
					333 S. Twin Oaks Valley Rd.<br />
					San Marcos, CA 92096-0001</p>
			</div>
		</div>
		<?php    
			require_once("footer.php");
		?>
	</div>
	
	</body>
</html>