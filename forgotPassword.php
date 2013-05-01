<?php    
function content($connection) {
?>	
	<h1>Request new password</h1>
	
	<?php
		if(isset($_POST['submit'])) {
			if(!empty($_POST['mail']) && !empty($_POST['confirmmail'])) {				
				if($_POST['mail'] == $_POST['confirmmail']) {
					$mail = $_POST['mail'];
					$sql_fpassword = "SELECT * FROM SELLER WHERE Mail='$mail';";
					$result_fpassword = $connection->query($sql_fpassword);
					$fpassword = mysqli_fetch_array($result_fpassword);

					if($fpassword == "") {				
						$error = "<p class='error'>There is no account with the email address <i>$mail</i>.</p>";
					}
				} else {
					$error = "<p class='error'>The two entered email addresses are not the same. Please try again.</p>";
				}
			} else {
				$error = "<p class='error'>Please enter your email address twice.</p>";
			}
		} 
		if(isset($_POST['submit']) && empty($error)) {
			$mail = $_POST['mail'];
			// Create a random password with length 9
			$password = "";
			mt_srand((double)microtime() * 1000000);
			$charset = "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ!?";
			$length  = strlen($charset)-1;
			$code    = '';
			for($i=0;$i<10;$i++) {
				$password .= $charset{mt_rand(0, $length)};
			}
			$passworde = md5($password);
			$sql_data = "UPDATE SELLER SET `Password`='$passworde' WHERE `Mail`='$mail';";
			if (!mysqli_query($connection, $sql_data)) {
				die('Error: ' . mysqli_error($connection));
			} else {
				// the following code gets mail address from admin because he is seller with id=1
				$sql_recipient = "SELECT * FROM SELLER WHERE SellerId=1";
				$result_recipient = $connection->query($sql_recipient);
				$array_recipient = mysqli_fetch_array($result_recipient);
				$mail_admin = $array_recipient[3];
			
				$mail_body = "Your new password is: $password\n\nPlease change it after your first login.\n\nBest regards,\nThe CSUSMbooks-Team";
				$subject = "CSUSM Books: New password request";
				
				$header = "From: CSUSM Books <$mail_admin>\r\n";
		
				if (mail($mail, $subject, $mail_body, $header)) {
					echo "<p>You got an email with your new password.</p>";
				} else {
					echo "<p class='error'>An error occured. Unfortunately we could not send you an email with your new password.</p>";
				}
			}
		} else {
			if(!empty($error)) {
				echo $error;
		}
	?>
	<p>Here you can request a new password for your account.</p>
	<form action="forgotPassword.php" method="post">
		<table id="inputfields">
			<caption>forgot password</caption>
			<tbody>
				<tr>
					<td><label for="mail">Your mail:</label></td>
					<td><input type="text" name="mail" id="mail" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@(.[_a-z0-9-]*)*csusm.edu$" data-validation-message="Please enter a valid @csusm.edu mail address." /></td>
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
}

include("layout.php");

?>