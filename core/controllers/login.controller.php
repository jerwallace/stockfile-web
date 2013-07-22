<?php

class LoginController {
	
	function __construct ($username,$password) {
	
		if(!authenticateUser($username, $password)) {
			throw Exception("Sorry, password failed!");
		} else {
			$_SESSION["username"] = $username;
		}
	}
}

function authenticateUser($userName, $Password)
{
	global $db;

	$thisUserName = $db->quote($userName);
		
	$thisPassword = $db->quote($Password);

	$request = $db->prepare("SELECT * FROM user WHERE username=$thisUserName AND password=$thisPassword");

	$request->execute();

	$result = $request->fetchAll(PDO::FETCH_NUM);

	print var_dump($result);

	if (sizeof($result)==0){
		return false;
	} else{
		return true;
	}
}
?>