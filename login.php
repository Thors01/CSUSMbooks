<?php    
function content($connection) {
?>	
	<h1>Login</h1>
	<p>Here you can login to your account:<br />
	Did you forget your password? If yes, <a href="forgotPassword.php">request a new password.</a></p>
	<?php 
		if(isset($_POST['submit'])) {
			if(empty($_POST['mail']) || empty($_POST['password'])) {
				$error = "Please check your input. You have to fill in all fields.";
			} else {
				$mail = $_POST['mail'];
				$password = md5($_POST['password']);
				$sql_login = "SELECT * FROM SELLER WHERE Mail='$mail' AND Password = '$password';";
				$result_login = $connection->query($sql_login);
				$login = mysqli_fetch_array($result_login);

				if($login == "") {				
					$error = "You did not enter the correct login data.";
				}
			}
		}
		if(isset($_POST['submit']) && empty($error)) {
			$sellerid = "SELECT * FROM SELLER WHERE Mail='$mail';";
			$result_sellerid = $connection->query($sellerid);
			$getseller = mysqli_fetch_array($result_sellerid);
			session_start();
			setcookie("login", "true", time() + 86400);
			$_SESSION['sellerid'] = $getseller[0];
			$_SESSION['sellerfirstname'] = $getseller[1];
			header("Location: manageAccount.php");
			exit();
		} else {
			if(!empty($error)) {
				echo "<font color=\"red\"><b>" . $error . "</b></font><br>";
			}
	?>
	<form action="login.php" method="post">
		<table id="inputfields">
			<caption>login</caption>
			<tbody>
				<tr>
					<td><label for="mail">Mail:</label></td>
					<td><input type="text" name="mail" id="mail" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@csusm.edu$" data-validation-message="Please enter a valid @csusm.edu mail address." /></td>
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
		Mail: admin@csusm.edu<br />
		Password: admin</p>
		
		<div class="submitbar">
		<input type="submit" name="submit" id="submit" value="login" />
		</div>
	</form>
<?php
	}
}

include("layout.php");
?>