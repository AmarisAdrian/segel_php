<?php
if(count($_POST)>0){
   if((!empty($_POST["idZona"])) && (!empty($_POST["codigo"])) && (!empty($_POST["nombre"])) && (!empty($_POST["direccion"])) && (!empty($_POST["mesa"])) && (!empty($_POST["potencial"]))){
    $Puesto = PuestoVotacionData::GetById($_POST["id"]);
    $Puesto->idZona = $_POST["idZona"];
    $Puesto->codigo = $_POST["codigo"];
    $Puesto->nombre = $_POST["nombre"];
    $Puesto->direccion = $_POST["direccion"];
    $Puesto->mesa = $_POST["mesa"];
    $Puesto->potencial = $_POST["potencial"];   
    $Puesto->Update();
   Core::alert("Correcto","Puesto de votación actualizado exitosamente","?view=puestovotacion");
   }
   else{
    core::alert("Error","Ha ocurrido un error","?view=puestovotacion");
   }
}
else{
  Core::alert("Error","Ha ocurrido un error de validacion","?view=puestovotacion");
} ?>