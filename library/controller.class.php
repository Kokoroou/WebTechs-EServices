<?php
class Controller {

	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_template;

	function __construct($model, $controller, $action) {

		$this->_controller = $controller;
		$this->_action = $action;
		$this->_model = $model;

		$this->$model =new $model;
		
		$this->_template =new Template($controller,$action);

	}

	function set($name,$value) {
		$this->_template->set($name,$value);
	}

	function __destruct() {
			$this->_template->render();
	}

}

// class Controller {

// 	protected $_model;
// 	protected $_controller;
// 	protected $_object;
// 	protected $_action;
// 	protected $_template;

// 	function __construct($model, $controllerName, $objectName, $action) {

// 		$this->_model = $model;
// 		$this->_controller = $controllerName;
// 		$this->_object = $objectName;
// 		$this->_action = $action;
		
// 		$this->$model = new $model;
// 		$this->_template = new Template($controllerName, $action);

// 	}

// 	function set($name, $value) {
// 		$this->_template->set($name, $value);
// 	}

// 	function __destruct() {
// 			$this->_template->render();
// 	}

// }
