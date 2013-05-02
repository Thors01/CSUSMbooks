<?php
function content($connection) {	
			
?>
	<h1>Contact Seller</h1>
	<?php
	if(isset($_POST['submit'])) {
		if(empty($_POST["name"]) || empty($_POST["mail"]) || empty($_POST["subject"]) || empty($_POST["phone"]) || empty($_POST["message"])
		|| !preg_match('/^[A-ZÄÖÜ][a-zäöüß]{2,}(|-[A-ZÄÖÜ][a-zäöüß]{2,})(|\s[A-ZÄÖÜ][a-zäöüß]{2,}(|-[A-ZÄÖÜ][a-zäöüß]{2,}))$/', $_POST['name']) || !preg_match('/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/' ,$_POST['mail']) || !preg_match('/^[0-9 -.()]{6,}$/', $_POST['phone'])) {
			$error = "<p class=\"error\">Please check your input. You have to fill in all fields.</p>";
			$error_boolean = false;
			echo $error;
			require_once("contactSellerForm.php");
		}
		else {
			$error_boolean = true;
		}
	}
	if(isset($_POST['submit']) && $error_boolean) {
		$Name = $_POST['name'];
		$email = $_POST['mail'];
		$sellerid = $_POST['sellerid'];
		$offerid = $_POST['offerid'];
		
		// following code gets email from seller
		$sql_recipient = "SELECT * FROM SELLER WHERE SellerId=$sellerid;";
		$result_recipient = $connection->query($sql_recipient);// or die(mysqli_error($sql_recipient))
		$array_recipient = mysqli_fetch_array($result_recipient);
		$recipient = $array_recipient[3];
		
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'bookDetails.php';
		$mail_body = "You got a message regarding your book offer:\n" . "http://$host$uri/$extra?offerid=$offerid\n\n" . "Message: \n" . $_POST['message'] . "\n\nYou can also contact the user by phone: " . $_POST['phone'] . ".";
		
		$subject = $_POST['subject'];
		$header = "From: ". $Name . " <" . $email . ">\r\n";

		if (mail($recipient, $subject, $mail_body, $header)) {
			echo "<p>You succesfully send an email. The seller is going to respond as soon as possible.</p>";
		} 
		else {
			echo "<p class=\"error\">An error occured. Please try again.</b></p>";
		}
	} 
	
	if(!isset($_POST['submit'])) {
		if (!isset($_GET["offerid"])) {
			echo "<p>Sorry, there is no offer.</p>";
		}
		else {
			$offerid = $_GET["offerid"];
			$sql_offer = "SELECT * FROM OFFER WHERE OfferId=$offerid";
			$result_offer = $connection->query($sql_offer);
			$bookDetails = mysqli_fetch_array($result_offer);
	?>
			<p>You’re contacting the seller because you’re interested in:<br /><span class="subject"><?= $bookDetails[1] ?></span> by <span class="subject"><?= $bookDetails[2] ?></span></p>
			<?php
			require_once("contactSellerForm.php");
		}
	}
}

include("layout.php");

?>