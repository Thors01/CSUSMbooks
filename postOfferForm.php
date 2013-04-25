<form action="postOffer.php" method="post" enctype="multipart/form-data">
	<table id="inputfields">
		<caption>post new book</caption>
		<tbody>
			<tr>
				<td><label for="title">Book title:</label></td>
				<td><input type="text" value="<?= htmlspecialchars($title) ?>" name="title" id="title" data-validation-pattern="^.{2,}$" data-validation-message="Please enter a book title." /></td>
			</tr>
			<tr>
				<td><label for="author">Author:</label></td>
				<td><input type="text" value="<?= htmlspecialchars($author) ?>" name="author" id="author" data-validation-pattern="^.{2,}$" data-validation-message="Please enter an author." /></td>
			</tr>
			<tr>
				<td><label for="edition">Edition:</label></td>
				<td><input type="text" value="<?= htmlspecialchars($edition) ?>" name="edition" id="edition" /></td>
			</tr>
			<tr>
				<td><label for="isbn">ISBN:</label></td>
				<td><input type="text" value="<?= htmlspecialchars($isbn) ?>" name="isbn" id="isbn" data-validation-pattern="^[0-9]([-| ]?[0-9]){9,12}$" data-validation-message="Please enter an ISBN-10 or ISBN-13. Ex: 978-1-402-894-626" /></td>
			</tr>
			<tr>
				<td><label for="category">Category:</label></td>
				<td>
					<?php 
						$sql_category = "SELECT * FROM CATEGORY";
						$result_category = $connection->query($sql_category);
					?>
					<select id="category" name="category">
					<?php 
						while ($row_category = $result_category->fetch_object()) 
						{       
						echo "<option value='{$row_category->CategoryId}'>{$row_category->Title}</option>\n";
						}   
					?> 
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="condition">Condition:</label></td>
				<td>
					<?php 
						$sql_condition = "SELECT * FROM `CONDITION`";
						$result_condition = $connection->query($sql_condition);
					?>
					<select id="condition" name="condition">    
					<?php 
						while ($row_condition = $result_condition->fetch_object()) 
						{       
						echo "<option value='{$row_condition->ConditionId}'>{$row_condition->Description}</option>\n";
						}   
					?> 
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="expdate">Expiration Date:</label></td>
				<td><input type="date" value="<?= htmlspecialchars($expDate) ?>" name="expdate" id="expdate" /></td>
			</tr>
			<tr>
				<td><label for="notes">Notes:</label></td>
				<td><input type="text" value="<?= htmlspecialchars($notes) ?>" name="notes" id="notes" /></td>
			</tr>
			<tr>
				<td><label for="price">Price:</label></td>
				<td><input type="text" value="<?= htmlspecialchars($price) ?>" name="price" id="price" data-validation-pattern="^[0-9]{1,4}\.[0-9]{2}$" data-validation-message="Please enter a price. Ex: 12.00" /></td>
			</tr>
			<tr>
				<td><label for="file">Picture:</label></td>
				<td><input type="file" name="file" id="file" /></td>
			</tr>
		</tbody>
	</table>
	<div class="submitbar">
	<input type="submit" name="submit" id="submit" value="post new book offer" />
	</div>
</form>