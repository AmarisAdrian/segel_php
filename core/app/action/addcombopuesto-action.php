<?php 
if(!empty($_GET["id"])){ 
  $Puesto = PuestoVotacionData::GetPuestoById($_GET["id"]);
?>
<select class=" form-control" name="idZonaPuesto" id="idZonaPuesto" required="true">
    <option value="">Seleccione una opcion </option>
    <?php foreach($Puesto as $Puesto) { ?>
    <option value="<?php echo $Puesto->id;?> ">
        <?php echo $Puesto->nombre; ?>
    </option>
    <?php } ?>
</select>
<?php } else { ?>
<div class="alert alert-danger">
    <span>
        <b>Error de base de datos.Hay datos vacios</b>
    </span>
</div>
<?php } ?>