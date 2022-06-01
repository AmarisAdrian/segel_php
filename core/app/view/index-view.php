<?php
if(isset($_SESSION)){
    $Tipo_Usuario = $_SESSION["idTipoUsuario"];
    if($Tipo_Usuario==1)
    {
       Core::redir("admin/?view=home");
    }
    else if($Tipo_Usuario==2)
    {
         Core::redir("manager/?view=home");
    }
    else if($Tipo_Usuario==3)
    {
        Core::redir("lider/?view=home");
    }
}
?>