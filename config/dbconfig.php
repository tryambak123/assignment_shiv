<?php 
//error_reporting(1);
Class DB{
	
	private $hostName = "localhost";
	private $username = "root";
	private $password = "";
	private $dbName = "shopelectronics";
	private $conn = false;
    public $result = array();
    public $mysqli = "";
	
	public function __construct(){
		session_start();
		ini_set("error_reporting", E_ALL);
        ini_set("display_errors", 0);
		define('BASE_URL','http://localhost/ElectronicShop/');
		
	  if(!$this->conn){
	   $this->mysqli = new mysqli($this->hostName,$this->username,$this->password,$this->dbName);	
       $this->conn = true;
	if($this->mysqli->connect_error){
		array_push($this->result,$this->mysqli->connect_error);
		return false;
	}else{
       return true;		
	 }	
    }
  }  


}




?>