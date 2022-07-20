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
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$category = $_POST['category'];
		$publishers = $_POST['publisher'];
		$copies = $_POST['copies'];

		$existed = $this->Librarian->checkBookExisted($isbn, $title);
		$this->set("existed", $existed);
		if (!$existed){
			$this->Librarian->addNewBook($isbn, $title, $author, $category, $publishers, $copies);
		}
	}

	function viewAllBooks(){
		$book_ids = array();
		$book_titles = array();

		list($book_ids, $book_titles) = $this->Librarian->selectAllBooks();

		$this->set("book_ids", $book_ids);
		$this->set("book_titles", $book_titles);
	}

	function updateBook(){
		$titles = $this->Librarian->selectAllBooksName();
		$this->set("titles", $titles);
	}

	function updateBook2(){
		$categories = $this->Librarian->selectAllCategories();
		$publishers = $this->Librarian->selectAllPublishers();
		$authors = $this->Librarian->selectAllAuthors();
		$this->set("categories", $categories);
		$this->set("publishers", $publishers);
		$this->set("authors", $authors);
	}

	function deleteBook(){
		$titles = $this->Librarian->selectAllBooksName();
		$this->set("titles", $titles);
	}

	function deleteBook2(){
		$title=$_POST["title"];
		$existed = $this->Librarian->checkBookExistedOnlyTitle($title);

		$this->set("existed", $existed);
		if ($existed){
			$this->Librarian->deleteBook($title);
		}
	}
}
