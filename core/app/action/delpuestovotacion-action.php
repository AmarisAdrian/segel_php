<?php
  if(isset($_GET["id"])){
    $puesto = PuestoVotacionData::GetById($_GET["id"]);
          $puesto->Delete();
          Core::redir("./?view=puestovotacion");
    }
?>
