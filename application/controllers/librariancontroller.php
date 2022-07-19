<?php

class LibrarianController extends Controller {
	
	function view() {
		$name = $this->Librarian->printNameByID(1);
		$this->set("name", $name);
	}

	function enterBook(){
		$categories = $this->Librarian->selectAllCategories();
		$publishers = $this->Librarian->selectAllPublishers();
		$authors = $this->Librarian->selectAllAuthors();
		$this->set("categories", $categories);
		$this->set("publishers", $publishers);
		$this->set("authors", $authors);
	}

	function insertBook(){

	}

	function viewAllBooks(){
		$book_ids = array();
		$book_titles = array();

		list($book_ids, $book_titles) = $this->Librarian->selectAllBooks();

		$this->set("book_ids", $book_ids);
		$this->set("book_titles", $book_titles);
	}
}
