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
				<h1>Change your personal data</h1>
				<p>Here you can change your personal data.<br/>
					Please fill in the following fields:</p>
				
				
				<form action="#" method="post">
				
					<table id="inputfields">
						<caption>register</caption>
						<tbody>
							<tr>
								<td><label for="firstname">Firstname:</label></td>
								<td><input type="text" value="John" name="firstname" id="firstname" data-validation-pattern="^[^ 0-9]{1,}$" data-validation-message="Please enter a valid name. Ex: John" /></td>
							</tr>
							<tr>
								<td><label for="lastname">Lastname:</label></td>
								<td><input type="text" value="Smith" name="lastname" id="lastname" data-validation-pattern="^[^ 0-9]{1,}$" data-validation-message="Please enter a valid name. Ex: Smith" /></td>
							</tr>
							<tr>
								<td><label for="mail">Your mail:</label></td>
								<td><input type="text" value="john.smith@csusm.edu" name="mail" id="mail" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@csusm.edu$" data-validation-message="Please enter a valid @csusm.edu mail address." /></td>
							</tr>
							<tr>
								<td><label for="confirmmail">Confirm mail:</label></td>
								<td><input type="text" value="john.smith@csusm.edu" name="confirmmail" id="confirmmail" data-validation-match="#mail" data-validation-message="Your mails must match" /></td>
							</tr>
							<tr>
								<td><label for="phone">(Phone:)</label></td>
								<td><input type="text" value="760128905" name="phone" id="phone" data-validation-pattern="^[0-9]{6,}$" data-validation-message="Please enter a valid phone number." /></td>
							</tr>
							<tr>
								<td><label for="password">Password:</label></td>
								<td><input type="text" name="password" id="password" data-validation-pattern="^.{6,}$" data-validation-message="Please enter a valid password. Password must be at least 6 chars in length." /></td>
							</tr>
							<tr>
								<td><label for="confirmpassword">Confirm password:</label></td>
								<td><input type="text" name="confirmpassword" id="confirmpassword" data-validation-match="#password" data-validation-message="Your passwords must match." /></td>
							</tr>
						</tbody>
					</table>
					
					
					<div class="submitbar">
					<input type="submit" name="submit" id="submit" value="save changes of personal data" />
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