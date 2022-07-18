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
        /** Intialize return variable**/
        $booklist_names = array();

        /** Main query **/
        $query = 'select name from `' . $this->_table1 . '` where user_id = ' . $user_id . ';';

        /** Object return by query **/
        $objects = $this->query($query);

        /** Edit data to return **/
        foreach ($objects as $object) {
			$booklist_name = $object["Booklist.booklist"]["name"];
			array_push($booklist_names, $booklist_name);
		}

        return $booklist_names;
    }

    function selectBookID($user_id, $name) {
        $query = 'select booklist_id from `' . $this->_table1 . '` where user_id = ' . $user_id . ' and name = "' . $name . '";';

        $object = $this->query($query);

        $book_id = $object[0]["Booklist.booklist"]["booklist_id"];

        return $book_id;
    }

    function selectBookIDByBooklistID($booklist_id) {
        $book_ids = array();

        $query = 'select book_id from `' . $this->_table2 . '` where booklist_id = ' . $booklist_id . ';';

        $objects = $this->query($query);

        foreach ($objects as $object) {
			$book_id = $object["Booklist.booklist_book"]["book_id"];
			array_push($book_ids, $book_id);
		}

        return $book_ids;
    }

    function selectTitleByBookID($book_id) {
        $query = 'select title from `' . $this->_table3 . '` where book_id = ' . $book_id . ';';

        $object = $this->query($query);

        $title = $object[0]["Book.book"]["title"];

        return $title;
    }

}
