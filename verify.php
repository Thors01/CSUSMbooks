<?php    
function content($connection) {
?>	
	<h1>Verify your email address</h1>
<?php
	if(isset($_GET["code"])) {
		$activate = $_GET["code"];
		$sql_verify = "SELECT * FROM SELLER WHERE Accountstatus ='$activate';";
		$result_verify = $connection->query($sql_verify);
		$verify = mysqli_fetch_array($result_verify);
		
		if($verify != "") {
			$sql_data = "UPDATE SELLER SET `Accountstatus`='active' WHERE `Accountstatus`='$activate';";
			if (!mysqli_query($connection, $sql_data)) {
				die('Error: ' . mysqli_error($connection));
			} else {
				echo "<p>Your account is now activated. You can now go to the <a href=\"login.php\">login page>.</p>";
			}
		} else {
			echo "<p>Sorry, there is no account which can be activated with your code.</p>";
		}
	} else {
		echo "<p>You need a verification code to verify your account.</p>";
	}

}

include("layout.php");

?>