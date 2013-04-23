<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Get more for your old books!</title>
		<link rel="stylesheet" media="screen" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="css/styles.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/validation.js"></script>
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
				<h1>Request new password</h1>
				<p>Here you can request a new password for your account.</p>
				<form action="#">
					<table id="inputfields">
						<caption>forgot password</caption>
						<tbody>
							<tr>
								<td><label for="mail">Your mail:</label></td>
								<td><input type="text" name="mail" id="mail" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@csusm.edu$" data-validation-message="Please enter a valid @csusm.edu mail address." /></td>
							</tr>
							<tr>
								<td><label for="confirmmail">Confirm mail:</label></td>
								<td><input type="text" name="confirmmail" id="confirmmail" data-validation-match="#mail" data-validation-message="Your mails must match" /></td>
							</tr>
						</tbody>
					</table>
					
					<div class="submitbar">
					<input type="submit" name="submit" id="submit" value="request password" />
					</div>
				</form>
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