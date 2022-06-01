<?php
class Database {
	public static $db;
	public static $con;
	function __construct($user="root",$pass="",$host="127.0.0.1",$ddbb="SEGEL",$port="3306"){
			
		$is_local = false;
		if($_SERVER['HTTP_HOST'] == 'localhost' || substr($_SERVER['HTTP_HOST'],0,3) == '10.' || substr($_SERVER['HTTP_HOST'],0,7) == '192.168') {
			$is_local = true;
		}

		if(!$is_local){
			$user="segel";
			$pass="k36L0nKH6b5RD1xU";
			$host="127.0.0.1";
			$ddbb="segel";
			$port="3306";
		}

		$this->user=$user;
		$this->pass=$pass;
		$this->host=$host;
		$this->ddbb=$ddbb;
		$this->port=$port;
	}	 
  	function connect(){
		try
		{
			//$con= new PDO("mysql:host=".$this->host.";dbname=".$this->ddbb."",$this->user,$this->pass,$this->port);
			$con= new mysqli($this->host,$this->user,$this->pass,$this->ddbb,$this->port);			
			$con->query("SET SQL_MODE='';");
			$con->query("SET NAMES 'UTF8'");
			if (mysqli_connect_errno()) {
				error_log("Conexión fallida: %s\n", mysqli_connect_error());
			}
		}catch(exception $ex){
			error_log($ex , mysqli_connect_error());
		}
		/*	if (PDO::ERRMODE_EXCEPTION()) {
				echo "Conexión fallida: ",$ex->getMessage();
			}
		}catch(PDOException $ex){
			echo "Ha ocurrido el siguiente error: ",$ex->getMessage();
		}*/
	 	return $con;
	}
	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
}
?>
