<?php

// class BooklistsController extends Controller {

//     function view($bookid = null) {
	
// 		$this->set('title', 'E-Library');
// 		$this->set('library', $this->Book->select($bookid));

// 	}
	
// 	function viewall($userid = null, $name = null) {

// 		$this->set('title', $name.' - E-Library');
// 		$this->set('library', $this->BooklistBook->selectAll($userid));
// 	}
	
// 	function add($booklistid = null, $bookid = null) {
// 		$library = $_POST['library'];
// 		$this->set('title','Success - E-Library');
// 		$this->set('library', $this->BooklistBook->query('insert into BooklistBook (BooklistID, BookID) values (' . $booklistid . ', ' . $bookid . ')'));	
// 	}
	
// 	function delete($booklistid = null, $bookid = null) {
// 		$this->set('title','Success - E-Library');
// 		$this->set('library',$this->BooklistBook->query('delete from BooklistBook where BookID = ' . $booklistid . ' and BookID = ' . $bookid));	
// 	}
// }

class BooklistController extends Controller {

	function view($user_id = null, $name = null) {
		$this->set('title', 'Booklist');
		$this->set('description', 'List of book');

		if ($user_id == null) $user_id = 2;
        if ($name == null) $name = "Borrowing";

		/** Initialize value to pass to views **/
		$booklist_names = array();
		$book_ids = array();
		$book_titles = array();

		$names = $this->Booklist->selectBooklistName($user_id);
		foreach ($names as $booklist_name) {
			$booklist_name = $booklist_name["Booklist.booklist"]["name"];
			array_push($booklist_names, $booklist_name);
		}
		
		if (in_array($name, $booklist_names)) {
			$booklist = $this->Booklist->selectBookID($user_id, $name);
			$booklist_id = $booklist[0]["Booklist.booklist"]["booklist_id"];
			$books = $this->Booklist->selectBookIDByBooklistID($booklist_id);

			foreach ($books as $book) {
				$book_id = $book["Booklist.booklist_book"]["book_id"];
				$book_title = $this->Booklist->selectTitleByBookID($book_id)[0]["Book.book"]["title"];
				array_push($book_ids, $book_id);
				array_push($book_titles, $book_title);
			}
		}		

		/** Pass value to views **/
		$this->set("name", $name);
		$this->set("booklist_names", $booklist_names);
		$this->set("book_ids", $book_ids);
		$this->set("book_titles", $book_titles);
	}
	
	function viewall($userid = null, $name = null) {

		$this->set('title', $name . '\'s Booklist');
		$this->set('library', $this->Booklist->selectAll($userid));
	}

	function getall($userid = null) {
		$this->set('booklists', $this->Booklist_Book->selectAllByUserID($userid));
	}
	
	function add($booklistid = null, $bookid = null) {
		$library = $_POST['library'];
		$this->set('title','Success - E-Library');
		$this->set('library', $this->BooklistBook->query('insert into BooklistBook (BooklistID, BookID) values (' . $booklistid . ', ' . $bookid . ')'));	
	}
	
	function delete($booklistid = null, $bookid = null) {
		$this->set('title','Success - E-Library');
		$this->set('library',$this->BooklistBook->query('delete from BooklistBook where BookID = ' . $booklistid . ' and BookID = ' . $bookid));	
	}
}
