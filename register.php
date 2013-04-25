<?php    
function content($connection) {
?>	
	<h1>Create a new account</h1>
	<?php 
		if(isset($_POST['submit'])) {
			if(empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["mail"]) || empty($_POST["confirmmail"]) || empty($_POST["password"]) || empty($_POST["confirmpassword"])
			|| !preg_match('/^[a-zA-Z]+$/', $_POST['firstname']) || !preg_match('/^[a-zA-Z]+$/', $_POST['lastname']) || !preg_match('/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/' ,$_POST['mail']) || !preg_match('/\d{7,}+$/', $_POST['phone'])
			|| $_POST["mail"] != $_POST["confirmmail"] || $_POST["password"] != $_POST["confirmpassword"]) { // PW verschlüsselt darstellen und übertragen usw.
				$error = "Please check your input. You have to fill in all fields besides phone number.";
			} else {
				if(strpos($_POST["mail"], "csusm.edu")) {
					if(1==2) {// check if there is already a user with this mail
						$error = "There is already a user with your email address.
						<br> If you forgot your password you can order HERE a new one.";
					}
				} else {
					$error = "Please enter a valid csusm.edu email address";
				}
			}
		}
		if(isset($_POST['submit']) && empty($error)) {
			// create user in database
			// Bestätigungsmail versenden --> Was tragen wir da wo zum Bestätigen ein?
			// info for user
		} else {
			if(!empty($error)) {
				echo "<font color=\"red\"><b>" . $error . "</b></font><br>";
			}
	?>
	<p>Here you can create a new account for selling your books.<br/>
	Please fill in the following fields:</p>
	<form action="register.php" method="post">
	
		<table id="inputfields">
			<caption>register</caption>
			<tbody>
				<tr>
					<td><label for="firstname">Firstname:</label></td>
					<td><input type="text" name="firstname" id="firstname" value="<?php echo isset($_POST["firstname"])?$_POST["firstname"]:""; ?>" data-validation-pattern="^[^ 0-9]{1,}$" data-validation-message="Please enter a valid name. Ex: John" /></td>
				</tr>
				<tr>
					<td><label for="lastname">Lastname:</label></td>
					<td><input type="text" name="lastname" id="lastname" value="<?php echo isset($_POST["lastname"])?$_POST["lastname"]:""; ?>" data-validation-pattern="^[^ 0-9]{1,}$" data-validation-message="Please enter a valid name. Ex: Smith" /></td>
				</tr>
				<tr>
					<td><label for="mail">Your mail:</label></td>
					<td><input type="text" name="mail" id="mail" value="<?php echo isset($_POST["mail"])?$_POST["mail"]:""; ?>" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@csusm.edu$" data-validation-message="Please enter a valid @csusm.edu mail address." /></td>
				</tr>
				<tr>
					<td><label for="confirmmail">Confirm mail:</label></td>
					<td><input type="text" name="confirmmail" id="confirmmail" value="<?php echo isset($_POST["confirmmail"])?$_POST["confirmmail"]:""; ?>" data-validation-match="#mail" data-validation-message="Your mails must match" /></td>
				</tr>
				<tr>
					<td><label for="phone">(Phone:)</label></td>
					<td><input type="text" name="phone" id="phone" value="<?php echo isset($_POST["phone"])?$_POST["phone"]:""; ?>" data-validation-pattern="^[0-9]{6,}$" data-validation-message="Please enter a valid phone number." /></td>
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
		<input type="submit" name="submit" id="submit" value="create account" />
		</div>
	</form>
<?php
	}
}

include("layout.php");

?>