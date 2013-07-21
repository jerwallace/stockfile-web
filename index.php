<?php

session_start();

//require_once "core/config.inc";
//require_once "core/mysql.php";
require_once "core/helper.php";
require_once "core/controllers/home.controller.php";
require_once "core/controllers/user.controller.php";
require_once "core/models/file.model.php";
require_once "core/models/user.model.php";

// This will allow the browser to cache the pages of the store.

header('Cache-Control: max-age=3600, public');
header('Pragma: cache');
header("Last-Modified: " . gmdate("D, d M Y H:i:s", time()) . " GMT");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 3600) . " GMT");

try {
    if($_GET["login"])
    {
    	$username = $_GET["username"];
    	$hashed = sha1($_GET["password"]);
    	$controller = new UserController($username,$hashed);
    }
    $controller = new HomeController();
    $controller->handleRequest();
    
} catch (Exception $e) {
    // Display the error page using the "render()" helper function:
    render('error', array('message' => $e->getMessage()));
}