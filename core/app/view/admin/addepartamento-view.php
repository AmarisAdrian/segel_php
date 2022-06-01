<?php
if(count($_POST)>0){
   if((!empty($_POST["id"])) && (!empty($_POST["name"]))) {
    $Departamento = new DepartamentoData();
    $Departamento->id = $_POST["id"];
	  $Departamento->nombre = $_POST["name"];
    $Departamento->Add();
    Core::alert("Correcto","Departamento insertado exitosamente","?view=departamento");
   }
   else{
    core::alert("Error","Ha ocurrido un error","?view=departamento");
   }
}
else{
  Core::alert("Error","Ha ocurrido un error de validacion","index.php?view=departamento");
}
