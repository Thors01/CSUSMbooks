<?php    
function content($connection) {
?>	
	<h1>Login</h1>
	<p>Here you can login to your account:<br />
	Did you forget your password? If yes, <a href="forgotPassword.php">request a new password.</a></p>
	<?php 
		if(isset($_POST['submit'])) {
			if(empty($_POST['mail']) || empty($_POST['password'])) { // check if the user entered mail and password
				$error = "<p class='error'>Please check your input. You have to fill in all fields.</p>";
			} else {
				// crosscheck the entered data with the database
				$password = md5(trim($_POST['password'],' ')); // we encrypt the password to compare it to the database
				$mail = $_POST['mail'];
				$sql_login = "SELECT * FROM SELLER WHERE Mail='$mail' AND Password = '$password' AND Accountstatus='active';";
				$result_login = $connection->query($sql_login);
				$login = mysqli_fetch_array($result_login);

				if($login == "") {				
					$error = "<p class='error'>You did not enter the correct login data. Did you already activate your account?</p>";
				}
			}
		}
		if(isset($_POST['submit']) && empty($error)) { // If the user pressed the submit button and there are no errors we start a new session --> The user is logged in.
			$sellerid = "SELECT * FROM SELLER WHERE Mail='$mail';";
			$result_sellerid = $connection->query($sellerid);
			$getseller = mysqli_fetch_array($result_sellerid);
			createLog("$mail logged in."); // a log entry will be created
			session_start();
			setcookie("login", "true", time() + 86400);
			$_SESSION['sellerid'] = $getseller[0];
			$_SESSION['sellerfirstname'] = $getseller[1];
			header("Location: manageAccount.php"); // The user will automatically be forwarded to manageAccount.php
			exit();
		} else {
			if(!empty($error)) {
				echo $error;
			}
	?>
	<form action="login.php" method="post">
		<table id="inputfields">
			<caption>login</caption>
			<tbody>
				<tr>
					<td><label for="mail">Mail:</label></td>
					<td><input type="text" name="mail" id="mail" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@(.[_a-z0-9-]*)*csusm.edu$" data-validation-message="Please enter a valid @csusm.edu mail address." /></td>
				</tr>
				<tr>
					<td><label for="password">Password:</label></td>
					<td><input type="password" name="password" id="password" /></td>
				</tr>
			</tbody>
		</table>
		<br />
		<p><b>Just for testing:</b><br />
		Admin login data:<br />
		Mail: thors01@cougars.csusm.edu<br />
		Password: adminacc</p>
		
		<div class="submitbar">
		<input type="submit" name="submit" id="submit" value="login" />
		</div>
	</form>
<?php
	}
}

include("layout.php");
?>