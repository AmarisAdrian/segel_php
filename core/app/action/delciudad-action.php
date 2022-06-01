<?php
  if(isset($_GET["id"])){
          $ciudad = CiudadData::GetById($_GET["id"]);
          $ciudad->Delete();
          Core::redir("./?view=ciudad");
    }
?>