<?php
function content($connection) {
	$offerid = '';
	$title = '';
	$author = '';
	$edition = '';
	$isbn = '';
	$category = '';
	$condition = '';
	$expDate = '';
	$notes = '';
	$price = '';
	$imagePath = '';	
	$imagePath_msg = '';
	$expDate_msg_format = '';
	$expDate_format_wrong = '';
	
	if(isset($_SESSION['sellerid']) && isset($_SESSION['sellerfirstname'])) {
		$sellerId = $_SESSION['sellerid'];
		$sellerFirstname = $_SESSION['sellerfirstname'];
	}
	
	if(isset($_POST['submit'])) {
		if (isset($_POST['offerid'])) {
			$offerid = $_POST['offerid'];
		}
		else {
			$offerid = '';
		}
		
		// getting the variables from the form if an error occured
		$title = $_POST['title'];
		$author = $_POST['author'];
		$edition = $_POST['edition'];
		$isbn = $_POST['isbn'];
		$category = $_POST['category'];
		$condition = $_POST['condition'];
		$expDate = $_POST['expdate'];
		$notes = $_POST['notes'];
		$price = $_POST['price'];
		$imagePath = $_POST['imagePath'];
		
		// converting the isbn in just digits
		$isbn = str_replace("-", "", $isbn);
		
		// calculate expDate: today + 14 days if not set by seller
		$postDate = date("Y-m-d");
		if(empty($expDate)) {
			$exp = mktime(0,0,0,date("m"),date("d")+14,date("Y"));
			$expDate = date("Y-m-d", $exp);
		}
		else {
			if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $expDate)) {
				$expDate_msg_format = "<span class='validation-error'>The date format has to be: yyyy-mm-dd!</span>";
				$expDate_format_wrong = true;
			}
			else {
				$expDate_format_wrong = false;
			}
		}
		
		// if a file is chosen, try to upload it and save it in $imagePath
		if ($_FILES['file']['size'] != 0) {
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$extension = end(explode(".", $_FILES["file"]["name"]));
			
			if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES["file"]["type"] == "image/png"))
				&& ($_FILES["file"]["size"] < 1048576)
				&& in_array($extension, $allowedExts)) {
				
				if ($_FILES["file"]["error"] > 0) {
					echo "<p class=\"error\">Error for file upload: " . $_FILES["file"]["error"] . "</p>";
				}
				else {
					$file = $_FILES["file"]["name"];
					$pos = strpos($file, ".");
					$filename = substr($file, 0, $pos);
					$i = 0;
					$exists = false;
					
					while (!$exists) {
						if(file_exists("upload/".$filename."_".$i.".".$extension)) {
							$i++;
						}
						else {
							move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$filename."_".$i.".".$extension);
							$exists = true;
						}
					}
					
					$imagePath = "upload/".$filename."_".$i.".".$extension;	
					$imagePath_msg = "<p class=\"error\">You successfully uploaded an image.</p>";
				}
			}
			else {
				$imagePath_msg = "<p class=\"error\">Invalid file! Your file should be gif, jpg or png and smaller than 1024kB.</p>";
			}
		}
		
		// validate the input fields
		if(empty($title) || empty($author) || empty($isbn) || empty($price) 
			|| !preg_match('/^.{2,}$/', $title) 
			|| !preg_match('/^.{2,}$/', $author) 
			|| !preg_match('/^[0-9]([-| ]?[0-9]){9,12}$/', $isbn) 
			|| !preg_match('/^[0-9]{1,4}\.[0-9]{2}$/', $price)
			|| $expDate_format_wrong) {
			echo "<h1>Post new book offer</h1>";
			echo "<p class=\"error\">Please check your input!</p>";
			require_once("postOfferForm.php");
		}
		// if no validation error occurred store it to database
		else {
		
			if ($imagePath == '') {
				$imagePath = "img/example_cover.png";
			}
			
			
			if ($offerid != '') {
				$sqlstring = "UPDATE OFFER SET `Title`='$title', `Author`='$author', `Edition`='$edition', `ISBN`='$isbn', `ConditionId`=$condition, `CategoryId`=$category, `Price`='$price', `SellerId`=$sellerId, `PostDate`='$postDate', `ExpDate`='$expDate', `ImagePath`='$imagePath', `Notes`='$notes' WHERE `OfferId` = $offerid";
				$modify = true;
			}
			else {
				$sqlstring = "INSERT INTO OFFER (`Title`, `Author`, `Edition`, `ISBN`, `ConditionId`, `CategoryId`, `Price`, `SellerId`, `PostDate`, `ExpDate`, `ImagePath`, `Notes`) VALUES ('$title', '$author', '$edition', '$isbn', $condition, $category, '$price', $sellerId, '$postDate', '$expDate', '$imagePath', '$notes')";
				$modify = false;
			}
			
			if (!mysqli_query($connection,$sqlstring)) {
				  die('Error: ' . mysqli_error($connection));
			}
			else {
				if ($modify) {
					echo "<h1>Modify existing book offer</h1>";
					echo "<p>You succesfully modified an existing book offer.</p>";
				}
				else {
					echo "<h1>Post new book offer</h1>";
					echo "<p>You succesfully posted a new book offer.</p>";
					
				}				
			}
			
		}
	}
	
	else {
		if(isset($sellerId)) {
			?>
			<h1>Post new book offer</h1>
			<p><b><?= $sellerFirstname ?></b>, please fill in the following fields for posting a new book offer.</p>
			<?php 
			require_once("postOfferForm.php");
		}
		else {
			// toDo: redirect in order to login and going back to postOffer automatically
			?>
			<h1>Post new book offer</h1>
			<p>Please login first: <a href="login.php">Login</a></p>
			<?php
		}	
	}
}

include("layout.php");
?>