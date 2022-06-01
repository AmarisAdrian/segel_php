<?php
if(count($_POST)>0){
  if((!empty($_POST["idTipoDocumento"])) && (!empty($_POST["idEstadoUsuario"])) && (!empty($_POST["idUsuario"])) && (!empty($_POST["noDocumento"])) && (!empty($_POST["nombre"])) && (!empty($_POST["apellido"])) && (!empty($_POST["movil"])) && (!empty($_POST["fijo"])) && (!empty($_POST["direccion"])) && (!empty($_POST["idModalDepartamento"])) && (!empty($_POST["idModalCiudad"]))  && (!empty($_POST["apellido"]))) {
    $Votante = VotanteData::GetById($_POST["id"]);
    $Votante->idEstadoUsuario = $_POST["idEstadoUsuario"];
    $Votante->idUsuario = $_POST["idUsuario"];
    $Votante->idTipoDocumento = $_POST["idTipoDocumento"];
    $Votante->noDocumento = $_POST["noDocumento"];
    $Votante->nombre = $_POST["nombre"];
    $Votante->apellido = $_POST["apellido"];
    $Votante->idGenero = $_POST["idGenero"];
    $Votante->movil = $_POST["movil"];
    $Votante->fijo = $_POST["fijo"];
    $Votante->direccion = $_POST["direccion"];
    $Votante->idDepartamento = $_POST["idModalDepartamento"];
    $Votante->idCiudad = $_POST["idModalCiudad"];
    $Votante->firma = $_POST["firma"];
	  $Votante->Update();
    Core::alert("Correcto","Votante actualizado exitosamente","index.php?view=votante");
    }
    else{
      Core::alert("Error","Ha ocurrido un error","index.php?view=votante");
    }
  }
  else{
    Core::alert("Error","Ha ocurrido un error de validacion","index.php?view=votante");
  }