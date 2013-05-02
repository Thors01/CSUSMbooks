<form action="contactSeller.php" method="post">
	<table id="inputfields">
		<caption>contact seller</caption>
		<tbody>
			<tr>
				<td><label for="name">Your name:</label></td>
				<td><input type="text" name="name" id="name" value="<?php echo isset($_POST["name"])?$_POST["name"]:""; ?>" data-validation-pattern="^[A-ZÄÖÜ][a-zäöüß]{2,}(|-[A-ZÄÖÜ][a-zäöüß]{2,})(|\s[A-ZÄÖÜ][a-zäöüß]{2,}(|-[A-ZÄÖÜ][a-zäöüß]{2,}))$" data-validation-message="Please enter a valid name. Ex: John Smith" /></td>
			</tr>
			<tr>
				<td><label for="mail">Your mail:</label></td>
				<td><input type="text" name="mail" id="mail" value="<?php echo isset($_POST["mail"])?$_POST["mail"]:""; ?>" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$" data-validation-message="Please enter a valid email. Ex: josh001@mail.com" /></td>
			</tr>
			<tr>
				<td><label for="phone">Your phone:</label></td>
				<td><input type="text" name="phone" id="phone" value="<?php echo isset($_POST["phone"])?$_POST["phone"]:""; ?>" data-validation-pattern="^[0-9 -.()]{6,}$" data-validation-message="Please enter a valid phone number." /></td>
			</tr>
			<tr>
				<td><label for="subject">Subject:</label></td>
				<td><input type="text" name="subject" id="subject" value="<?php echo isset($_POST["subject"])?$_POST["subject"]:""; ?>" data-validation-pattern="^.{2,}$" data-validation-message="Please enter a subject." /></td>
			</tr>
			<tr>
				<td><label for="message">Message:</label></td>
				<td><textarea name="message" id="message" cols="50" rows="10"><?php echo isset($_POST["message"])?$_POST["message"]:""; ?></textarea></td>
			</tr>
		</tbody>
	</table>					
	<div class="submitbar">
	<input type="hidden" name="offerid" value="<?= $offerid ?>" />
	<input type="hidden" name="sellerid" value="<?= $bookDetails[8] ?>" />
	<input type="submit" name="submit" id="submit" value="Send message" />
	</div>
</form>