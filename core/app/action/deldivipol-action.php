<?php
  if(isset($_GET["id"])){
    $divipol = DivipolData::GetById($_GET["id"]);
          $divipol->Delete();
          Core::redir("./?view=divipol");
    }
?>
