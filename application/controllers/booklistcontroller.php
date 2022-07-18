<?php

class BooklistController extends Controller {

	function view($user_id = null, $name = "Borrowing") {
		$this->set('title', 'Booklist');
		$this->set('description', 'List of book');

		if ($user_id == null) $user_id = 2;

		/** Initialize value to pass to views **/
		$booklist_names = array();
		$book_ids = array();
		$book_titles = array();

		$booklist_names = $this->Booklist->selectBooklistName($user_id);
		
		if (in_array($name, $booklist_names)) {
			$booklist_id = $this->Booklist->selectBookID($user_id, $name);

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
	
	function add($book_id = null, $user_id = null) {
		if ($book_id == null) $book_id = 1;
		if ($user_id == null) $user_id = 2;

		$book_title = $this->Booklist->selectTitleByBookID($book_id);
		$booklist_names = $this->Booklist->selectBooklistName($user_id);

		$this->set('title', 'Add: ' . $book_title);
		$this->set('description', 'Add book to personal booklist');


		/** Pass value to views **/
		$this->set("booklist_names", $booklist_names);
		$this->set("book_id", $book_id);
		$this->set("book_title", $book_title);

		// $library = $_POST['library'];
		// $this->set('title','Success - E-Library');
		// $this->set('library', $this->BooklistBook->query('insert into BooklistBook (BooklistID, BookID) values (' . $booklistid . ', ' . $bookid . ')'));	
	}
	
	function delete($booklistid = null, $bookid = null) {
		$this->set('title','Success - E-Library');
		$this->set('library',$this->BooklistBook->query('delete from BooklistBook where BookID = ' . $booklistid . ' and BookID = ' . $bookid));	
	}
}
