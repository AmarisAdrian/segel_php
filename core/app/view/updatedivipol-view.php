<?php
if(count($_POST)>0){
if((!empty($_POST["idDepartamentoDivipol"])) && (!empty($_POST["idCiudadDivipol"]))&& (!empty($_POST["nombre"]))&& (!empty($_POST["referencia"]))) {
    $Divipol = DivipolData::GetById($_POST["id"]);
    $Divipol->idDepartamento = $_POST["idDepartamentoDivipol"];
    $Divipol->idCiudad = $_POST["idCiudadDivipol"];
    $Divipol->nombre = $_POST["nombre"];
    $Divipol->referencia = $_POST["referencia"];
    $Divipol->comentario = $_POST["comentario"];
	$Divipol->Update();
    Core::alert("Correcto","Divipol actualizada exitosamente","?view=divipol");
 }else{
    core::alert("Error","Ha ocurrido un error","?view=divipol");
 }
}
else{
    Core::alert("Error","Ha ocurrido un error de validacion","?view=divipol");
}

