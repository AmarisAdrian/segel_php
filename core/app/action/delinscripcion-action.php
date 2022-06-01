<?php
  if(isset($_GET["id"])){
     $Reg = RegistroVotanteData::GetById($_GET["id"]);
        $Reg->Delete();
     Core::redir("./?view=inscripcion");
    }
?>
