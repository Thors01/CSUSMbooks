<form action="changeData.php" method="post">
	<table id="inputfields">
		<caption>register</caption>
		<tbody>
			<tr>
				<td><label for="firstname">Firstname:</label></td>
				<td><input type="text" value="<?= htmlspecialchars($firstname) ?>" name="firstname" id="firstname" data-validation-pattern="^[^ 0-9]{1,}$" data-validation-message="Please enter a valid name. Ex: John" /></td>
			</tr>
			<tr>
				<td><label for="lastname">Lastname:</label></td>
				<td><input type="text" value="<?= htmlspecialchars($lastname) ?>" name="lastname" id="lastname" data-validation-pattern="^[^ 0-9]{1,}$" data-validation-message="Please enter a valid name. Ex: Smith" /></td>
			</tr>
			<tr>
				<td><label for="mail">Your mail:</label></td>
				<td><?php echo "$mail"; ?></td>
			</tr>
			<tr>
				<td><label for="phone">Phone:</label></td>
				<td><input type="text" value="<?= htmlspecialchars($phone) ?>" name="phone" id="phone" data-validation-pattern="^[-, ,0-9]{6,}$" data-validation-message="Please enter a valid phone number." /></td>
			</tr>
			<?php
				if (!$isAdmin || ($isAdmin && $sellerid==1)) {
			?>
			<tr>
				<td><label for="password">Password:</label></td>
				<td><input type="password" name="password" id="password" data-validation-pattern="^.{6,}$" data-validation-message="Please enter a valid password. Password must be at least 6 chars in length." /></td>
			</tr>
			<tr>
				<td><label for="confirmpassword">Confirm password:</label></td>
				<td><input type="password" name="confirmpassword" id="confirmpassword" data-validation-match="#password" data-validation-message="Your passwords must match." /></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
		
	<div class="submitbar">
	<input type="hidden" name="sellerid" value="<?= $sellerid ?>" />
	<input type="submit" name="submit" id="submit" value="save changes of personal data" />
	</div>
</form>