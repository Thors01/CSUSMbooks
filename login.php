<?php    
function content($connection) {
?>	
	<h1>Login</h1>
	<p>Here you can login to your account:<br />
	Did you forget your password? If yes, <a href="forgotPassword.html">request a new password.</a></p>
	<form action="#">
		<table id="inputfields">
			<caption>login</caption>
			<tbody>
				<tr>
					<td><label for="mail">Mail:</label></td>
					<td><input type="text" name="mail" id="mail" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@csusm.edu$" data-validation-message="Please enter a valid @csusm.edu mail address." /></td>
				</tr>
				<tr>
					<td><label for="password">Password:</label></td>
					<td><input type="text" name="password" id="password" /></td>
				</tr>
			</tbody>
		</table>
		
		<div class="submitbar">
		<input type="submit" name="submit" id="submit" value="login" />
		</div>
	</form>
<?php
}

include("layout.php");

?>