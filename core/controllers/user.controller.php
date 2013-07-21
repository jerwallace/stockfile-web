<?php
class UserController {

	private $thisUser;
	private $userFiles;
	
	public function __construct ($username,$password) {
		
		if(!authenticateUseruser($username, $password)) {
			throw Exception("Sorry, password failed!");
		} else {
			$_SESSION["userName"] = $username;
			$this->thisUser = new User($username);
		}
	}
	
	public function getFilesByUser() {
				
		global $db;
		
		$st = $db->prepare("SELECT file_path, file_name FROM Stockfile.user_file JOIN Stockfile.user 
							ON Stockfile.user.username = Stockfile.user_file.username
							WHERE Stockfile.user.username = :username;");
		
		$st->execute(array("username" => $thisUser));
	
		$aData = $st->fetch();
		
		$fileList = array();
		
		$counter = 0;
		
		while ($row = mysql_fetch_array($aData))
		{
			$filePath = $row['file_path'];
			$fileName = $row['file_name'];
			$fileList[$counter] = new File($filePath, $fileName);
			$counter++;
		} 
	}
	
	public function authenticateUser($username, $password)
	{
		global $db;
		
		$st = $db->prepare("SELECT * FROM user WHERE username = :username AND password = :password;");
		
		$st->execute(array("username" => $thisUser, "password" => sha1($password)));
		
		$aData = $st->fetch();
		
		if(mysql_num_rows($aData)==0) {
			return false;
		}
		else {
			return true;
		}
	}
	
	public function handleRequest() {
		render('user', array(
		'title' => 'Welcome to StockFile!',
		'caption' => 'Take a look at your files.',
		'user' => $this->user,
		'filelist' => $this->userFiles
				));
	}

}
?>