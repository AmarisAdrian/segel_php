<?php
if(count($_POST)>0){
  if((!empty($_POST["nombre"])) && (!empty($_POST["idDepartamento"]))){
    $Ciudad = CiudadData::GetById($_POST["id"]);
    $Ciudad->id = $_POST["id"];
    //$Ciudad->idDepartamento = $_POST["idDepartamento"];
    $Ciudad->nombre = $_POST["nombre"];
	  $Ciudad->Update();
    Core::alert("Correcto","Ciudad actualizada exitosamente","index.php?view=ciudad");
  }
  else{
    Core::alert("Error","La Ciudad no pudo ser actualizada!","index.php?view=ciudad");
  }
}
else{
  Core::alert("Error","Ha ocurrido un error de validacion","index.php?view=ciudad");
}