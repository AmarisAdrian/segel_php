<?php
if (!empty($_GET['id'])) {
    $Zona = ZonaVotacionData::GetById($_GET['id']);
    $Departamento = DepartamentoData::GetAll();
?>
    <form class="form-horizontal" method="POST" id="editzona" action="?view=updatezona" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputName" class="control-label">Id *</label>
                    <input type="text" name="id" value="<?php echo $Zona->id; ?>" class="form-control" id="id" placeholder="Id" readonly="true" />
                </div>
                <div class="form-group">
                    <label class="control-label">Departamento</label>
                    <select class="form-control" name="idDepartamentoModalZona" id="idDepartamentoModalZona">
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
                <div class="form-group">
                    <label class="control-label">Ciudad </label>
                    <select class="form-control" name="idCiudadModalZona" id="idCiudadModalZona">
                        <option value="">Selecione una opcion</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Divipol *</label>
                    <select class=" form-control" name="divipol" id="divipol" required>
                        <?php
                        $Divipol = DivipolData::GetById($Zona->idDivipol);
                        ?>
                        <option value="<?php echo $Divipol->id ?> "><?php echo $Divipol->nombre; ?> </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputName" class=" control-label">Número *</label>
                        <input type="number" name="numero" value="<?php echo $Zona->numero; ?>" class="form-control" id="numero" placeholder="Numero">
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Código *</label>
                        <input type="text" name="codigo" value="<?php echo $Zona->codigo; ?>" class="form-control" id="codigo" placeholder="Codigo" requerid>
                </div>
                <div class="form-group">
                    <label for="inputName" class=" control-label">Nombre *</label>
                        <input type="text" name="nombre" value="<?php echo $Zona->nombre; ?>" class="form-control" id="nombre" placeholder="Nombre" requerid>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
            <input type="hidden" name="id" value="<?php echo $Zona->id; ?>" class="form-control" id="id">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        </div>

    </form>
<?php } else { ?>
    <div class="alert alert-danger">
        <span>
            <b>Error al consultar divipol</b>
        </span>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
<?php  } ?>