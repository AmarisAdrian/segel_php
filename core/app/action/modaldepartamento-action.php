<?php 
 if(!empty($_GET["id"])){ 
      $Departamento = DepartamentoData::GetById($_GET["id"]);
      ?>

<form class="form-horizontal" method="POST" id="editdepartamento" action="?view=updatedepartamento" role="form">
  <div class="form-group">
    <label for="inputName" class="col-lg-3 control-label">Id *</label>
    <div class="col-md-8">
      <input type="text" name="id" value="<?php echo $Departamento->id;?>" class="form-control" id="id"
        placeholder="Id" readonly="true">
    </div>
  </div>
  <div class="form-group">
    <label for="inputName" class="col-lg-3 control-label">Nombre *</label>
    <div class="col-md-8">
      <input type="text" name="nombre" value="<?php echo $Departamento->nombre;?>" class="form-control" id="nombre"
        placeholder="Nombre" required>
    </div>
  </div>
  <div class="modal-footer">                   
    <button type="submit" class="btn btn-primary">Editar</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
  </div>
</form>
<?php }else{ ?>
<div class="alert alert-danger">
  <span>
    <b>Error al consultar departamento seleccionado</b>
  </span>
</div>
  <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
    </div>
<?php } ?>
