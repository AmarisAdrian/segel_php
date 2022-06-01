<?php
if(!empty($_GET['id'])){
    $Anexo_Usuario= AnexoUsuarioData::GetById($_GET['id']);
    ?>
    <div class="text-center">​
        <picture>
            <img class="img-fluid rounded mx-auto d-block" width="350px" height="350px" src="data:image/jpg; base64,<?php echo $Anexo_Usuario->imagen; ?>" >
        </picture>
    </div>   
<?php } ?>