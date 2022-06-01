<?php 
 if(!empty($_GET["id"])){ 
    $Mensaje = MensajeData::GetById($_GET["id"]);
    $Mensaje->UpdateEstadoById();
    ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="inputName" class="control-label">asunto</label>
            <input type="text" name="asunto" value="<?php echo $Mensaje->asunto;?>" class="form-control"
                id="asunto" disabled />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="inputName" class="control-label">Enviado por: </label>
            <?php $UsuarioEm = UsuarioData::GetById($Mensaje->idUsuarioEm);?>
            <input type="text" name="emisor" value="<?php echo $UsuarioEm->nombre.' '.$UsuarioEm->apellido;?>" class="form-control" id="emisor"
                disabled />
        </div>
    </div>
</div>
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Enviado a : </label>
                <?php $UsuarioRec = UsuarioData::GetById($Mensaje->idUsuarioRec);?>
                <input type="text" name="receptor" value="<?php echo $UsuarioRec->nombre.' '.$UsuarioRec->apellido;?>" class="form-control" id="receptor"
                    disabled />
            </div>
        </div>
        <br />
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Fecha</label>
                <input type="text" name="fecha" value="<?php echo $Mensaje->fecha; ?> " class="form-control" id="fecha"
                    disabled />
            </div>
        </div>
    </div>
<br />
<div class="form-group">
    <label for="inputName" class="control-label">Mensaje</label>
        <textarea class="form-control" name="mensaje" id="mensaje" rows="5" cols="5"
            disabled><?php echo $Mensaje->mensaje;?></textarea>
</div>
 <?php }else{ ?>
<div class="alert alert-danger">
    <span>
        <b>No se ha recibido los parametros correctamente</b>
    </span>
</div>
<?php  } ?>