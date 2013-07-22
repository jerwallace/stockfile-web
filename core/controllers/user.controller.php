<?php
class UserController {

	private $thisUser;
	
	function __construct ($username) {
		
		$this->thisUser = $username;
	}
	
	public function handleRequest() {
		render('user');
	}
}
?>