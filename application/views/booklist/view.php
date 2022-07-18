<link rel="stylesheet" href="./public/css/booklist.css" type="text/css">

<?php 
	function print_status_menu($booklist_name, $name) {
		$href = "'./booklist/view?name=" . $booklist_name . "'";
		$class = ($name == $booklist_name) ? "'status-button on'" : "'status-button'";
		$label = preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', $booklist_name);
		print "<a href=" . $href . " class=" . $class . ">" . $label . "</a>";
	}
	function show_book($book_id, $book_title) {
		$img_folder = './public/img/book/fullsize/';
		$img_extension = '.jpg';
		
		print "<div class='image'><a href=''><img src='" . $img_folder . strval($book_id) . $img_extension . "' alt='" . $book_title . " Cover'></a></div>";
		print "<div class='title title-text'><h2 class='h2_anime_title'><a href='' class='link-title'>" . $book_title . "</a></h2></div>";
	}
?>

<div id="list-container" class="list-container">
	<div id="status-menu" class="status-menu-container">
		<div class="status-menu">
			<?php 
				foreach ($booklist_names as $booklist_name) {
					print_status_menu($booklist_name, $name);
				}
			?>
		</div>
		
	</div>
	<div class="list-table">
		<?php
			$img_folder = './public/img/book/fullsize/';
			$img_extension = '.jpg';

			for ($i = 0; $i < count($book_ids); $i++) {
				$book_id = $book_ids[$i];
				$book_title = $book_titles[$i];

				print "<div class='list-item'>";

				print "<div class='data image'><a href='#'><img src='" . $img_folder . strval($book_id) . $img_extension . "' alt='" . $book_title . " Cover'></a></div>";
				print "<div class='data title'><a href='#' class='link-title'>" . $book_title . "</a></div>";
				
				print "</div>";
			}
		?>
	</div>
</div>
