<?php    
function content($connection) {
?>	
	<h1>Create a new account</h1>
	<?php 
		if(isset($_POST['submit'])) {
			if(empty($_POST['firstname']) 
			|| empty($_POST['lastname']) 
			|| empty($_POST['mail']) 
			|| empty($_POST['confirmmail']) 
			|| empty($_POST['password']) 
			|| empty($_POST['phone'])
			|| empty($_POST['confirmpassword'])
			|| !preg_match('/^[a-zA-Z]+$/', $_POST['firstname']) 
			|| !preg_match('/^[a-zA-Z]+$/', $_POST['lastname']) 
			|| !preg_match('/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/' ,$_POST['mail']) 
			|| ($_POST['mail'] != $_POST['confirmmail']) 
			|| (trim($_POST['password'], ' ') != trim($_POST['confirmpassword'], ' ')) 
			|| strlen(trim($_POST['password'], ' ')) < 6 
			|| !preg_match('/^[0-9 -.()]{6,}$/', $_POST['phone'])) { // PW verschlüsselt darstellen und übertragen usw.
				$error = "<p class=\"error\">Please check your input. You have to fill in all fields besides phone number.</p>";
			} else {
				$mail = $_POST['mail'];
				if(strpos($mail, "csusm.edu")) { // javascript for this part is different?!
					$sql_mailcheck = "SELECT * FROM SELLER WHERE Mail='$mail';";
					$result_mailcheck = $connection->query($sql_mailcheck);
					$mail = mysqli_fetch_array($result_mailcheck);

					if($mail != "") {				
						$error = "<p class=\"error\">There is already an user with your email address.<br /> If you forgot your password you can order a new one <a href='forgotPassword.php'>here</a>.</p>";
					}
				} else {
					$error = "<p class=\"error\">Please enter a valid csusm.edu email address</p>";
				}
			}
		}
		if(isset($_POST['submit']) && empty($error)) {
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$mail = $_POST['mail'];
			$password = md5(trim($_POST['password'], ' '));
			$phone = str_replace("-", "", $_POST['phone']);
			$phone = str_replace(" ", "", $phone);
			$phone = str_replace("(", "", $phone);
			$phone = str_replace(")", "", $phone);
			$phone = str_replace(".", "", $phone);
			$register = "INSERT INTO SELLER (`FirstName`, `LastName`, `Mail`, `Phone`, `Password`) VALUES ('$firstname', '$lastname', '$mail', '$phone', '$password')";
			
			if (!mysqli_query($connection, $register)) {
				die('Error: ' . mysqli_error($connection));
			} else {
				echo "<p>You succesfully created a new user account.</p>";
				$mail_body = "Hi $firstname,\nyou succesfully created an user account at CSUSMBooks.";
				$subject = "New account at CSUSMBooks";
				
				// following code gets email from admin
				$sql_receipient = "SELECT * FROM SELLER WHERE SellerId=1";
				$result_receipient = $connection->query($sql_receipient);
				$recipient = mysqli_fetch_array($result_receipient);
				
				$header = "From: CSUSM Books<$recipient[3]>\r\n";
		
				if (mail($mail, $subject, $mail_body, $header)) {
					echo "<p>You got an email with the confirmation of creating a new user account.</p>";
				} else {
					echo "<p class=\"error\">An error occured. Unfortunately we could not send you a confirmation email.</p>";
				}
			}
		} else {
			if(!empty($error)) {
				echo $error;
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
					<td><input type="text" name="mail" id="mail" value="<?php echo isset($_POST["mail"])?$_POST["mail"]:""; ?>" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@(.[_a-z0-9-]*)*csusm.edu$" data-validation-message="Please enter a valid @csusm.edu mail address." /></td>
				</tr>
				<tr>
					<td><label for="confirmmail">Confirm mail:</label></td>
					<td><input type="text" name="confirmmail" id="confirmmail" value="<?php echo isset($_POST["confirmmail"])?$_POST["confirmmail"]:""; ?>" data-validation-match="#mail" data-validation-message="Your mails must match" /></td>
				</tr>
				<tr>
					<td><label for="phone">Phone:</label></td>
					<td><input type="text" name="phone" id="phone" value="<?php echo isset($_POST["phone"])?$_POST["phone"]:""; ?>" data-validation-pattern="^[0-9 -.()]{6,}$" data-validation-message="Please enter a valid phone number." /></td>
				</tr>
				<tr>
					<td><label for="password">Password:</label></td>
					<td><input type="password" name="password" id="password" data-validation-pattern="^.{6,}$" data-validation-message="Please enter a valid password. Password must be at least 6 chars in length." /></td>
				</tr>
				<tr>
					<td><label for="confirmpassword">Confirm password:</label></td>
					<td><input type="password" name="confirmpassword" id="confirmpassword" data-validation-match="#password" data-validation-message="Your passwords must match." /></td>
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