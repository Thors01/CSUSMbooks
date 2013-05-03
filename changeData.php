<?php    
function content($connection) {
?>	
<h1>Change your personal data</h1>
<?php	
	$isAdmin = '';
	if (!isset($_SESSION['sellerid'])) {
		echo "<p>Please login or register first.</p>";
	} 
	else {
		if ($_SESSION['sellerid'] == 1) {
			$isAdmin = true;
			if (isset($_GET['sellerid'])) {
				$sellerid = $_GET['sellerid'];
			}
			if (isset($_POST['sellerid'])) {
				$sellerid = $_POST['sellerid'];
			}	
			if (!isset($_POST['sellerid']) && !isset($_GET['sellerid'])) {
				$sellerid = 1;
			}
		}
		else {
			$sellerid = $_SESSION['sellerid'];
		}
	
		if(isset($_POST['submit'])) {
			// validation of input fields if logged in as admin (no password change possible)
			if ($isAdmin) {
				if((empty($_POST['firstname']) || empty($_POST['lastname']) || !preg_match('/^[a-zA-Z]+$/', $_POST['firstname']) || !preg_match('/^[a-zA-Z]+$/', $_POST['lastname'])) || (empty($_POST['phone']) || !preg_match('/^[0-9 -.()]{6,}$/', $_POST['phone']))) {
					$error = "<p class='error'>You did not fill in every field properly.</p>";
				}
				else {
					$pw = false;
				}
			}
			// validation of input fields if logged in as normal user (password must match if changed)
			else {
				if((empty($_POST['firstname']) || empty($_POST['lastname']) || !preg_match('/^[a-zA-Z]+$/', $_POST['firstname']) || !preg_match('/^[a-zA-Z]+$/', $_POST['lastname']))	|| strlen($_POST['password']) < 6 || (empty($_POST['phone']) || !preg_match('/^[0-9 -.()]{6,}$/', $_POST['phone']))) {
					$error = "<p class='error'>You did not fill in every field properly.</p>";
				} 
				else {
					if(empty($_POST['password']) || empty($_POST['confirmpassword'])) {
						$pw = false;
					} 
					else {
						if($_POST['password'] == $_POST['confirmpassword']) {
							$pw = true;
						} 
						else {
							$error = "<p class='error'>Your passwords do not match.</p>";
						}
					}
				}
			}
		}
		
		// after submission and no validation errors from above
		if(isset($_POST['submit']) && empty($error)) {
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$phone = str_replace("-", "", $_POST['phone']);
			$phone = str_replace(" ", "", $phone);
			$phone = str_replace("(", "", $phone);
			$phone = str_replace(")", "", $phone);
			$phone = str_replace(".", "", $phone);
			
			if(!$pw) {
				$sql_data = "UPDATE SELLER SET `FirstName`='$firstname', `LastName`='$lastname', `Phone`='$phone' WHERE SellerId=$sellerid;";
				$confirm = "<p>Your password is still the same.</p>";
			} else {
				$password = md5($_POST['password']);
				$sql_data = "UPDATE SELLER SET `FirstName`='$firstname', `LastName`='$lastname', `Phone`='$phone', `Password`='$password' WHERE SellerId=$sellerid;";					
				$confirm = "<p>Don't forget: You changed your password, too.</p>";
			}
			if(mysqli_query($connection, $sql_data)) {
				echo "<p>You successfully changed your data. $confirm</p>";
			} else {
				echo "<p class='error'>There was a connection error. Please try again.</p>";
			}
		} 
		else {
?>
			<p>Here you can change your personal data.<br/>
			Please fill in the following fields:</p>
<?php
			if(!empty($error)) {
				echo $error;
			}
			$sql_data = "SELECT * FROM SELLER WHERE SellerId=$sellerid";
			$result_data = $connection->query($sql_data);
			$data = mysqli_fetch_array($result_data);
			$firstname = $data[1];
			$lastname = $data[2];
			$mail = $data[3];
			$phone = $data[4];
			require_once('userForm.php');
		}
	}
}

include("layout.php");

?>