<?php    
function content() {
?>	
	<h1>Request new password</h1>
	<p>Here you can request a new password for your account.</p>
	<form action="#">
		<table id="inputfields">
			<caption>forgot password</caption>
			<tbody>
				<tr>
					<td><label for="mail">Your mail:</label></td>
					<td><input type="text" name="mail" id="mail" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@csusm.edu$" data-validation-message="Please enter a valid @csusm.edu mail address." /></td>
				</tr>
				<tr>
					<td><label for="confirmmail">Confirm mail:</label></td>
					<td><input type="text" name="confirmmail" id="confirmmail" data-validation-match="#mail" data-validation-message="Your mails must match" /></td>
				</tr>
			</tbody>
		</table>
		
		<div class="submitbar">
		<input type="submit" name="submit" id="submit" value="request password" />
		</div>
	</form>
<?php
}

include("config.php");
include("layout.php");

?>