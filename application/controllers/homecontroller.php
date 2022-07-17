<?php

class HomeController extends Controller {
	
	function view() {
		$this->set('title', 'E-library');
		$this->set('description', 'A place where you find some of your favorite books');
	}

}
