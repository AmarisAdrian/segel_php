<?php
  if(isset($_GET["id"])){
     $Reg = MensajeData::GetById($_GET["id"]);
        $Reg->Delete();
     Core::redir("./?view=mensaje");
    }
?>
