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
				<form action="postOfferDB.php" method="post" enctype="multipart/form-data">
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
								<td><label for="Category">Category:</label></td>
								<td>
									<?php 
										$sql_category = "SELECT * FROM CATEGORY";
										$result_category = $connection->query($sql_category);
									?>
									<select id="Category" name="Category">
									<?php 
										while ($row_category = $result_category->fetch_object()) 
										{       
										echo "<option value='{$row_category->CategoryId}'>{$row_category->Title}</option>\n";
										}   
									?> 
									</select>
								</td>
							</tr>
							<tr>
								<td><label for="Condition">Condition:</label></td>
								<td>
									<?php 
										$sql_condition = "SELECT * FROM `CONDITION`";
										$result_condition = $connection->query($sql_condition);
									?>
									<select id="Condition" name="Condition">    
									<?php 
										while ($row_condition = $result_condition->fetch_object()) 
										{       
										echo "<option value='{$row_condition->ConditionId}'>{$row_condition->Description}</option>\n";
										}   
									?> 
									</select>
								</td>
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
								<td><input type="file" name="file" id="file" /></td>
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
			require_once("footer.php");
		?>		
	</div>
	
	</body>
</html>