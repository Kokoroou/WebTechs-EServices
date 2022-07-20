<?php

class LoginController extends Controller {

function view() {
    $this->set('title', 'login');
    $this->set('description', 'List of book');


    /** Initialize value to pass to views **/
  
$username = "Shadow";
    $user_id = $this->Login->getUserID($username);

	

    /** Pass value to views **/
   
}
}