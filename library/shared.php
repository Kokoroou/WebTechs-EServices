<?php


/** Check if environment is development and display errors **/

function setReporting() {
if (DEVELOPMENT_ENVIRONMENT == true) {
	error_reporting(E_ALL);
	ini_set('display_errors','On');
} else {
	error_reporting(E_ALL);
	ini_set('display_errors','Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
}

/** Check for Magic Quotes and remove them **/

function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

/** Check register globals and remove them **/

function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

function callHook() {
	global $url;
	global $uri;

	/** Get path from URL **/
	$urlArray = explode("/",$url);
	
	/** Get query from URI **/
	$uri = parse_url($uri);
	$query = array();
	if (array_key_exists("query", $uri)) {
		$queryArray = explode("&", $uri["query"]);
		foreach ($queryArray as $q) {
			$query = array_merge($query, parse_ini_string($q));
		}	
	}

	/** Remove empty string at end of $urlArray **/
	if (end($urlArray) == "") {
		array_pop($urlArray);
	}

	/** Default value for controller and action **/
	$controller = count($urlArray) > 0 ? $urlArray[0] : "home";
	$action = count($urlArray) > 1 ? $urlArray[1] : "view";

	$controllerName = $controller;
	$model = ucwords($controller);
	$controller = $model . "Controller";

	if (class_exists($controller)) {
		$dispatch = new $controller($model, $controllerName, $action);
	}
	else {
		http_response_code(404);
		header("Location: " . explode($url, $uri["path"])[0] . "error404");
		die();
	}

	if ((int)method_exists($controller, $action)) {
		call_user_func_array(array($dispatch,$action),$query);
	} else {
		http_response_code(404);
		header("Location: " . explode($url, $uri["path"])[0] . "error404");
		die();
	}
}

/** Autoload any classes that are required **/

function autoloader($className) {
	if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php')) {
		require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
	} else {
	}
}

spl_autoload_register('autoloader');

setReporting();
unregisterGlobals();
callHook();
