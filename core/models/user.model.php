<?php
class User {

    private $username = 0;
    private $firstname = "";
    private $lastname = "";
    private $email = "";
    private $dateJoined = "";
    private $passwordHash = "";

    public function __construct($id) {
        $this->username = $username;
        $this->loadUserInfo();
    }

    public function getUsername()
    {
    	return $this->username;
    }
    
    public function setUsername($userName)
    {
    	$this->username = $userName;
    } 
    
    public function setPasswordHash($password)
    {
    	$this->passwordHash = $password;
    }
    
    public function getPasswordHash()
    {
    	return $this->passwordHash;
    }
    
    public function setName($firstname, $lastname) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getName() {
        return $this->lastname . ", " . $this->firstname;
    }
    
    public function setEmail($Email)
    {
		$this->email = $Email;    	    	
    }
    
    public function setDateJoined($datejoined)
    {
    	$this->dateJoined = $datejoined;
    }
    
    public function getEmail()
    {
    	 return $this->email;
    }
    
    public function getDateJoined()
    {
    	return $this->dateJoined;
    }
    
    public function getFiles()
    {
    	return $this->files;
    }

    private function loadUserInfo() {

        global $db;

        $st = $db->prepare("SELECT * FROM user WHERE username = :username");
        $st->execute(array(":username" => $this->username));


        $aData = $st->fetch();

        $this->setName($aData['first_name'], $aData['last_name']);
        $this->setEmail($aData['email']);
        $this->setDateJoined($aData['date_joined']);
        $this->setPasswordHash($aData['password']);
    }

}