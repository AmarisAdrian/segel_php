<?php 
if(isset($_SESSION)){
    session_destroy();
    Core::redir("./?view=home");
}

?>