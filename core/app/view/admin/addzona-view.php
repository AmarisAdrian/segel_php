<?php
if(count($_POST)>0){
   if((!empty($_POST["idDivipolZona"])) && (!empty($_POST["numero"]))&& (!empty($_POST["codigo"]))&& (!empty($_POST["nombre"]))) {
    $zona = new ZonaVotacionData();
    $zona->idDivipol = $_POST["idDivipolZona"];
    $zona->numero = $_POST["numero"];
    $zona->codigo = $_POST["codigo"];
    $zona->nombre = $_POST["nombre"];
    $zona->Add();
    Core::alert("Correcto","Zona de votación insertada exitosamente","?view=zona");
   }
   else{
    core::alert("Error","Ha ocurrido un error","?view=zona");
   }
}
else{
  Core::alert("Error","Ha ocurrido un error de validacion","index.php?view=zona");
}
