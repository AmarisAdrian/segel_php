<?php
if(count($_POST)>0){
   if((!empty($_POST["idZonaPuesto"])) && (!empty($_POST["codigo"]))&& (!empty($_POST["nombre"]))&& (!empty($_POST["direccion"])) && (!empty($_POST["mesas"])) && (!empty($_POST["potencial"]))) {
    $Puesto = new PuestoVotacionData();
    $Puesto->idZona = $_POST["idZonaPuesto"];
    $Puesto->codigo = $_POST["codigo"];
    $Puesto->nombre = $_POST["nombre"];
    $Puesto->direccion = $_POST["direccion"];
    $Puesto->mesa = $_POST["mesas"];
    $Puesto->potencial = $_POST["potencial"];
    $Puesto->Add();
    Core::alert("Correcto","Puesto de votación insertado exitosamente","?view=puestovotacion");
   }
   else{
    core::alert("Error","Ha ocurrido un error","?view=puestovotacion");
   }
}
else{
  Core::alert("Error","Ha ocurrido un error de validacion","index.php?view=puestovotacion");
}
