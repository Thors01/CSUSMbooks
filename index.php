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
				<table id="offers">
					<caption>Book offer</caption>
					<thead>
						<tr>
							<th>Book title <img src="img/arrow_up.png" alt="sort desc" /><img src="img/arrow_down.png" alt="sort asc" /></th>
							<th>Author <img src="img/arrow_up.png" alt="sort desc" /><img src="img/arrow_down.png" alt="sort asc" /></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><a href="bookDetails.php">Programming the World Wide Web (7th)</a></td>
							<td>Robert W. Sebesta</td>
						</tr>
						<tr>
							<td>Modern Database Management (8th)</td>
							<td>Jeffrey A. Hoffer</td>
						</tr>
						<tr>
							<td>Linear Programming</td>
							<td>Vasek Chvatal</td>
						</tr>
						<tr>
							<td>Financial Accounting</td>
							<td>Paul D. Kimmel</td>
						</tr>
						<tr>
							<td><a href="bookDetails.html">Programming the World Wide Web (7th)</a></td>
							<td>Robert W. Sebesta</td>
						</tr>
						<tr>
							<td>Modern Database Management (8th)</td>
							<td>Jeffrey A. Hoffer</td>
						</tr>
						<tr>
							<td>Linear Programming</td>
							<td>Vasek Chvatal</td>
						</tr>
						<tr>
							<td>Financial Accounting</td>
							<td>Paul D. Kimmel</td>
						</tr>
						<tr>
							<td><a href="bookDetails.html">Programming the World Wide Web (7th)</a></td>
							<td>Robert W. Sebesta</td>
						</tr>
						<tr>
							<td>Modern Database Management (8th)</td>
							<td>Jeffrey A. Hoffer</td>
						</tr>
						<tr>
							<td>Linear Programming</td>
							<td>Vasek Chvatal</td>
						</tr>
						<tr>
							<td>Financial Accounting</td>
							<td>Paul D. Kimmel</td>
						</tr>
						<tr>
							<td><a href="bookDetails.html">Programming the World Wide Web (7th)</a></td>
							<td>Robert W. Sebesta</td>
						</tr>
						<tr>
							<td>Modern Database Management (8th)</td>
							<td>Jeffrey A. Hoffer</td>
						</tr>
						<tr>
							<td>Linear Programming</td>
							<td>Vasek Chvatal</td>
						</tr>
						<tr>
							<td>Financial Accounting</td>
							<td>Paul D. Kimmel</td>
						</tr>
					</tbody>
				</table>
			</div>	
		</div>
		<?php    
			require_once("footer.php");
		?>		
	</div>
	</body>
</html>