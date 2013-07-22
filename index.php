<?php

session_start();

require_once "core/config.inc";
require_once "core/mysql.php";
require_once "core/helper.php";
require_once "core/controllers/home.controller.php";
require_once "core/controllers/user.controller.php";
require_once "core/controllers/login.controller.php";
require_once "core/models/user.model.php";

// This will allow the browser to cache the pages of the store.
header('Cache-Control: max-age=3600, public');
header('Pragma: cache');
header("Last-Modified: " . gmdate("D, d M Y H:i:s", time()) . " GMT");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 3600) . " GMT");

 

	if(isset($_POST['logout']))
	{
		session_unset();
		session_destroy();
		$controller = new HomeController();
	}
	if(isset($_POST["username"]) && isset($_POST["password"]))
	{
		$username = $_POST["username"];
		$hashed = hash('sha256', $_POST["password"]);
		try {
			$controller = new LoginController($username, $hashed);
			header("Location:index.php");
		} catch (Exception $e) {
			//render('error', array('message' => $e->getMessage()));
		}
	}
	else if (isset($_SESSION["username"])) {
			
		$username = $_SESSION["username"];
		$thisUser = new User($username);
		$controller = new UserController($username);
			
	} else {
		$controller = new HomeController();
	}
	$controller->handleRequest();
	
?>