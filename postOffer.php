<?php
function content() {
	include("config.php");
	if(isset($_POST['submit'])) {
		$title = $_POST['title'];
		$author = $_POST['author'];
		$edition = $_POST['edition'];
		$isbn = $_POST['isbn'];
		$category = $_POST['category'];
		$condition = $_POST['condition'];
		$expDate = $_POST['expdate'];
		$notes = $_POST['notes'];
		$price = $_POST['price'];
		
		// toDo: Should be the id depending on the logged in user.
		$sellerId = 0;
		
		$postDate = date("Y-m-d");
		if(empty($expDate)) {
			$exp = mktime(0,0,0,date("m"),date("d")+14,date("Y"));
			$expDate = date("Y-m-d", $exp);
		}
				
		$imagePath = "";
		require_once("lib/upload_file.php");
		
		if(empty($title) || empty($author) || empty($isbn) || empty($price) 
		|| !preg_match('/^.{2,}$/', $title) 
		|| !preg_match('/^.{2,}$/', $author) 
		|| !preg_match('/^[0-9]([-| ]?[0-9]){9,12}$/', $isbn) 
		|| !preg_match('/^[0-9]{1,}\.[0-9]{2}$/', $price)) {
			echo "<h1>Post new book offer</h1>";
			echo "<p class=\"error\">Please check your input!</p>";
			require_once("postOfferForm.php");
		}
		else {
			$sqlstring = "INSERT INTO OFFER (`Title`, `Author`, `Edition`, `ISBN`, `ConditionId`, `CategoryId`, `Price`, `SellerId`, `PostDate`, `ExpDate`, `ImagePath`, `Notes`) VALUES ('$title', '$author', '$edition', '$isbn', $condition, $category, '$price', $sellerId, '$postDate', '$expDate', '$imagePath', '$notes')";
			if (!mysqli_query($connection,$sqlstring))
			  {
			  die('Error: ' . mysqli_error($connection));
			  }
			else {
				echo "<p>You succesfully posted a new book offer.</p>";
			}
		}
	}
	
	else {
	?>

	<h1>Post new book offer</h1>
	<p>Please fill in the following fields for posting a new book offer.</p>
	<?php 
	require_once("postOfferForm.php");
	}
}

include("layout.php");
?>