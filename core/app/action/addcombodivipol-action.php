<?php 
if(!empty($_GET["id"])){ 
    $Divipol  = DivipolData::GetCiudadById($_GET["id"]);
?>     
<select class="form-control" name="idDivipolZona" id="idDivipolZona" required>
    <option value="">Selecione una opcion</option>
    <?php 
        foreach($Divipol as $Divipol)
            { 
                ?>
    <option value="<?php echo $Divipol->id;?> ">
        <?php echo $Divipol->nombre; ?>
    </option>
    <?php 
             }  
        ?>
</select>
<?php } else { ?>
    <div class="alert alert-danger">
      <span>
          <b>Error de base de datos.Hay datos vacios</b>
      </span>                                                            
     </div>                                    
    <?php } ?>                  