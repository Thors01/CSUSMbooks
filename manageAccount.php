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
		
		<div id="header">
			<div id="logo">
				<a href="index.html"><img src="img/header_logo.png" alt="Logo Books" /></a>
			</div>
			<div id="slogan">
				<img src="img/header_slogan.png" alt="Logo Slogan" />
			</div>
			<div class="globalnavigation">
				<ul>
					<li><a href="login.html">Login</a></li>
					<li>|</li>
					<li><a href="register.html">Register</a></li>
					<li>|</li>
					<li><a href="manageAccount.html">Account</a></li>
					<li>|</li>
					<li><a href="howTo.html">HowTo</a></li>
				</ul>
			</div>
		</div>
	
		<div id="contentarea">
			<div id="seperator">
				<a href="postOffer.html" id="post_offer">Post offer</a>
				<div id="searchbar">
				<form action="#">
					<label for="search_string">Search:</label>
					<input type="text" name="search_string" id="search_string" placeholder="by ISBN or title" />
					<input type="submit" name="search_submit" id="search_submit" value="" />
				</form>
				</div>
			</div>
			
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
				<h1>manage account</h1>
				<p>Here you can manage your account.</p>
				<a href="changeData.html" class="button">Change your data</a><br />
				<a href="postOffer.html" class="button">Post new book offer</a>
				<br />
				<br />
				<br />
				<br />
				<p>Your existing book offers:</p>
				<table id="offers">
					<caption>Book offer</caption>
					<thead>
						<tr>
							<th>Book title</th>
							<th>Author</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><a href="bookDetails.html">Programming the World Wide Web (7th)</a></td>
							<td>Robert W. Sebesta</td>
							<td><a href="modifyOffer.html" class="offer-icon"><img src="img/edit16.png" alt="edit offer" class="offer-icon" /></a><a href="#" class="offer-icon"><img src="img/delete16.png" alt="delete offer" /></a></td>
						</tr>
						<tr>
							<td>Modern Database Management (8th)</td>
							<td>Jeffrey A. Hoffer</td>
							<td><a href="modifyOffer.html" class="offer-icon"><img src="img/edit16.png" alt="edit offer" class="offer-icon" /></a><a href="#" class="offer-icon"><img src="img/delete16.png" alt="delete offer" /></a></td>
						</tr>
						<tr>
							<td>Linear Programming</td>
							<td>Vasek Chvatal</td>
							<td><a href="modifyOffer.html" class="offer-icon"><img src="img/edit16.png" alt="edit offer" class="offer-icon" /></a><a href="#" class="offer-icon"><img src="img/delete16.png" alt="delete offer" /></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
		<div id="footer">
			<div class="bottomnavigation">
				<ul>
					<li><a href="imprint.html">Imprint</a></li>
					<li>|</li>
					<li><a href="contactAdmin.html">Contact</a></li>
				</ul>
				<p>Get more for your old books | CSUSMbooks</p>
			</div>
		</div>
		
	</div>
	
	</body>
</html>