<?php
if(count($_POST)>0){
  if(isset($_POST["nombre"])){
    $Departamento = DepartamentoData::GetById($_POST["id"]);
    $Departamento->id = $_POST["id"];
	  $Departamento->nombre = $_POST["nombre"];
	  $Departamento->Update();
    Core::alert("Correcto","Departamento actualizado exitosamente","index.php?view=departamento");
  }
  else{
    Core::alert("Error","El Departamento no pudo ser actualizado!","index.php?view=departamento");
  }
}
else{
  Core::alert("Error","Ha ocurrido un error de validacion","index.php?view=departamento");
}