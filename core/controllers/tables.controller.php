<?php 
	class TablesController {
		
		private $thisUser;
		
		function __construct ($username) {
			
			$this->thisUser = $username;
			$_SESSION["username"] = $username;
		}
	}
?>