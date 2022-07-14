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

	function view($userid = null, $name = null) {
		$booklist_id = $this->Booklist->selectBookID($userid, $name)[0]["Booklist.booklist"]["booklist_id"];
		$booklist = $this->Booklist->selectBookIDByBooklistID($booklist_id);
		$books = array();

		foreach ($booklist as $book) {
			$book_id = $book["Booklist.booklist_book"]["book_id"];
			$book_title = $this->Booklist->selectTitleByBookID($book_id)[0]["Book.book"]["title"];
			array_push($books, $book_title);
		}

		/** Pass value to views **/
		$this->set("books", $books);
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
