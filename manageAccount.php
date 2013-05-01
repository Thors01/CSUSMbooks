<?php    
function content($connection) {
?>	
	<h1>manage account</h1>
	<?php
		if(isset($_SESSION['sellerid'])) {
			$firstname = $_SESSION['sellerfirstname'];
			$sellerId = $_SESSION['sellerid'];
			if($_SESSION['sellerid'] == 1) {
				$isAdmin = true;
				echo "<b>Welcome back $firstname (Admin).</b>";
			} else {
				$isAdmin = false;
				echo "<b>Welcome back $firstname.</b>";
			}
	?>
	<br />
	<p>Here you can manage your account.</p>
	<a href="changeData.php" class="button">Change your data</a><br />
	<a href="postOffer.php" class="button">Post new book offer</a>
	<br />
	<br />
	<br />
	<br />
	<p>Your existing book offers:</p>
	<!-- Including jquery script -->
	<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.widgets.min.js"></script>
	<script>
		$(function(){
			$("#offers").tablesorter();
		});
	</script>
	<table id="offers" class="tablesorter">
		<caption>Book offer</caption>
		<thead>
			<tr>
				<th>Book title <img src="img/arrow_up.png" alt="sort desc" /><img src="img/arrow_down.png" alt="sort asc" /></th>
				<th>Author <img src="img/arrow_up.png" alt="sort desc" /><img src="img/arrow_down.png" alt="sort asc" /></th>
				<th>ISBN <img src="img/arrow_up.png" alt="sort desc" /><img src="img/arrow_down.png" alt="sort asc" /></th>
				<th>Price (in $) <img src="img/arrow_up.png" alt="sort desc" /><img src="img/arrow_down.png" alt="sort asc" /></th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ($isAdmin) {
				$sql_offer = "SELECT OfferId, Title, Author, Isbn, Price FROM OFFER";
			}
			else {
				$sql_offer = "SELECT OfferId, Title, Author, Isbn, Price FROM OFFER WHERE SellerId = $sellerId";
			}
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
					<td>
						<a href="modifyOffer.php?offerid=<?=$row_offer->OfferId?>" class="offer-icon">
							<img src="img/edit16.png" alt="edit offer" class="offer-icon" />
						</a>
						<a href="deleteOffer.php?offerid=<?=$row_offer->OfferId?>" class="offer-icon">
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
		echo "Please login or register first.";
	}
}

include("layout.php");

?>