<?php
	
	define("DB_HOST","sf1.stockfile.ca");
	define("DB_NAME","Stockfile");
	define("DB_USER","stockdata");
	define("DB_PASS","M\$\$data13!");

	if(isset($_POST)) {
		
		$username = $_POST["items"];

		$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
		
		$thisUserName = $db->quote($username);
		
		$request = $db->prepare("SELECT file_path, file_name FROM user_file JOIN user
				ON user.username = user_file.username
				WHERE user.username=$thisUserName");
		
		$request->execute();
		
		$result = $request->fetchAll(PDO::FETCH_NUM);
			
		print json_encode($result);
	}

?>
