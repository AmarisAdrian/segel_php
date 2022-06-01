<?php
if(count($_POST)>0){
if((!empty($_POST["id"])) && (!empty($_POST["nombre"]) )&& (!empty($_POST["idDepartamento"]))) {
    $Ciudad = new CiudadData();
    $Ciudad->id = $_POST["id"];
    $Ciudad->nombre = $_POST["nombre"];
    $Ciudad->idDepartamento = $_POST["idDepartamento"];
	$Ciudad->Add();
    Core::alert("Correcto","Ciudad insertada exitosamente","?view=ciudad");
 }else{
    core::alert("Error","Ha ocurrido un error","?view=ciudad");
 }
}
else{
    Core::alert("Error","Ha ocurrido un error de validacion","index.php?view=ciudad");
}
