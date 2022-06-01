
<?php
  if(isset($_GET["id"])){
    $votante = VotanteData::GetById($_GET["id"]);
          $votante->Delete();
          Core::redir("./?view=votante");
    }
?>
