<?php
if (!empty($_GET['id'])) {
    $Votante = VotanteData::GetById($_GET["id"]);
    $Divipol = DivipolData::GetAll();
?>
    <form class="form-horizontal" method="POST" id="asignarpuesto" action="?view=addregistrovotante" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputName" class="col-lg-8 control-label">No Documento *</label>
                    <div class="col-md-12">
                        <input type="text" name="noDocumento" value="<?php echo $Votante->noDocumento; ?>" class="form-control" id="noDocumento" placeholder="no Documento" readonly="true" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-8 control-label">Nombre *</label>
                    <div class="col-md-12">
                        <input type="text" name="nombre" value="<?php echo $Votante->nombre; ?>" class="form-control" id="nombre" placeholder="Nombre" readonly="true" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-8 control-label">Divipol *</label>
                    <div class="col-md-12 ">
                        <select class=" form-control" name="idDivipolAsignar" id="idDivipolAsignar" required="true">          
                            <option value="">Seleccione una opcion </option>
                                <?php foreach ($Divipol as $Divipol) { ?>
                            <option value="<?php echo $Divipol->id; ?> ">
                                <?php echo $Divipol->nombre; ?>
                            </option>
                                <?php } ?>
                        </select>
                     </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-8 control-label">Zona *</label>
                    <div class="col-md-12">
                        <select class=" form-control" name="idZonaAsignar" id="idZonaAsignar" required="true">
                    </div>
                    <option value="">Seleccione una opcion </option>
                    </select>
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class=" col-lg-8 control-label">Puesto *</label>
                    <div class="col-md-12">
                        <select class=" form-control" name="idZonaPuesto" id="idZonaPuesto" required="true">
                    </div>
                    <option value="">Seleccione una opcion </option>
                    </select>
                </div>
                <br />
                <div class="form-group">
                    <label class=" col-lg-8 control-label">Mesa *</label>
                    <div class="col-md-12">
                        <select class=" form-control" name="idMesa" id="idMesa" required="true">
                    </div>
                    <option value="">Seleccione una opcion </option>
                    </select>
                </div>
                <br />
                <div class="form-group">
                    <label for="inputName" class="col-lg-8 control-label">Comentarios *</label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="comentario" id="comentario" rows="10" cols="60" Placeholder="Escribe aquí tus comentarios" required></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <input type="hidden" id="idVotante" name="idVotante" value="<?php echo $Votante->id; ?>">
            <button type="button" class="bg-danger btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
<?php } else { ?>
    <div class="alert alert-danger">
        <span>
            <b>Error al asignar puesto a votante</b>
        </span>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
<?php  } ?>