<?php

class Account extends Model {
    protected $_model;

	function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = "Acoount";
		$this->_table1 = "user.info";
        $this->_table2 = "user.librarian";
        $this->_table3 = "user.member";
        $this->_table4 = "user.email_address";
        $this->_table5 = "user.phone_number";
        $this->_table6 = "user.password";
	}
    
}
