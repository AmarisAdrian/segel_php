<?php
if(count($_POST)>0){
    if((!empty($_POST["idVotante"])) && (!empty($_POST["imagen"]))) {
      $Anexo_Votante = AnexoVotanteData::GetById($_POST["id"]);
      $Anexo_Votante->idVotante = $_POST["idVotante"];
      $Anexo_Votante->imagen = $_POST["imagen"];
      $Anexo_Votante->comentario = $_POST["comentario"];
      $Anexo_Votante->Update();
      Core::alert("Correcto","Anexo actualizado exitosamente","?view=votante");
    }else{
      core::alert("Error","Ha ocurrido un error","?view=votante");
    }
  }
  else{
    Core::alert("Error","Ha ocurrido un error de validacion","?view=votante");
  }
  ?>