<?php
if(!empty($_GET['id'])){
     $Votante = SpData::GetPuestoVotante($_GET['id']);

    if($Votante){
?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="inputName" class="control-label">Departamento</label>
            <input type="text" name="idDepartamento" value="<?php echo $Votante->departamento;?>" class="form-control"
                id="idDepartamento" disabled />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="inputName" class="control-label">Ciudad</label>
            <input type="text" name="idCiudad" value="<?php echo $Votante->ciudad;?>" class="form-control" id="idCiudad"
                disabled />
        </div>
    </div>
</div>
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Divipol</label>
                <input type="text" name="idDivipol" value="<?php echo $Votante->divipol;?>" class="form-control" id="idDivipol"
                    disabled />
            </div>
        </div>
        <br />
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Zona</label>
                <input type="text" name="idZona" value="<?php echo $Votante->zona; ?> " class="form-control" id="idZona"
                    disabled />
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Puesto</label>
            <input type="text" name="idPuesto" value="<?php echo $Votante->puesto;?>" class="form-control" id="idPuesto"
                disabled />
        </div>
    </div>
    <br />
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Mesa</label>
            <input type="text" name="idMesa" value="<?php echo $Votante->mesa; ?> " class="form-control" id="idMesa"
                disabled />
        </div>
    </div>
</div>
<br />
<div class="form-group">
    <label for="inputName" class="control-label">Comentarios</label>
        <textarea class="form-control" name="comentario" id="comentario" rows="5" cols="5"
            disabled><?php echo $Votante->comentario;?></textarea>
</div>
<?php }else{ ?>
<div class="alert alert-danger">
    <span>
        <b>No se encuentran registros relacionados con el lugar de votacion</b>
    </span>
</div>
<?php  } }else{ ?>
<div class="alert alert-danger">
    <span>
        <b>No ha digitado el numero de documento</b>
    </span>
</div>
<?php  } ?>