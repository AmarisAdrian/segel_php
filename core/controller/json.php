<?php
class json {
	public function __construct()
	{
		$this->header =  header('Content-type: application/json');
	} 
	public static function load($json){
				
		if(!isset($_GET['json'])){
			include "core/app/json/".$json."-json.php";			
		}else{
			if(Action::isValid()){
				include "core/app/json/".$_POST['json']."-json.php";				
			}else{
				json::Error("<b>404 NOT FOUND</b> Action <b>".$_GET['json']."</b> folder  !! - <a href='http://www.crabsdev.co target='_blank'>Help</a>");
			}
		}
	}
	public static function isValid(){
		$valid=false;
		if(file_exists($file = "core/app/json/".$_POST['json']."-json.php")){
			$valid = true;
		}
		return $valid;
	}
	public static function Error($message){
		print $message;
	}
	public function execute($json,$function){
		$fullpath =  "core/app/json/".$json."-json.php";
		if(file_exists($fullpath)){
			include $fullpath;
		}
	}
}?>