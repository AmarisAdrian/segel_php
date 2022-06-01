<?php
// 13 de Abril del 2014
// View.php
// @brief Una vista corresponde a cada componente visual dentro de un modulo.
class View {
	/**
	* @function load
	* @brief la funcion load carga una vista correspondiente a un modulo
	**/	
	public static function load($rol,$view){
		if((!isset($_GET['view']))){
		  if($rol==1)
		  {
			 include "core/app/view/admin/".$view."-view.php";
		  }	
		  else if($rol==2)
		  {
			include "core/app/view/manager/".$view."-view.php";
		  }
		  else if($rol==3)
		  {
		 	include "core/app/view/lider/".$view."-view.php";
		  }				  
		}else{

			if(View::isValid($rol)){
				if($rol==1)
		  		{
					include "core/app/view/admin/".$_GET['view']."-view.php";
		  		}	
		  		else if($rol==2)
		  		{
					include "core/app/view/manager/".$_GET['view']."-view.php";
		  		}
		  		else if($rol==3)
		  		{
		 			include "core/app/view/lider/".$_GET['view']."-view.php";
		  		}								
			}else if($rol==1 || $rol==2 || $rol==3)
			{
				include "core/app/view/".$_GET['view']."-view.php";
			}
			else
			{
				View::Error("<b>406 NOT FOUND</b> View <b>".$_GET['view']."</b> folder !! - <a href='http://www.crabsdev.co' target='_blank'>Help</a>");
			}
		}
	}
	/**
	* @function isValid
	* @brief valida la existencia de una vista
	**/	
	public static function isValid($rol){
		$valid=false;
		if(isset($_GET["view"])){
			if(($rol==1) && (file_exists($file = "core/app/view/admin/".$_GET['view']."-view.php")))
		  	{
				$valid = true;
			}
			else if(($rol==2) &&(file_exists($file = "core/app/view/manager/".$_GET['view']."-view.php"))){
				$valid = true;
			}
			else if(($rol==3) &&(file_exists($file = "core/app/view/lider/".$_GET['view']."-view.php"))){
				 $valid = true;
			}
		}
		return $valid;
	}
	public static function Error($message){
		print $message;
	}
}
?>