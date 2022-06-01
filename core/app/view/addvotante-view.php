<?php
if(count($_POST)>0){
    if((!empty($_POST["idTipoDocumento"])) && (!empty($_POST["idEstadoUsuario"])) && (!empty($_POST["idUsuario"])) && (!empty($_POST["noDocumento"])) && (!empty($_POST["idDepartamentoVotante"])) && (!empty($_POST["idCiudadVotante"])) ) {
    $Votante = new VotanteData();
    $Votante->idTipoDocumento = $_POST["idTipoDocumento"];
    $Votante->idEstadoUsuario = $_POST["idEstadoUsuario"];
    $Votante->idUsuario = $_POST["idUsuario"];
    $Votante->noDocumento = $_POST["noDocumento"];
    $Votante->nombre = $_POST["nombre"];
    $Votante->apellido = $_POST["apellido"];
    $Votante->idGenero = $_POST["idGenero"];
    $Votante->movil = $_POST["movil"];
    $Votante->fijo = $_POST["fijo"];
    $Votante->direccion = $_POST["direccion"];
    $Votante->idDepartamento = $_POST["idDepartamentoVotante"];
    $Votante->idCiudad = $_POST["idCiudadVotante"];
    $Votante->firma = $_POST["firma"];
    $Votante->Add();
    Core::alert("Correcto","Votante insertado exitosamente","?view=votante");
  }else{
    core::alert("Error","Ha ocurrido un error","?view=votante");
  }
}
else{
  Core::alert("Error","Ha ocurrido un error de validacion","?view=votante");
}
