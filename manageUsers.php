<?php    
function content($connection) {
	if ($_SESSION['sellerid'] == 1) {
		?>
		<table id="offers" class="tablesorter">
		<caption>Book offer</caption>
		<thead>
			<tr>
				<th>SellerId</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Mail</th>
				<th>Phone</th>
				<th class="no-sort">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		<?php
		// gets a list of all users 
		$sql_users = "SELECT * FROM SELLER WHERE SellerId > 1";
		$result_users = $connection->query($sql_users);
			while ($row_users = $result_users->fetch_object()) {	
			?>
				<tr>
					<td><?=$row_users->SellerId?></td>
					<td><?=$row_users->FirstName?></td>
					<td><?=$row_users->LastName?></td>
					<td><?=$row_users->Mail?></td>
					<td><?=$row_users->Phone?></td>
					<td>
						<a href="changeData.php?sellerid=<?=$row_users->SellerId?>" class="offer-icon">
							<img src="img/edit16.png" alt="change data" class="offer-icon" />
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
}

include("layout.php");

?>
