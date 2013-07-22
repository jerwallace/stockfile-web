<?php
require_once "core/helper.php";
require_once "core/controllers/home.controller.php";
require_once "core/controllers/user.controller.php";
require_once "core/models/file.model.php";
require_once "core/models/user.model.php";

define("DB_HOST","sf1.stockfile.ca");
define("DB_NAME","Stockfile");
define("DB_USER","stockdata");
define("DB_PASS","M\$\$data13!");

if(isset($_POST)) {

	$username = $_POST["items"];

	$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);

	$thisUserName = $db->quote($username);

	$request = $db->prepare("SELECT * FROM user_client WHERE user_client.username=$thisUserName");

	$request->execute();

	$result = $request->fetchAll(PDO::FETCH_NUM);
		
	print json_encode($result);
}

?>