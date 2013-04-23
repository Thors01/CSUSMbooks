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
				<h1>Book details</h1>
					
				<img src="img/example_cover.png" alt="Example Book" id="bookcover" />
				
				<table id="bookdetails">
					<caption>Book Details</caption>
					<tr>
						<td class="leftred">Book Title:</td>
						<td>Programming the World Wide Web (7th)</td>
					</tr>
					<tr>
						<td class="leftred">Author:</td>
						<td>Robert W. Sebesta</td>
					</tr>
					<tr>
						<td class="leftred">ISBN:</td>
						<td>978-0132665810</td>
					</tr>
					<tr>
						<td class="leftred">Category:</td>
						<td>Computers &amp; Technology</td>
					</tr>
					<tr>
						<td class="leftred">Posted on:</td>
						<td>March 12, 2013</td>
					</tr>
					<tr>
						<td class="leftred">Expires on:</td>
						<td>March 30, 2013</td>
					</tr>
					<tr>
						<td class="leftred">Book condition:</td>
						<td>rarley used</td>
					</tr>
					<tr>
						<td class="leftred">Note from seller:</td>
						<td>This book was rarely used in CIS444 and is still in good condition.</td>
					</tr>
					<tr>
						<td class="leftred">Price:</td>
						<td>$25.00</td>
					</tr>
				</table>
				
				<div class="clear"></div>
				<div class="submitbar">
				<input type="button" name="button" id="button" value="contact seller" onclick="window.location='contactSeller.html';"/>
				</div>
			</div>
		</div>
		<?php    
			require_once("footer.php");
		?>		
	</div>
	
	</body>
</html>