<?php 
 if((!empty($_POST["usuario"]))&&(!empty($_POST["password"]))){
   if((isset($_POST["usuario"]))&&(isset($_POST["password"]))){
     if((is_numeric($_POST["usuario"])) && (ctype_alnum($_POST["password"]))){
          $Sw = UsuarioData::GetUserLogin($_POST["usuario"],$_POST["password"]);
          if($Sw!=null){
            SESSION_START();
            $_SESSION['tiempo'] = time();
            $_SESSION['noDocumento'] = $Sw->noDocumento;
            $_SESSION['idTipoUsuario'] = $Sw->idTipoUsuario;
            if($Sw->idTipoUsuario==1)
            {
              Core::redir("./admin/?view=home"); 
            }
            else if($Sw->idTipoUsuario==2)
            {
              Core::redir("./manager/?view=home");  
            }
            else if($Sw->idTipoUsuario==3)
            {
              Core::redir("./lider/?view=home"); 
            }       
            echo json_encode(true);
            return true;          
          }else if($Sw==false){ 
              return false;                        
              echo json_encode(false);       
          }
          else{ 
            return false;                        
            echo json_encode(false);            
          }
     }else{     
      return false;
        echo json_encode(false);        
    }
   }else{ 
    return false;
    echo json_encode(false);         
   }
}else{
  return false;
  echo json_encode(false);        
}   
?>