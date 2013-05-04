<?php    
function content($connection) {
	$sellerId = '';
	$offerid = '';
	
	if(isset($_SESSION['sellerid']) && isset($_SESSION['sellerfirstname'])) {
		$sellerId = $_SESSION['sellerid'];
		$sellerFirstname = $_SESSION['sellerfirstname'];
	}
		
	if(isset($_GET["offerid"])) {
		$offerid = $_GET["offerid"];
	}
	
	if($sellerId == 1) {
		$sql_offer = "DELETE FROM OFFER WHERE OfferId=$offerid";
	}
	else {
		$sql_offer = "DELETE FROM OFFER WHERE OfferId=$offerid AND SellerId=$sellerId";
	}
	
	mysqli_query($connection,$sql_offer);
	if (mysqli_affected_rows($connection) != 1) {
		echo "We're sorry, an error occured.";
	}
	else {
	createLog("$sellerFirstname (SellerId=$sellerId) deleted the book offer $offerid.");
	?>
		<h1>Deleting an existing book offer</h1>
		<p>You successfully deleted an existing book offer.</p>	
	<?php			
	}
}

include("layout.php");

?>