<?php    
function content($connection) {
?>	
	<h1>Change your personal data</h1>
	<p>Here you can change your personal data.<br/>
		Please fill in the following fields:</p>
	
	
	<form action="#" method="post">
	
		<table id="inputfields">
			<caption>register</caption>
			<tbody>
				<tr>
					<td><label for="firstname">Firstname:</label></td>
					<td><input type="text" value="John" name="firstname" id="firstname" data-validation-pattern="^[^ 0-9]{1,}$" data-validation-message="Please enter a valid name. Ex: John" /></td>
				</tr>
				<tr>
					<td><label for="lastname">Lastname:</label></td>
					<td><input type="text" value="Smith" name="lastname" id="lastname" data-validation-pattern="^[^ 0-9]{1,}$" data-validation-message="Please enter a valid name. Ex: Smith" /></td>
				</tr>
				<tr>
					<td><label for="mail">Your mail:</label></td>
					<td><input type="text" value="john.smith@csusm.edu" name="mail" id="mail" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@csusm.edu$" data-validation-message="Please enter a valid @csusm.edu mail address." /></td>
				</tr>
				<tr>
					<td><label for="confirmmail">Confirm mail:</label></td>
					<td><input type="text" value="john.smith@csusm.edu" name="confirmmail" id="confirmmail" data-validation-match="#mail" data-validation-message="Your mails must match" /></td>
				</tr>
				<tr>
					<td><label for="phone">(Phone:)</label></td>
					<td><input type="text" value="760128905" name="phone" id="phone" data-validation-pattern="^[0-9]{6,}$" data-validation-message="Please enter a valid phone number." /></td>
				</tr>
				<tr>
					<td><label for="password">Password:</label></td>
					<td><input type="text" name="password" id="password" data-validation-pattern="^.{6,}$" data-validation-message="Please enter a valid password. Password must be at least 6 chars in length." /></td>
				</tr>
				<tr>
					<td><label for="confirmpassword">Confirm password:</label></td>
					<td><input type="text" name="confirmpassword" id="confirmpassword" data-validation-match="#password" data-validation-message="Your passwords must match." /></td>
				</tr>
			</tbody>
		</table>
		
		
		<div class="submitbar">
		<input type="submit" name="submit" id="submit" value="save changes of personal data" />
		</div>
	</form>

<?php
}

include("layout.php");

?>