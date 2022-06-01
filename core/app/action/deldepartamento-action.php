<?php
  if(isset($_GET["id"])){
    $Departamento = DepartamentoData::GetById($_GET["id"]);
          $Departamento->Delete();
          Core::redir("./?view=departamento");
    }
?>