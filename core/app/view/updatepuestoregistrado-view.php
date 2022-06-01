<?php
if(count($_POST)>0){
   if((!empty($_POST["idVotante"])) && (!empty($_POST["idPuesto"])) && (!empty($_POST["idMesa"])) && (!empty($_POST["comentario"]))){
    $Registro_Votante = RegistroVotanteData::GetById($_POST["id"]);
    $Puesto = PuestoVotacionData::GetById($_POST["idPuesto"]);
    if($Puesto->mesa >= ($_POST["idMesa"]) && ($_POST["idMesa"]) > 0){
      $Registro_Votante->idVotante = $_POST["idVotante"];
      $Registro_Votante->idPuesto = $_POST["idPuesto"];
      $Registro_Votante->mesa = $_POST["idMesa"];
      $Registro_Votante->comentario = $_POST["comentario"];
      $Registro_Votante->Update();
      Core::alert("Correcto","Inscripcion editada exitosamente","?view=inscripcion");
    }else{
      core::alert("Error","La mesa que se asignó no está disponible","?view=inscripcion");
     }
   }else{
    core::alert("Error","Ha ocurrido un error","?view=inscripcion");
   }
}else{
  Core::alert("Error","Ha ocurrido un error de validacion","?view=inscripcion");
} ?>