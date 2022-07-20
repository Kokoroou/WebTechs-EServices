<?php

class BooklistController extends Controller {

	function view($user_id = 2, $name = "Borrowing") {
		$this->set('title', 'Booklist');
		$this->set('description', 'List of book');

		/** Initialize value to pass to views **/
		$booklist_names = array();
		$book_ids = array();
		$book_titles = array();

		$booklist_ids = $this->Booklist->selectBooklistID($user_id);

		foreach ($booklist_ids as $book_id) {
			$booklist_name = $this->Booklist->selectBooklistNameByBooklistID($book_id);
			array_push($booklist_names, $booklist_name);
		}

		if (in_array($name, $booklist_names)) {
			$index = array_search($name, $booklist_names);

			$booklist_id = $booklist_ids[$index];

			$book_ids = $this->Booklist->selectBookIDByBooklistID($booklist_id);

			foreach ($book_ids as $book_id) {
				$book_title = $this->Booklist->selectTitleByBookID($book_id);
				array_push($book_titles, $book_title);
			}
		}		

		/** Pass value to views **/
		$this->set("name", $name);
		$this->set("booklist_names", $booklist_names);
		$this->set("book_ids", $book_ids);
		$this->set("book_titles", $book_titles);
	}
	
	function addBook($book_id = 0) {
		$user_id = 2;

		$book_title = $this->Booklist->selectTitleByBookID($book_id);
		$booklist_ids = $this->Booklist->selectBooklistID($user_id);
		$booklist_names = array();

		foreach ($booklist_ids as $booklist_id) {
			$booklist_name = $this->Booklist->selectBooklistNameByBooklistID($booklist_id);
			array_push($booklist_names, $booklist_name);
		}

		$this->set('title', 'Add: ' . $book_title);
		$this->set('description', 'Add book to personal booklist');

		if (isset($_POST["booklist_id"])) {
			$this->Booklist->addBookToBooklist($_POST["booklist_id"], $book_id);
			$this->set("book_id", $book_id);
			$this->set("status", 1);
		}
		else {
			/** Pass value to views **/
			$this->set("booklist_ids", $booklist_ids);
			$this->set("booklist_names", $booklist_names);
			$this->set("book_id", $book_id);
			$this->set("book_title", $book_title);	

			$this->set("status", 0);
		}
	}
	
	function delete() {
		$this->set('title','Delete Booklist');
		$this->set('description', 'Delete a personal Booklist');
		
		$user_id = 2;

		if (isset($_POST["booklist_id"])) {
			$this->Booklist->deleteBooklist($user_id, $_POST["booklist_id"]);
			$this->set("status", 1);
		}
		else {
			$booklist_ids = $this->Booklist->selectBooklistID($user_id);
			$booklist_names = array();

			foreach ($booklist_ids as $booklist_id) {
				$booklist_name = $this->Booklist->selectBooklistNameByBooklistID($booklist_id);
				array_push($booklist_names, $booklist_name);
			}
			$this->set("booklist_ids", $booklist_ids);
			$this->set("booklist_names", $booklist_names);

			$this->set("status", 0);
		}

	}

	function add() {
		$this->set('title', 'Add Booklist');
		$this->set('description', 'Add a personal Booklist');

		$user_id = 2;

		if (isset($_POST["name"])) {
			$this->Booklist->addBooklist($user_id, $_POST["name"]);
			$this->set("status", 1);
		}
		else {
			$this->set("status", 0);
		}
		
	}
}
