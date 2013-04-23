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
		<?php    
			require_once("header.php");
		?>	
		<div id="contentarea">
			<div id="seperator">
				<a href="postOffer.php" id="post_offer">Post offer</a>
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
				<h1>Contact Seller</h1>
				<p>You’re contacting the seller because you’re interested in:<br /><span class="subject">Programming the World Wide Web (7th)</span></p>

				<form action="#">
					<table id="inputfields">
						<caption>contact seller</caption>
						<tbody>
							<tr>
								<td><label for="name">Your name:</label></td>
								<td><input type="text" name="name" id="name" data-validation-pattern="^[^ 0-9]{1,}$" data-validation-message="Please enter a valid name. Ex: John Smith" /></td>
							</tr>
							<tr>
								<td><label for="mail">Your mail:</label></td>
								<td><input type="text" name="mail" id="mail" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$" data-validation-message="Please enter a valid email. Ex: josh001@mail.com" /></td>
							</tr>
							<tr>
								<td><label for="phone">Your phone:</label></td>
								<td><input type="text" name="phone" id="phone" data-validation-pattern="^[0-9]{6,}$" data-validation-message="Please enter a valid phone number." /></td>
							</tr>
							<tr>
								<td><label for="subject">Subject:</label></td>
								<td><input type="text" name="subject" id="subject"  data-validation-pattern="^.{2,}$" data-validation-message="Please enter a subject." /></td>
							</tr>
							<tr>
								<td><label for="message">Message:</label></td>
								<td><textarea name="message" id="message" cols="50" rows="10"></textarea></td>
							</tr>
						</tbody>
					</table>
					
					<div class="submitbar">
					<input type="submit" name="submit" id="submit" value="Send message" />
					</div>
				</form>
			</div>
		</div>
		<?php    
			require_once("footer.php");
		?>
	</div>
	
	</body>
</html>