<?php    
function content() {
?>	
	<h1>manage account</h1>
	<p>Here you can manage your account.</p>
	<a href="changeData.html" class="button">Change your data</a><br />
	<a href="postOffer.html" class="button">Post new book offer</a>
	<br />
	<br />
	<br />
	<br />
	<p>Your existing book offers:</p>
	<table id="offers">
		<caption>Book offer</caption>
		<thead>
			<tr>
				<th>Book title</th>
				<th>Author</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><a href="bookDetails.html">Programming the World Wide Web (7th)</a></td>
				<td>Robert W. Sebesta</td>
				<td><a href="modifyOffer.html" class="offer-icon"><img src="img/edit16.png" alt="edit offer" class="offer-icon" /></a><a href="#" class="offer-icon"><img src="img/delete16.png" alt="delete offer" /></a></td>
			</tr>
			<tr>
				<td>Modern Database Management (8th)</td>
				<td>Jeffrey A. Hoffer</td>
				<td><a href="modifyOffer.html" class="offer-icon"><img src="img/edit16.png" alt="edit offer" class="offer-icon" /></a><a href="#" class="offer-icon"><img src="img/delete16.png" alt="delete offer" /></a></td>
			</tr>
			<tr>
				<td>Linear Programming</td>
				<td>Vasek Chvatal</td>
				<td><a href="modifyOffer.html" class="offer-icon"><img src="img/edit16.png" alt="edit offer" class="offer-icon" /></a><a href="#" class="offer-icon"><img src="img/delete16.png" alt="delete offer" /></a></td>
			</tr>
		</tbody>
	</table>
<?php
}

include("config.php");
include("layout.php");

?>