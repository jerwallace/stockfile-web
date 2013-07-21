<?php
class File {

    private $filePath = "";
    private $fileName = "";
    private $version = 0;
    private $lastModified = "";
    private $lastSyncyBy = "";
    private $createdBy = "";

    public function __construct($path, $name) {
 
    	$this->filePath = $path;
    	$this->fileName = $name;
    	$this->loadFileInfo();
    }
    
    public function getFileName() {
        return $this->fileName;
    }
    
    public function setFileName($name) {
    	$this->fileName = $name;
    }

    public function getFilePath() {
        return $this->filePath;
    }
    
    public function setFilePath($path) {
    	$this->filePath = $path;
    }
    
    public function setFileVersion($ver)
    {
    	$this->version = $ver;
    }
    
    public function setFileLastModified($lastModified)
    {
    	$this->lastModified = $lastModified;
    }
    
    public function setLastSync($lastSync)
    {
    	$this->lastSyncyBy = $lastSync;
    }
    
    public function setCreatedBy($createdby)
    {
    	$this->createdBy = $createdby;
    }

    private function loadFileInfo() {

        global $db;

        $st = $db->prepare("SELECT * FROM file WHERE file_path = :path AND file_name = :name");
        $st->execute(array(":path" => $this->filePath, "name"=> $this->fileName));
        
        $aData = $st->fetch();

        $this->setFileVersion($aData['version']);
        $this->setFileLastModified($aData['last_modified']);
        $this->setLastSync($aData['last_sync_by']);
        $this->setCreatedBy($aData['created_by']);
    }
}
?>