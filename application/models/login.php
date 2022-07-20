<?php

class Login extends Model {
    protected $_model;

	function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = "Login";
		$this->_table1 = "user.user";
        $this->_table2 = "user.librarian";
        $this->_table3 = "user.member";
        $this->_table4 = "user.password";
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

    function getUserID($username) {
        $query = 'select user_id from `' . $this->_table1 . '` where account_name = "' . $username . '";';

        $object = $this->query($query);
        console_log($object);

        $user_id = $object[0]["User.user"]["user_id"];

        return $user_id;
    }
}