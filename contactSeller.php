<?php
function content() {	
?>
	<h1>Contact Seller</h1>
	<?php // the line above has to be generated.
		if(isset($_POST['submit'])) {
			if(empty($_POST["name"]) || empty($_POST["mail"]) || empty($_POST["subject"]) || empty($_POST["phone"]) || empty($_POST["message"])
			|| !preg_match('/^[a-zA-Z]+$/', $_POST['name']) || !preg_match('/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/' ,$_POST['mail']) || !preg_match('/\d{7,}+$/', $_POST['phone'])) {
				$error = "Please check your input. You have to fill in all fields.";
			}
		}
		if(isset($_POST['submit']) && empty($error)) {
			$Name = $_POST['name'];
			$email = $_POST['mail'];
			$recipient = "kraem01@cougars.csusm.edu"; // get Email of seller from database	
			if(isset($_POST['phone']) && $_POST['phone'] != "") {
				$mail_body = $_POST['message'] . "\n\nYou can also contact the user by phone: " . $_POST['phone'] . ".";
			} else {
				$mail_body = $_POST['message'];
			}
			$subject = $_POST['subject'];
			$header = "From: ". $Name . " <" . $email . ">\r\n";
	
			if (mail($recipient, $subject, $mail_body, $header)) {
				echo "<p>You succesfully send an email. The seller is going to respond as soon as possible.</p>";
			} else {
				echo "An error occured. Please try again.";
			}
		} else {
	?>
	<p>You’re contacting the seller because you’re interested in:<br /><span class="subject">Programming the World Wide Web (7th)</span></p>
	<?php
	 	if(!empty($error)) {
			echo "<font color=\"red\"><b>" . $error . "</b></font><br>";
		}
	?>
	<form action="contactSeller.php" method="post">
		<table id="inputfields">
			<caption>contact seller</caption>
			<tbody>
				<tr>
					<td><label for="name">Your name:</label></td>
					<td><input type="text" name="name" id="name" value="<?php echo isset($_POST["name"])?$_POST["name"]:""; ?>" data-validation-pattern="^[^ 0-9]{1,}$" data-validation-message="Please enter a valid name. Ex: John Smith" /></td>
				</tr>
				<tr>
					<td><label for="mail">Your mail:</label></td>
					<td><input type="text" name="mail" id="mail" value="<?php echo isset($_POST["mail"])?$_POST["mail"]:""; ?>" data-validation-pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$" data-validation-message="Please enter a valid email. Ex: josh001@mail.com" /></td>
				</tr>
				<tr>
					<td><label for="phone">Your phone:</label></td>
					<td><input type="text" name="phone" id="phone" value="<?php echo isset($_POST["phone"])?$_POST["phone"]:""; ?>" data-validation-pattern="^[0-9]{6,}$" data-validation-message="Please enter a valid phone number." /></td>
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
		<input type="submit" name="submit" id="submit" value="Send message" />
		</div>
	</form>
<?php
	}
}

include("config.php");
include("layout.php");

?>