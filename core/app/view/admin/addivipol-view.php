<?php
if(count($_POST)>0){
if((!empty($_POST["iddepartamentodivipol"])) && (!empty($_POST["idciudadivipol"]))&& (!empty($_POST["nombre"]))&& (!empty($_POST["referencia"]))&&(!empty($_POST["comentario"]))) {
    $Divipol = new DivipolData();
    $Divipol->idDepartamento = $_POST["iddepartamentodivipol"];
    $Divipol->idCiudad = $_POST["idciudadivipol"];
    $Divipol->nombre = $_POST["nombre"];
    $Divipol->referencia = $_POST["referencia"];
    $Divipol->comentario = $_POST["comentario"];
	$Divipol->Add();
    Core::alert("Correcto","Divipol insertada exitosamente","?view=divipol");
 }else{
    core::alert("Error","Ha ocurrido un error","?view=divipol");
 }
}
else{
    Core::alert("Error","Ha ocurrido un error de validacion","index.php?view=divipol");
}
