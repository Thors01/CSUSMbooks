<?php    
function content($connection) {
	// Unset all of the session variables.
	$_SESSION = array();
	
	// Finally, destroy the session.
	session_destroy();
	header("Location: index.php");
}

include("layout.php");

?>