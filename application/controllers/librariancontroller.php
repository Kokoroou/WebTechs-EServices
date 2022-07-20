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
		$publisher = $_POST['publisher'];
		$copies = $_POST['copies'];

		$existed = $this->Librarian->checkBookExisted($isbn, $title);
		$this->set("existed", $existed);
		if (!$existed){
			$this->Librarian->addNewBook($isbn, $title, $author, $category, $publisher, $copies);
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
		$title=$_POST["title"];
		$existed = $this->Librarian->checkBookExistedOnlyTitle($title);
		$this->set("existed", $existed);
		$this->set("title", $title);

		$old_isbn = "";
		$old_author = "";
		$old_category = "";
		$old_publisher = "";
		$old_copies = "";
		if ($existed){
			$categories = $this->Librarian->selectAllCategories();
			$publishers = $this->Librarian->selectAllPublishers();
			$authors = $this->Librarian->selectAllAuthors();
			$this->set("categories", $categories);
			$this->set("publishers", $publishers);
			$this->set("authors", $authors);
			list($old_isbn, $old_author, $old_category, $old_publisher, $old_copies) = $this->Librarian->getInfoByTitle($title);
		}
		$this->set("old_isbn", $old_isbn);
		$this->set("old_author", $old_author);
		$this->set("old_category", $old_category);
		$this->set("old_publisher", $old_publisher);
		$this->set("old_copies", $old_copies);
	}

	function updateBook3(){
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$category = $_POST['category'];
		$publisher = $_POST['publisher'];
		$copies = $_POST['copies'];

		$this->Librarian->deleteBook($title);
		$this->Librarian->addNewBook($isbn, $title, $author, $category, $publisher, $copies);
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
