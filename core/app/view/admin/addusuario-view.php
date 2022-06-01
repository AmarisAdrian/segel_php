<?php
if(count($_POST)>0){
    if(!empty($_POST["idTipoDocumento"])&&!empty($_POST["idTipoUsuario"])&&!empty($_POST["idEstadoUsuario"])&&!empty($_POST["noDocumento"])&&!empty($_POST["nombre"])&&!empty($_POST["apellido"])&&!empty($_POST["idVotante"])&&!empty($_POST["idGenero"])
    &&!empty($_POST["telefono"])&&!empty($_POST["movil"])&&!empty($_POST["email"])&&!empty($_POST["direccion"])&&!empty($_POST["idDepartamentoPerfil"])&&!empty($_POST["idCiudadPerfil"])){
        $Usuario = new UsuarioData();
        $Usuario->idTipoDocumento = $_POST["idTipoDocumento"];
        $Usuario->idTipoUsuario = $_POST["idTipoUsuario"];
        $Usuario->idEstadoUsuario = $_POST["idEstadoUsuario"];
        $Usuario->noDocumento = $_POST["noDocumento"];
        $Usuario->nombre = $_POST["nombre"];
        $Usuario->apellido = $_POST["apellido"];
        $Usuario->password = $_POST["idVotante"];
        $Usuario->idGenero = $_POST["idGenero"];
        $Usuario->telefono = $_POST["telefono"];
        $Usuario->movil = $_POST["movil"];
        $Usuario->email = $_POST["email"];
        $Usuario->direccion = $_POST["direccion"];
        $Usuario->idDepartamento = $_POST["idDepartamentoPerfil"];
        $Usuario->idCiudad = $_POST["idCiudadPerfil"];
        $Usuario->Add();
        Core::alert("Correcto","Usuario insertada exitosamente","?view=usuario");
    }else{
       core::alert("Error","Ha ocurrido un error","?view=usuario");
    }
} else{
    Core::alert("Error","Ha ocurrido un error de validacion","index.php?view=usuario");
}
?>