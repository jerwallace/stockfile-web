 <?php
	require_once "core/helper.php";
	require_once "core/controllers/home.controller.php";
	require_once "core/controllers/user.controller.php";
	require_once "core/models/file.model.php";
	require_once "core/models/user.model.php";
 ?>

 <?php render('_header',array('title'=>$title,'caption'=>$caption))?>

 <?php

	define("DB_HOST","sf1.stockfile.ca");
	define("DB_NAME","Stockfile");
	define("DB_USER","stockdata");
	define("DB_PASS","M\$\$data13!");

	try {
		
 		//+++++++++++++++++++++++++++++++++NEW QUERY+++++++++++++++++++++++++++++++++++
		
 		$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
		
// 		$username = "jeremy";
		
// 		$thisUserName = $db->quote($username);
		
// 		$request = $db->prepare("SELECT * FROM user WHERE username=$thisUserName");
		
// 		$request->execute();
		
// 		$result = $request->fetchAll(PDO::FETCH_NUM);
		
// 		print var_dump($result);

		//+++++++++++++++++++++++++++++++++NEW QUERY+++++++++++++++++++++++++++++++++++
				
		$username = "jeremy";
		
		$thisUserName = $db->quote($username);
			
		$password = hash('sha256', 'wallace123');
		
		$thisPassword = $db->quote($password);
		
		$request = $db->prepare("SELECT * FROM user WHERE username=$thisUserName AND password=$thisPassword");

		$request->execute();

		$result = $request->fetchAll(PDO::FETCH_NUM);
		
		if(sizeof($result)>0) {
			print "true, User Name is: " . $result[0][0];
		} else
		{
			print " false ";
		}

		print var_dump($result);

		//+++++++++++++++++++++++++++++++++NEW QUERY+++++++++++++++++++++++++++++++++++
		
// 		$username = "jeremy";
		
// 		$thisUserName = $db->quote($username);
		
// 		$request = $db->prepare("SELECT file_path, file_name FROM user_file JOIN user
// 							ON user.username = user_file.username
// 							WHERE user.username=$thisUserName");
				
// 		$request->execute();

// 		$aData = $request->fetchAll(PDO::FETCH_NUM);
		
// 		$count = 1;
		 
	}
	catch (Exception $e){
	
	}
 ?>

 <?php render('_footer')?>