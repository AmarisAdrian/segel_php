<?php
if(count($_POST)>0){
  if((!empty($_POST["idUsuario"])) && (!empty($_POST["comentario"]))) {
    $Anexo_usuario = new AnexoUsuarioData();
    $Anexo_usuario->idVotante = $_POST["idUsuario"];
    $nombre = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];
    $folder = './content/img/anexos';
    move_uploaded_file($tmp , $folder.'/'.$nombre );
    $imagen = base64_encode(file_get_contents( $folder.'/'.$nombre));
    $Anexo_usuario->imagen = $imagen;
    $Anexo_usuario->comentario = $_POST["comentario"];
    $Anexo_usuario->Add();
    Core::alert("Correcto","Anexo insertado exitosamente","?view=usuario");
  }else{
    core::alert("Error","Ha ocurrido un error","?view=usuario");
  }
}
else{
  Core::alert("Error","Ha ocurrido un error de validacion","index.php?view=usuario");
}
?>


