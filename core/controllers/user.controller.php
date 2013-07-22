<?php
class UserController {

	private $thisUser;
	private $fileList = array();
	
	function __construct ($username) {
		
		$this->thisUser = $username;
		
		$this->getFilesByUser($username);
// 		$this->handleRequest();
	}
	
	public function getFilesByUser($userName) {
				
		global $db;
		
		$thisUserName = $db->quote($userName);
		
		$request = $db->prepare("SELECT file_path, file_name FROM user_file JOIN user
							ON user.username = user_file.username
							WHERE user.username=$thisUserName");
				
		$request->execute();

		$results = $request->fetchAll(PDO::FETCH_NUM);
		
// 		$this->displayResultsTable($userName, $results);
	}

	public function displayResultsTable($username, $aData) {
?>
		<h2>Here is the list of your files: <?php print $username?></h2>
		
		<table id = "fileListTable">
			<tr>
			<th>File Path</th>
			<th>File Name</th>
			</tr>
			<?php
			foreach ($aData as $result)
			{
			?>
			  <tr>
			    <td><?php print $result[0];?></td>
			    <td><?php print $result[1];?></td>
			  </tr>
			<?php
			}
			?>
		</table>
<?php
	}
	
	public function handleRequest() {
		render('user', array(
		'title' => NULL,
 		'caption' => NULL,
// 		'user' => $this->user,
// 		'filelist' => $this->userFiles
				));
	}

}
?>