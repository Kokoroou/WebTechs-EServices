<link rel="stylesheet" href="./public/css/booklist.css" type="text/css">

<div class="form-container">
	<div class="form-header">Add Book to My Booklist</div>
	<div class="form-notice">* Your list is public by default</div>		
	<div class="form-data">
		<form id="main-form" method="post" name="add-book">
			<table>
				<tbody>
					<tr>
						<td class="key">Book Title</td>
						<td class="value">
							<?php
								print "<a href='./book/?book_id=" . $book_id . "'>" . $book_title . "</a>"
							?>
						</td>
					</tr>
					<tr>
						<td class="key">Status</td>
						<td class="value">
							<?php
								print "<select id='add-to-booklist' name='booklist' class='status'>";
								foreach ($booklist_names as $name) {
									$label = preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', $name);
									print "<option value='" . $name .  "'>" . $label . "</option>";
								}
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>		
	<div class="form-submit">
		<input type="submit" form="main-form" value="Submit">
	</div>
</div>


<!-- <div class="notice-container">
	<div class="notice">
		Successfully added book to your booklist
	</div>
	<div class="button-container">
		<a class="button" href="./">Go home</a>
	</div>
	<div class="button-container">
		<a class="button" href="./book/?book_id=" . <?php print $book_id?>>Go back</a>
	</div>
	<div class="button-container">
		<a class="button" href="./booklist">Go to booklist</a>
	</div>
	
</div> -->
