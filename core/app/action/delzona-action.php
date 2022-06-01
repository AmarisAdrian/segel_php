<?php
  if(isset($_GET["id"])){
    $zona = ZonaVotacionData::GetById($_GET["id"]);
          $zona->Delete();
          Core::redir("./?view=zona");
    }
?>
