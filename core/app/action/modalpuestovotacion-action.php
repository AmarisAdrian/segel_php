<?php 
if(!empty($_GET['id']) && !empty($_GET['nombre'])){
    $Puesto = PuestoVotacionData::GetById($_GET['id']);
    $Zona = ZonaVotacionData::GetAll();
    $Departamento = DepartamentoData::GetAll();
    ?>
<form class="form-horizontal" method="POST" id="editpuesto" action="?view=updatepuestovotacion" role="form">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputName" class="control-label">Id *</label>
                <input type="text" name="id" value="<?php echo $Puesto->id;?>" class="form-control" id="id"
                    placeholder="Id" readonly="true" />
            </div>
            <div class="form-group">
                <label class="control-label">Departamento</label>
                <select class="form-control" name="idDepartamentoModalPuesto" id="idDepartamentoModalPuesto">
                    <option value="">Selecione una opcion</option>
                    <?php 
                                                          foreach($Departamento as $Departamento)
                                                          { 
                                                            ?>
                    <option value="<?php echo $Departamento->id;?> ">
                        <?php echo $Departamento->nombre; ?>
                    </option>
                    <?php 
                                                          }  
                                                        ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Ciudad</label>
                <select class="form-control" name="idCiudadModalPuesto" id="idCiudadModalPuesto">
                    <option value="">Selecione una opcion</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Zona *</label>
                <select class=" form-control" name="idZona" id="idZona" requerid>
                    <?php 
                                $ZonaP = ZonaVotacionData::GetById($Puesto->idZona); ?>
                    <option value="<?php echo $ZonaP->id;?> "><?php echo $ZonaP->nombre; ?> </option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputName" class="control-label">Código *</label>
                <input type="text" name="codigo" value="<?php echo $Puesto->codigo;?>" class="form-control" id="codigo"
                    placeholder="Codigo" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputName" class="control-label">Nombre *</label>
                <input type="text" name="nombre" value="<?php echo $Puesto->nombre;?>" class="form-control" id="nombre"
                    placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="inputName" class="control-label">Dirección *</label>
                <input type="text" name="direccion" value="<?php echo $Puesto->direccion;?>" class="form-control"
                    id="direccion" placeholder="Dirección" required>
            </div>
            <div class="form-group">
                <label for="inputName" class="control-label">Mesa *</label>
                    <input type="number" name="mesa" value="<?php echo $Puesto->mesa;?>" class="form-control" id="mesa"
                        placeholder="Mesa" required>
            </div>
            <div class="form-group">
                <label for="inputName" class="control-label">Potencial *</label>
                <input type="number" name="potencial" value="<?php echo $Puesto->potencial;?>" class="form-control"
                    id="potencial" placeholder="Potencial" required>
            </div>
        </div>
    </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>

</form>
<?php }else{ ?>
<div class="alert alert-danger">
    <span>
        <b>Error al consultar el puesto de votación</b>
    </span>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</div>
<?php  } ?>