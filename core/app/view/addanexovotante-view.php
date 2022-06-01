<?php
if(count($_POST)>0){
  if((!empty($_POST["idVotante"])) && (!empty($_POST["comentario"]))) {
    $Anexo_Votante = new AnexoVotanteData();
    $Anexo_Votante->idVotante = $_POST["idVotante"];
    $nombre = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];
    $folder = './content/img/anexos';
    move_uploaded_file($tmp , $folder.'/'.$nombre );
    $imagen = base64_encode(file_get_contents( $folder.'/'.$nombre));
    $Anexo_Votante->imagen = $imagen;
    $Anexo_Votante->comentario = $_POST["comentario"];
    $Anexo_Votante->Add();
    Core::alert("Correcto","Anexo insertado exitosamente","?view=votante");
  }else{
    core::alert("Error","Ha ocurrido un error","?view=votante");
  }
}
else{
  Core::alert("Error","Ha ocurrido un error de validacion","index.php?view=votante");
}
?>


