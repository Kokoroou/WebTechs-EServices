<?php

class Searching extends Model {
    protected $_model;

	function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = "Searching";
        $this->_table1 = "book.book";
	}

    function searchBookIDByTitle($title) {
        $query = 'select book_id from `' . $this->_table1 . '` where title like "%' . $title . '%";';
        return $this->query($query);
    }

    function selectTitleByBookID($book_id) {
        $query = 'select title from `' . $this->_table1 . '` where book_id = ' . $book_id . ';';
        return $this->query($query);
    }
}
