<?php    
function content($connection) {
?>	
<script type="text/javascript" src="js/tablesort/js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="js/tablesort/js/jquery.tablesorter.widgets.min.js"></script>
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
				<th>Price (in $)<img src="img/arrow_up.png" alt="sort desc" /><img src="img/arrow_down.png" alt="sort asc" /></th>
		<?php
			if(isset($_GET["category"])) {
				$categoryid = $_GET["category"];
				$sql_offer = "SELECT OfferId, o.Title, Author, Price, c.Title AS CTitle FROM OFFER o, CATEGORY c WHERE CURDATE() < ExpDate AND o.CategoryId = '$categoryid' AND c.CategoryId = o.CategoryId;";
			} else {
		?>
				<th>Category <img src="img/arrow_up.png" alt="sort desc" /><img src="img/arrow_down.png" alt="sort asc" /></th>
		<?php
				$sql_offer = "SELECT OfferId, o.Title, Author, Price, c.Title AS CTitle FROM OFFER o, CATEGORY c WHERE CURDATE() < ExpDate AND c.CategoryId = o.CategoryId;";
			}
		?>
				</tr>
			</thead>
		<tbody>
		<?php
			$result_offer= $connection->query($sql_offer);
			if(isset($_GET["category"])) {
				$num_rows = mysqli_num_rows($result_offer);
				if ($num_rows == 0) {
					echo "<tr><td colspan=\"4\">Sorry, there are no books in the chosen category.</td></tr>";
				} else {
					while ($row_offer = $result_offer->fetch_object()) {		
			?>  
					<tr><td><a href="bookDetails.php?offerid=<?=$row_offer->OfferId?>"><?=$row_offer->Title?></a></td>
					<td><?=$row_offer->Author?></td><td><?=$row_offer->Price?></td></tr>
			<?php
					}
				}
			} else {
				while ($row_offer = $result_offer->fetch_object()) {
		?>
				<tr><td><a href="bookDetails.php?offerid=<?=$row_offer->OfferId?>"><?=$row_offer->Title?></a></td>
				<td><?=$row_offer->Author?></td><td><?=$row_offer->Price?></td><td><?=$row_offer->CTitle?></td></tr>
			<?php
				}
			}   
		?> 
		</tbody>
	</table>	
<?php
}

include("layout.php");

?>