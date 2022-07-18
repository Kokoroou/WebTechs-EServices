<?php

class SearchingController extends Controller {
	
	function view($query = null) {
		if ($query == null) $query = "";

		$query = str_replace('+', ' ', $query);

		$this->set('title', 'E-library');
		$this->set('description', 'Searching: ' . $query);

		/** Initialize value to pass to views **/
		$book_ids = array();
		$book_titles = array();

		$title_objects = $this->Searching->searchBookIDByTitle($query);
		foreach ($title_objects as $title_object) {
			// console_log($title_object);
			$book_id = $title_object["Book.book"]["book_id"];
			$book_title = $this->Searching->selectTitleByBookID($book_id)[0]["Book.book"]["title"];
			array_push($book_ids, $book_id);
			array_push($book_titles, $book_title);
		}

		// $names = $this->Booklist->selectBooklistName($user_id);
		// foreach ($names as $booklist_name) {
		// 	$booklist_name = $booklist_name["Booklist.booklist"]["name"];
		// 	array_push($booklist_names, $booklist_name);
		// }
		
		// if (in_array($name, $booklist_names)) {
		// 	$booklist = $this->Booklist->selectBookID($user_id, $name);
		// 	$booklist_id = $booklist[0]["Booklist.booklist"]["booklist_id"];
		// 	$books = $this->Booklist->selectBookIDByBooklistID($booklist_id);

			// foreach ($books as $book) {
			// 	$book_id = $book["Booklist.booklist_book"]["book_id"];
			// 	$book_title = $this->Booklist->selectTitleByBookID($book_id)[0]["Book.book"]["title"];
			// 	array_push($book_ids, $book_id);
			// 	array_push($book_titles, $book_title);
			// }
		// }		

		/** Pass value to views **/
		$this->set("book_ids", $book_ids);
		$this->set("book_titles", $book_titles);



	}

}
