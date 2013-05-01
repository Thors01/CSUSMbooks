<?php    
function content($connection) {
?>	
<h1>Change your personal data</h1>
<?php
	if (!isset($_SESSION['sellerid'])) {
		echo "Please login or register first.";
	} else {
		if(isset($_POST['submit'])) {
			if((empty($_POST['firstname']) || empty($_POST['lastname']) || !preg_match('/^[a-zA-Z]+$/', $_POST['firstname']) || !preg_match('/^[a-zA-Z]+$/', $_POST['lastname']))
				|| (empty($_POST['phone']) || !preg_match('/\d{7,}+$/', $_POST['phone']))) {
				$error = "<p class=\"error\">You did not fill in every field properly.</p>";
			} else {
				if(empty($_POST['password']) || empty($_POST['confirmpassword'])) {
					$pw = "no";
				} else {
					if($_POST['password'] == $_POST['confirmpassword']) {
						$pw = "yes";
					} else {
						$error = "<p class=\"error\">Your passwords do not match.</p>";
					}
				}
			}
		}
		
		if(isset($_POST['submit']) && empty($error)) {
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$phone = $_POST['phone'];
			$sellerid = $_SESSION['sellerid'];
			if($pw == "no") {
				$sql_data = "UPDATE SELLER SET `FirstName`='$firstname', `LastName`='$lastname', `Phone`='$phone' WHERE `SellerId`=$sellerid;";
				$confirm = "Your password is still the same.";
			} else {
				$password = md5($_POST['password']);
				$sql_data = "UPDATE SELLER SET `FirstName`='$firstname', `LastName`='$lastname', `Phone`='$phone', `Password`='$password' WHERE SellerId=$sellerid;";					
				$confirm = "Don't forget: You changed your password, too.";
			}
			if(mysqli_query($connection, $sql_data)) {
				echo "<p>You successfully changed your data. $confirm</p>";
			} else {
				echo "<p>There was a connection error. Please try again.</p>";
			}
		} else {
?>
<p>Here you can change your personal data.<br/>
Please fill in the following fields:</p>
<?php
			if(!empty($error)) {
				echo $error;
			}
			$sellerid = $_SESSION['sellerid'];
			$sql_data = "SELECT * FROM SELLER WHERE SellerId=$sellerid";
			$result_data = $connection->query($sql_data);
			$data = mysqli_fetch_array($result_data);
			$firstname = $data[1];
			$lastname = $data[2];
			$mail = $data[3];
			$phone = $data[4];
?>
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
	<input type="submit" name="submit" id="submit" value="save changes of personal data" />
	</div>
</form>

<?php
		}
	}
}

include("layout.php");

?>