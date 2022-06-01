<?php
if (!empty($_GET['id'])) {
    $Registro = RegistroVotanteData::GetById($_GET["id"]);
    $Votante = VotanteData::GetById($Registro->idVotante);
    $Puesto = PuestoVotacionData::GetAll();
    $Departamento = DepartamentoData::GetAll();
?>
    <form class="form-horizontal" method="POST" id="editpuesto" action="?view=updatepuestoregistrado" role="form">
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
            <label for="inputforid" class="col-lg-8 control-label">Id *</label>
            <div class="col-md-12">
                <input type="text" name="id" value="<?php echo $Registro->id; ?>" class="form-control" id="id" placeholder="Id" readonly="true" />
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-lg-8">No Documento *</label>
            <div class="col-md-12">
                <input type="text" name="noDocumento" value="<?php echo $Votante->noDocumento; ?>" class="form-control" id="noDocumento" placeholder="no Documento" readonly="true" />
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-lg-8 control-label">Nombres *</label>
            <div class="col-md-12">
                <input type="text" name="nombre" value="<?php echo $Votante->nombre; ?>" class="form-control" id="nombre" placeholder="Nombre" readonly="true" />
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-lg-8 control-label">Apellidos *</label>
            <div class="col-md-12">
                <input type="text" name="apellido" value="<?php echo $Votante->apellido; ?>" class="form-control" id="apellido" placeholder="Apellidos" readonly="true" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-8 control-label">Departamento*</label>
            <div class="col-md-12">
                <select class="form-control" name="idDepartamentoInscripcion" id="idDepartamentoInscripcion" required>
                    <option value="">Selecione una opcion</option>
                    <?php
                    foreach ($Departamento as $Departamento) {
                    ?>
                        <option value="<?php echo $Departamento->id; ?> ">
                            <?php echo $Departamento->nombre; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label class="col-lg-8 control-label">Ciudad *</label>
            <div class="col-md-12">
                <select class="form-control" name="idCiudadInscripcion" id="idCiudadInscripcion">
                    <option value="">Selecione una opcion</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-8 control-label">Zona*</label>
            <div class="col-md-12">
                <select class="form-control" name="idZonainscripcion" id="idZonainscripcion" required>
                    <option value="">Selecione una opcion</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class=" col-lg-8 control-label">Puesto *</label>
            <div class="col-md-12 ">
                <select class=" form-control" name="idPuesto" id="idPuesto" required="true">
            </div><?php
                    $idPuesto = $Registro->idPuesto;
                    $nombrePuesto = PuestoVotacionData::GetById($idPuesto); ?>
            <option value="<?php echo $Registro->idPuesto; ?> "><?php echo $nombrePuesto->nombre; ?> </option>
            <?php foreach ($Puesto as $Puesto) { ?>
                <option value="<?php echo $Puesto->id; ?> ">
                    <?php echo $Puesto->nombre; ?>
                </option>
            <?php } ?>
            </select>
        </div>
        <br />
        <div class="form-group">
            <label class=" col-lg-8 control-label">Mesa *</label>
            <div class="col-md-12 ">
                <select class=" form-control" name="idMesa" id="idMesa" required="true">
            </div>
            <option value="<?php echo $Registro->mesa; ?> "><?php echo $Registro->mesa; ?> </option>
            </select>
        </div>
        <br />
        <div class="form-group">
            <label for="inputName" class="col-lg-8 control-label">Comentarios *</label>
            <div class="col-md-12">
                <textarea class="form-control" name="comentario" id="comentario" rows="10" cols="60" Placeholder="Escribe aquí tus comentarios" required><?php echo $Registro->comentario; ?></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
            <button type="button" class="bg-danger btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="hidden" id="idVotante" name="idVotante" value="<?php echo $Votante->id; ?>">
        </div>
         </div>
            </div>
    </form>
<?php } else { ?>
    <div class="alert alert-danger">
        <span>
            <b>Error al consultar esta inscripción</b>
        </span>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
<?php  } ?>