<?php

class Booklist extends Model {
    protected $_model;

	function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = "Booklist";
		$this->_table1 = "booklist.booklist";
        $this->_table2 = "booklist.booklist_book";
        $this->_table3 = "book.book";
	}

    function selectBooklistName($user_id) {
        $query = 'select name from `' . $this->_table1 . '` where user_id = ' . $user_id . ';';
        return $this->query($query);
    }

    function selectBookID($user_id, $name) {
        $query = 'select booklist_id from `' . $this->_table1 . '` where user_id = ' . $user_id . ' and name = "' . $name . '";';
        return $this->query($query);
    }

    function selectBookIDByBooklistID($booklist_id) {
        $query = 'select book_id from `' . $this->_table2 . '` where booklist_id = ' . $booklist_id . ';';
        return $this->query($query);
    }

    function selectTitleByBookID($book_id) {
        $query = 'select title from `' . $this->_table3 . '` where book_id = ' . $book_id . ';';
        return $this->query($query);
    }

}
