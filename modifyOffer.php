<?php    
function content($connection) {
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
	$expDate_msg_format = '';
	$imagePath_msg = '';
	
	// gets session information
	if(isset($_SESSION['sellerid']) && isset($_SESSION['sellerfirstname'])) {
		$sellerId = $_SESSION['sellerid'];
		$sellerFirstname = $_SESSION['sellerfirstname'];
	}
	if (!isset($_GET["offerid"])) {
		echo "<p>Sorry, there is no offer.</p>";
	}
	else {
		$offerid = $_GET["offerid"];
	}
	
	// gets book details for a particular book offer id
	$sql_offer = "SELECT * FROM OFFER WHERE OfferId=$offerid";
	$result_offer = $connection->query($sql_offer);
	
	$bookDetails = mysqli_fetch_array($result_offer);
	
	$title = $bookDetails[1];
	$edition = $bookDetails[3];
	$author = $bookDetails[2];
	$notes = $bookDetails[12];
	$price = $bookDetails[7];
	$category = $bookDetails[6];
	$condition = $bookDetails[5];
	$expDate = $bookDetails[10];
	$imagePath = $bookDetails[11];
	
	// convert isbn
	if (strlen($bookDetails[4]) == 13) {
		$isbn = substr($bookDetails[4], 0, 3)."-".substr($bookDetails[4], 3, 10);
	}
	if (strlen($bookDetails[4]) == 10) {
		$isbn = substr($bookDetails[4], 0, 1)."-".substr($bookDetails[4], 1, 9);
	}
?>	
	<h1>Modify existing book offer</h1>
	<p>Please fill in the following fields for modifying an existing book offer.</p>
<?php
	require_once("postOfferForm.php");
}

include("layout.php");

?>