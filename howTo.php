<?php
function content($connection) {	
?>
	<h1>How To</h1>
	<p>Here we answered frequently asked questions.	If you have further questions, please contact an admin by using the <a href="contactAdmin.php">contact form</a>.</p>

	<h2>Generell questions</h2>
	<p><ul style="list-style-type: disc">
		<li>Do I need to be a CSUSM student for using this website?</li>
		<li>How can I contact an admin?</li>
		<li>There are too much books displayed - how can I sort them?</li>
		<li>How can I just see books from one category?</li>
		<p style="text-indent:10px;"><i>With the left sidebar you can browse for book offers sorted by category.</i></p>
	<ul></p>
	<h2>Seller</h2>
	<p><ul style="list-style-type: disc">
		<li>How can I create an account?</li>
		<li>How can I post a new book offer?</li>
		<li>How can I change my password?</li>
		<li>I forgot my password - what now?</li>
		<li>I already selled my book - do I have to delete my offer?</li>
		<li>When will a offer be deleted automatically?</li>
	<ul></p>
	<h2>Buyer</h2>
	<p><ul style="list-style-type: disc">
		<li>How can I search for a book?</li>
		<p style="text-indent:10px;"><i>The search bar above allows you to find books by ISBN or title.</i></p>
		<li>How can I contact a seller?</li>
		<li>How does the "contact seller" form work?</li>
	<ul></p>
<?php
}

include("layout.php");

?>