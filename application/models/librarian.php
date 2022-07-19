<?php

class Librarian extends Model {
    protected $_model;

    function __construct(){
        $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->_model = "Librarian";
    }

    function printNameByID($librarian_id){
        $query = 'select first_name from `user.librarian` where librarian_id = ' . $librarian_id . ';';
        $object = $this->query($query);

        $name = $object[0]["User.librarian"]["first_name"];

        return $name;
    }

    function selectAllBooks(){
        $query = 'select book_id, title from `book.book`;';
        $objects = $this->query($query);

        $book_ids = array();
		$book_titles = array();

        foreach($objects as $idx => $object){
            array_push($book_ids, $object["Book.book"]["book_id"]);
            array_push($book_titles, $object["Book.book"]["title"]);
        }

        return array($book_ids, $book_titles);
    }

    function selectAllCategories(){
        $query = 'select distinct name from `book.category`;';
        $objects = $this->query($query);

        $categories = array();

        foreach($objects as $idx => $object){
            array_push($categories, $object["Book.category"]["name"]);
        }

        return $categories;
    }

    function selectAllPublishers(){
        $query = 'select name from `book.publisher`;';
        $objects = $this->query($query);

        $publishers = array();

        foreach($objects as $idx => $object){
            array_push($publishers, $object["Book.publisher"]["name"]);
        }

        return $publishers;
    }

    function selectAllAuthors(){
        $query = 'select first_name from `book.author`;';
        $objects = $this->query($query);

        $authors = array();

        foreach($objects as $idx => $object){
            array_push($authors, $object["Book.author"]["first_name"]);
        }

        return $authors;
    }
}
