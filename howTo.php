<?php
function content($connection) {	
?>
	<h1>How To</h1>
	<p>Here we answered frequently asked questions.	If you have further questions, please contact an admin by using the <a href="contactAdmin.php">contact form</a>.</p>

	<h2>Generell questions</h2>
	<ul>
		<li>Do I need to be a CSUSM student for using this website?
			<span>Yes, because you have to register with your @csusm.edu mail address.</span>
		</li>
		<li>How can I contact an admin?</li>
		<li>There are too much books displayed - how can I sort them?</li>
		<li>How can I just see books from one category?</li>
		<li>With the left sidebar you can browse for book offers sorted by category.</li>
	</ul>
	<h2>Seller</h2>
	<ul>
		<li>How can I create an account?</li>
		<li>How can I post a new book offer?</li>
		<li>How can I change my password?</li>
		<li>I forgot my password - what now?</li>
		<li>I already sold my book - do I have to delete my offer?</li>
		<li>When will a offer be deleted automatically?</li>
	</ul>
	<h2>Buyer</h2>
	<ul>
		<li>How can I search for a book?</li>
		<li>The search bar above allows you to find books by ISBN or title.</li>
		<li>How can I contact a seller?</li>
		<li>How does the "contact seller" form work?</li>
	</ul>
<?php
}

include("layout.php");

?>