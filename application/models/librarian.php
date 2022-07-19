<?php

class Librarian extends Model {
    protected $_model;

    function __construct(){
        $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->_model = "Librarian";
        $this->_table1 = "user.librarian"; 
        $this->_table2 = "book.book";
    }

    function printNameByID($librarian_id){
        $query = 'select first_name from `' . $this->_table1 . '` where librarian_id = ' . $librarian_id . ';';

        $object = $this->query($query);

        $name = $object[0]["User.librarian"]["first_name"];

        return $name;
    }

    function selectAllBooks(){
        $query = 'select book_id, title from `' . $this->_table2 . '`;';
        $objects = $this->query($query);

        $book_ids = array();
		$book_titles = array();

        foreach($objects as $idx => $object){
            array_push($book_ids, $object["Book.book"]["book_id"]);
            array_push($book_titles, $object["Book.book"]["title"]);
        }

        return array($book_ids, $book_titles);
    }
}
