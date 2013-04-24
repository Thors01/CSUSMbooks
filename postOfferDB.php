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
				<?php 
					$sellerid = 0;
					
					$postdate = date("Y-m-d");
					
					require_once("upload_file.php");
					
					$title = $_POST['Title'];
					$author = $_POST['Author'];
					$edition = $_POST['Edition'];
					$isbn = $_POST['ISBN'];
					$category = $_POST['Category'];
					$condition = $_POST['Condition'];
					$expdate = $_POST['ExpDate'];
					$notes = $_POST['Notes'];
					$price = $_POST['Price'];
					
					
					$sqlstring = "INSERT INTO OFFER (`Title`, `Author`, `Edition`, `ISBN`, `ConditionId`, `CategoryId`, `Price`, `SellerId`, `PostDate`, `ExpDate`, `ImagePath`, `Notes`) VALUES ('$title', '$author', '$edition', '$isbn', $condition, $category, '$price', $sellerid, '$postdate', '$expdate', '$imagepath', '$notes')";
					if (!mysqli_query($connection,$sqlstring))
					  {
					  die('Error: ' . mysqli_error($connection));
					  }
					else {
						echo "<p>You succesfully posted a new book offer.</p>";
					}
				?>
			</div>
		</div>
		<?php   
			require_once("footer.php");
		?>		
	</div>
	
	</body>
</html>