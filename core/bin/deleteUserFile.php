<?php

define("DB_HOST","sf1.stockfile.ca");
define("DB_NAME","Stockfile");
define("DB_USER","stockdata");
define("DB_PASS","M\$\$data13!");

if(isset($_POST)) {

	$post = $_POST["items"];
	
	$post = explode(",", $post);
	
	$filePath = $post[0];
	
	$fileName = $post[1];

	$username = $post[2];
	
	$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);

	$thisUserName = $db->quote($username);
	
	$thisFilePath = $db->quote($filePath);
	
	$thisFileName = $db->quote($fileName);

	$request1 = $db->prepare("DELETE FROM user_file WHERE user_file.username=$thisUserName 
					AND user_file.file_path=$thisFilePath AND user_file.file_name=$thisFileName");
	
	$request1->execute();
	
	$request2 = $db->prepare("DELETE FROM file WHERE file.file_path=$thisFilePath AND file.file_name=$thisFileName");
	
	$request2->execute();
}

?>