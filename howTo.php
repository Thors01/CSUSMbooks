<?php
function content($connection) {	
?>
	<h1>How To</h1>
	<p>Here we answered frequently asked questions.	If you have further questions, please contact an admin by using the <a href="contactAdmin.php">contact form</a>.</p>
<!-- Question #1 Do I need to create an account to search for a book and
find a seller?
Answer: No. You simply enter yor search term and results will be
presented to you.-->
	<h2>Generell questions</h2>
	<ul>
		<li>I do not attend CSUSM but I would like to list a book for sale. Can I use this site?
			<span>Anyone can use the site to search for a book but only those with a csusm email can list books for sale.</span>
		</li>
		<li>There are too much books displayed - how can I sort them?
			<span>You can simply click on a column heading and the listing will be sorted.</span>
		</li>
		<li>How can I just see books from one category?
			<span>Simply click on a category on the left side and all books of this category will be displayed.</span>
		</li>
	</ul>
	<h2>Seller</h2>
	<ul>
		<li>Do I need to create an account to list a book?
			<span>Yes, but it is super quick and easy. You simply provide your csusm email, name, and choose a password. It takes about 1 minute to create an account.</span>
		</li>
		<li>How can I post a new book offer?
			<span>Log into your account and click on "post offer". Now you can enter the important data of your book and if you want upload an image.</span>
		</li>
		<li>How do I retrieve my username?
			<span>Your username is your csusm email address.</span>
		</li>
		<li>How can I change my password?
			<span>Log into your account and click on "change your data". Here you can change all data and your password.</span>
		</li>
		<li>I forgot my password - what now?
			<span>Go to the login page and click on forgot password. Enter your email address and then check your email.</span>
		</li>
		<li>I already sold my book - do I have to delete my offer?
			<span>You can. Otherwise it will be deleted after the expiration date. If you want to delete it: Log into your account and press the delete-button of a listing.
		</li>
		<li>How do I edit a listing to change the price or change any other data?
			<span>Log into your account, chose a listings, click edit, make desired changes, then click save.</span>
		</li>
		<li>When will a offer be deleted automatically?
			<span>An offer will not be deleted. After the expiration date it will not be displayed.</span>
		</li>
	</ul>
	<h2>Buyer</h2>
	<ul>
		<li>How can I search for a book?
			<span>You do not need an account for it. You simply enter yor search term (ISBN or title) and results will be presented to you.</span>
		</li>
		<li>How can I contact a seller?
			<span>After you looked on book details you can contact the seller by clicking on "contact seller".</span>
		</li>
	</ul>
<?php
}

include("layout.php");

?>