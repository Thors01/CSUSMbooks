<?php    
function content($connection) {
?>	
	<h1>manage account</h1>
	<?php
		// gets session information
		if(isset($_SESSION['sellerid'])) {
			$firstname = $_SESSION['sellerfirstname'];
			$sellerId = $_SESSION['sellerid'];
			if($_SESSION['sellerid'] == 1) {
				$isAdmin = true;
				echo "<p><b>Welcome back $firstname (Admin).</b>Here you can manage your account and existing offers.</p>";
			} else {
				$isAdmin = false;
				echo "<p><b>Welcome back $firstname.</b>Here you can manage your account.</p>";
			}
	?>
	<a href="changeData.php" class="button">Change your data</a><br />
	<a href="postOffer.php" class="button">Post new book offer</a>
	<?php
		// manage user accounts and activity log is just visible for admin
		if($isAdmin) {
	?>
		<br /><a href="manageUsers.php" class="button">manage user accounts</a>
		<br /><a href="log/activity.txt" class="button">show activity log</a>
	<?php
		}
	?>
	<br />
	<br />
	<br />
	<br />
	<p>Your existing book offers:</p>
	<table id="offers" class="tablesorter">
		<caption>Book offer</caption>
		<thead>
			<tr>
				<th>Book title</th>
				<th>Author</th>
				<th>ISBN</th>
				<th>Price (in $)</th>
				<th>Posted on</th>
				<th>Expires on</th>
				<th class="no-sort">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// gets a list of all book offers (for normal seller just their own)
			if ($isAdmin) {
				$sql_offer = "SELECT OfferId, Title, Author, Isbn, Price, PostDate, ExpDate FROM OFFER";
			}
			else {
				$sql_offer = "SELECT OfferId, Title, Author, Isbn, Price, PostDate, ExpDate FROM OFFER WHERE SellerId = $sellerId";
			}
			// display book offers in rows
			$result_offer = $connection->query($sql_offer);
			while ($row_offer = $result_offer->fetch_object()) {	
			?>
				<tr>
					<td><a href="bookDetails.php?offerid=<?=$row_offer->OfferId?>"><?=$row_offer->Title?></a></td>
					<td><?=$row_offer->Author?></td>
					<td><?php
					if (strlen($row_offer->Isbn) == 13) {
						$isbn = substr($row_offer->Isbn, 0, 3)."-".substr($row_offer->Isbn, 3, 10);
						echo $isbn;
					}
					if (strlen($row_offer->Isbn) == 10) {
						$isbn = substr($row_offer->Isbn, 0, 1)."-".substr($row_offer->Isbn, 1, 9);
						echo $isbn;
					}
					?>
					</td>
					<td><?=$row_offer->Price?></td>
					<td><?=$row_offer->PostDate?></td>
					<td><?=$row_offer->ExpDate?></td>
					<td>
						<a href="modifyOffer.php?offerid=<?=$row_offer->OfferId?>" class="offer-icon">
							<img src="img/edit16.png" alt="edit offer" class="offer-icon" />
						</a>
						<a href="deleteOffer.php?offerid=<?=$row_offer->OfferId?>" class="offer-icon" onclick="return confirm('Do you really want to delete this offer?')">
							<img src="img/delete16.png" alt="delete offer" />
						</a>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
<?php
	} 
	else {
		echo "<p>Please login or register first.</p>";
	}
}

include("layout.php");

?>