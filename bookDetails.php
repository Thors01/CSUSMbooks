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
	
	if (!isset($_GET["offerid"])) {
		echo "Sorry, there is no offer.";
	}
	else {
		$offerid = $_GET["offerid"];
	}
	
	$sql_offer = "SELECT * FROM OFFER WHERE OfferId=$offerid";
	$result_offer = $connection->query($sql_offer);
	
	$bookDetails = mysqli_fetch_array($result_offer);
	
	// get category
	$categoryId = $bookDetails[6];
	$sql_offer_category = "SELECT Title FROM CATEGORY WHERE CategoryId=$categoryId";
	$categoryTitle = mysqli_fetch_array($connection->query($sql_offer_category));
	
	// get condition
	$conditionId = $bookDetails[5];
	$sql_offer_condition = "SELECT Description FROM `CONDITION` WHERE ConditionId=$conditionId";
	$conditionDescription = mysqli_fetch_array($connection->query($sql_offer_condition));
	
	// convert isbn
	// /^[0-9]([-| ]?[0-9]){9,12}$/
	// substr(string,start,length)
	if (strlen($bookDetails[4]) == 13) {
		$isbn = substr($bookDetails[4], 0, 3)."-".substr($bookDetails[4], 3, 9);
	}
	if (strlen($bookDetails[4]) == 10) {
		$isbn = substr($bookDetails[4], 0, 1)."-".substr($bookDetails[4], 1, 9);
	}
	
	
?>	
	<h1>Book details</h1>
		
	<img src="<?= $bookDetails[11] ?>" alt="Example Book" id="bookcover" />
	
	<table id="bookdetails">
		<caption>Book Details</caption>
		<tr>
			<td class="leftred">Book Title:</td>
			<td><?= $bookDetails[1] ?></td>
		</tr>
		<tr>
			<td class="leftred">Edition:</td>
			<td><?= $bookDetails[3] ?></td>
		</tr>
		<tr>
			<td class="leftred">Author:</td>
			<td><?= $bookDetails[2] ?></td>
		</tr>
		<tr>
			<td class="leftred">ISBN:</td>
			<td><?= $isbn ?></td>
		</tr>
		<tr>
			<td class="leftred">Category:</td>
			<td><?= $categoryTitle[0] ?></td>
		</tr>
		<tr>
			<td class="leftred">Posted on:</td>
			<td><?= $bookDetails[9] ?></td>
		</tr>
		<tr>
			<td class="leftred">Book condition:</td>
			<td><?= $conditionDescription[0] ?></td>
		</tr>
		<?php
		if ($bookDetails[12] != "") {
		?>
		<tr>
			<td class="leftred">Note from seller:</td>
			<td><?= $bookDetails[12] ?></td>
		</tr>
		<?php
		}
		?>
		<tr>
			<td class="leftred">Price:</td>
			<td>$ <?= $bookDetails[7] ?></td>
		</tr>
	</table>
	
	<div class="clear"></div>
	<div class="submitbar">
	<input type="button" name="button" id="button" value="contact seller" onclick="window.location='contactSeller.php';"/>
	</div>
<?php
}

include("layout.php");

?>