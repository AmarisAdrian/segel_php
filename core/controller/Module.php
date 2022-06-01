<?php
class Module {

	public static function loadLayout()
	{
	 include "core/app/view/login-view.php";	
	}
	public static function LoadTypeLayout($Rol)
	{	 
		if($Rol==1){
			include "core/app/layouts/admin/layout_admin.php";
		}
		else if($Rol==2)
		{
			include "core/app/layouts/manager/layout_manager.php";
		}
		else if($Rol==3)
		{
			include "core/app/layouts/lider/layout_lider.php";
		}	
	}
}
?>
