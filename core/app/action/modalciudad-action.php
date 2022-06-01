<?php
if (!empty($_GET["id"])) {
    $Ciudad = CiudadData::GetById($_GET["id"]);
    $Departamento = DepartamentoData::GetAll();
?>
    <form class="form-horizontal" method="POST" id="editciudad" action="?view=updateciudad" role="form">
        <div class="form-group">
            <label for="inputName" class="col-lg-3 control-label">Id *</label>
            <div class="col-md-8">
                <input type="text" name="id" value="<?php echo $Ciudad->id; ?>" class="form-control" id="id" placeholder="Id" readonly="true">
            </div>
        </div>
        <div class="form-group">
            <label class=" col-lg-3 control-label">Departamento *</label>
            <div class="col-md-8 ">
                <select class=" form-control" name="idDepartamento" id="idDepartamento" required="true">
            </div>
            <?php
            $idDepartamento = $Ciudad->idDepartamento;
            $nombreDepartamento = DepartamentoData::GetById($idDepartamento); ?>
            <option value="<?php echo $Ciudad->idDepartamento; ?> "><?php echo $nombreDepartamento->nombre; ?> </option>
            <?php foreach ($Departamento as $Departamento) {
            ?>
                <option value="<?php echo $Departamento->id; ?> ">
                    <?php echo $Departamento->nombre; ?>
                </option>
            <?php
            }
            ?>
            </select>
        </div>
        <br />
        <div class="form-group">
            <label for="inputName" class="col-lg-3 control-label">Nombre *</label>
            <div class="col-md-8">
                <input type="text" name="nombre" value="<?php echo $Ciudad->nombre; ?>" class="form-control" id="nombre" placeholder="Nombre" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
<?php } else { ?>
    <div class="alert alert-danger">
        <span>
            <b>Error al consultar ciudad seleccionada</b>
        </span>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
    </div>
<?php } ?>