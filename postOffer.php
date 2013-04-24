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
				<h1>Post new book offer</h1>
				<p>Please fill in the following fields for posting a new book offer.</p>
				<?php  
					if (isset($_POST['submit'])) {
						$title = $_POST['Title'];
						$author = $_POST['Author'];
						$edition = $_POST['Edition'];
						$isbn = $_POST['ISBN'];
						$category = $_POST['category'];
						$condition = $_POST['condition'];
						$expdate = $_POST['ExpDate'];
						$notes = $_POST['Notes'];
						$price = $_POST['Price'];
						//$picture = $_POST['picture'];
						
						$dbtable = "OFFER";
						$sqlstring = "INSERT INTO $dbtable VALUES ($title, $author, $edition, $isbn, $condition, $category, $price, $sellerid, $postdate, $expdate, $imagepath, $notes)";
						$queryresult = mysql_query($sqlstring, $connection);
						if (!$queryresult) {
							echo mysql_error();
						}
						echo "<p>You succesfully posted a new book offer.</p>";
					} else {
				?>
				<form action="postOffer.php" method="post">
					<table id="inputfields">
						<caption>post new book</caption>
						<tbody>
							<tr>
								<td><label for="Title">Book title:</label></td>
								<td><input type="text" name="Title" id="Title" data-validation-pattern="^.{2,}$" data-validation-message="Please enter a book title." /></td>
							</tr>
							<tr>
								<td><label for="Author">Author:</label></td>
								<td><input type="text" name="Author" id="Author" data-validation-pattern="^.{2,}$" data-validation-message="Please enter an author." /></td>
							</tr>
							<tr>
								<td><label for="Edition">Edition:</label></td>
								<td><input type="text" name="Edition" id="Edition" /></td>
							</tr>
							<tr>
								<td><label for="ISBN">ISBN:</label></td>
								<td><input type="text" name="ISBN" id="ISBN" data-validation-pattern="^[0-9]([-| ]?[0-9]){9,12}$" data-validation-message="Please enter an ISBN-10 or ISBN-13. Ex: 978-1-402-894-626" /></td>
							</tr>
							<tr>
								<td><label for="category">Category:</label></td>
								<td><select id="category">
									<option value="arts">Arts & Photography</option>
									<option value="business">Business & Investing</option>
									<option value="computer">Computers & Technology</option>
									<option value="education">Education & Reference</option>
									<option value="medical">Medical</option>
									<option value="professional">Professional & Technical</option>
									<option value="science">Science & Math</option>
								</select></td>
							</tr>
							<tr>
								<td><label for="condition">Condition:</label></td>
								<td><select id="condition">
									<option value="good">good</option>
									<option value="bad">bad</option>
								</select></td>
							</tr>
							<tr>
								<td><label for="ExpDate">Expiration Date:</label></td>
								<td><input type="date" name="ExpDate" id="ExpDate" /></td>
							</tr>
							<tr>
								<td><label for="Notes">Note:</label></td>
								<td><input type="text" name="Notes" id="Notes" /></td>
							</tr>
							<tr>
								<td><label for="Price">Price:</label></td>
								<td><input type="text" name="Price" id="Price" data-validation-pattern="^[0-9]{1,}\.[0-9]{2}$" data-validation-message="Please enter a price. Ex: 12.00" /></td>
							</tr>
							<tr>
								<td><label for="ImagePath">Picture:</label></td>
								<td><input type="file" name="ImagePath" id="ImagePath" /></td>
							</tr>
						</tbody>
					</table>
					<div class="submitbar">
					<input type="submit" name="submit" id="submit" value="post new book offer" />
					</div>
				</form>
			</div>
		</div>
		<?php   
			} 
			require_once("footer.php");
		?>		
	</div>
	
	</body>
</html>