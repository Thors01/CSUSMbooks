<?php    
function content() {
?>	
	<h1>error</h1>
	<p>We're sorry but an error occurred. Please go back to the main page.</p>
	<div class="submitbar">
	<input type="button" name="button" id="button" value="back to main page" onclick="window.location='index.php';" />
	</div>
<?php
}

include("config.php");
include("layout.php");

?>