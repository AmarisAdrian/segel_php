<?php
if(count($_POST)>0){
  if((!empty($_POST["idVotante"])) && (!empty($_POST["idZonaPuesto"])) && (!empty($_POST["idMesa"])) && (!empty($_POST["comentario"]))) {
    $Puesto = PuestoVotacionData::GetById($_POST["idZonaPuesto"]);
    if($Puesto->mesa >= ($_POST["idMesa"]) && ($_POST["idMesa"]) > 0){
        $Registro_Votante = new RegistroVotanteData();
        $Registro_Votante->idVotante = $_POST["idVotante"];
        $Registro_Votante->idPuesto = $_POST["idZonaPuesto"];
        $Registro_Votante->mesa = $_POST["idMesa"];
        $Registro_Votante->comentario = $_POST["comentario"];
        $Registro_Votante->Add();
        Core::alert("Correcto","Puesto de votación insertado exitosamente","?view=votante");
    }else{
        core::alert("Error","La mesa que se asignó no está disponible","?view=votante");
    }
  }else{ 
    core::alert("Error","Ha ocurrido un error","?view=votante");
  } 
}else{
  Core::alert("Error","Ha ocurrido un error de validacion","index.php?view=votante");
}
?>