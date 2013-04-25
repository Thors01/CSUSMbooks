<?php    
function content($connection) {
?>	
	<table id="offers">
		<caption>Book offer</caption>
		<thead>
			<tr>
				<th>Book title <img src="img/arrow_up.png" alt="sort desc" /><img src="img/arrow_down.png" alt="sort asc" /></th>
				<th>Author <img src="img/arrow_up.png" alt="sort desc" /><img src="img/arrow_down.png" alt="sort asc" /></th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$sql_offer = "SELECT OfferId, Title, Author FROM OFFER";
			$result_offer= $connection->query($sql_offer);
			while ($row_offer = $result_offer->fetch_object()) {    
			?>   
				<tr><td><a href="bookDetails.php?offerid=<?=$row_offer->OfferId?>"><?=$row_offer->Title?></a></td>
				<td><?=$row_offer->Author?></td></tr>
			<?php
			}   
		?> 
		</tbody>
	</table>	
<?php
}

include("layout.php");

?>