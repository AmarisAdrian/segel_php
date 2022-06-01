<?php
if(count($_POST)>0){
  if((!empty($_POST["divipol"])) && (!empty($_POST["numero"])) && (!empty($_POST["codigo"]))&& (!empty($_POST["nombre"]))) {   
    $zona = ZonaVotacionData::GetById($_POST["id"]);  
    $zona->idDivipol = $_POST["divipol"];
    $zona->numero = $_POST["numero"];
    $zona->codigo = $_POST["codigo"];
    $zona->nombre = $_POST["nombre"];
    $zona->Update();
    Core::alert("Correcto","Zona de votación actualizada exitosamente","?view=zona");
   }
   else{
    core::alert("Error","Ha ocurrido un error","?view=zona");
   }
}
else{
  Core::alert("Error","Ha ocurrido un error de validacion","?view=zona");
}
