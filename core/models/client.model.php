<?php

class Client {

    private $userName = "";
    private $clientType = "";
    private $clientLastSync = "";
    private $clientIpAddress = "";
    private $clientMacAddress = "";
    private $clientHomeDirectory = "";

    public function __construct($id) {
        $this->username = $username;
        $this->loadUserClients();
    }

    public function getUsername()
    {
    	return $this->username;
    }
    
    public function setUsername($userName)
    {
    	$this->username = $userName;
    } 
    
    public function setClientType($type)
    {
    	$this->clientType = $type;
    }
    
    public function setClientLastSync($lastSync)
    {
    	$this->clientLastSync = $lastSync;
    }
	
    public function setClientIpdAddress($ipAddress)
    {
    	$this->clientIpAddress = $ipAddress;
    }
    
    public function setClientMacAddress($macAddress)
    {
    	$this->clientMacAddress = $macAddress;
    }
    
    public function setClientHomeDirectory($homeDirectory)
    {
    	$this->clientHomeDirectory = $homeDirectory;
    }

    public function getClientType()
    {
    	return $this->clientType;
    }
    
    public function getClientLastSync()
    {
    	return $this->clientLastSync;
    }
    
    public function getClientIpdAddress()
    {
    	return $this->clientIpAddress;
    }
    
    public function getClientMacAddress()
    {
    	return $this->clientMacAddress;
    }
    
    public function getClientHomeDirectory()
    {
    	return $this->clientHomeDirectory;
    }
    
    private function loadUserInfo() {

        global $db;

        $st = $db->prepare("SELECT * FROM user_client WHERE username = :username");
        $st->execute(array(":username" => $this->username));

        $aData = $st->fetch();

        $this->setClientType($aData['client_type']);
        $this->setClientIpdAddress($aData['ip_address']);
        $this->setClientMacAddress($aData['mac_address']);
        $this->setClientLastSync($aData['last_sync']);
        $this->setClientHomeDirectory($aData['home_directory']);
    }
}
?>