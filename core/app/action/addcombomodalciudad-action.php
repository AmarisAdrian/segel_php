<?php 
if(!empty($_GET["id"])){ 
  $Ciudad = CiudadData::GetCiudadById($_GET["id"]);
?>     
             <select class="form-control" name="idModalCiudad" id="idModalCiudad">         
              <option value="">Seleccione una opcion</option>        
              <?php 
                foreach($Ciudad as $Ciudad)
                { 
                  ?>                         
                <option value="<?php echo $Ciudad->id;?> "> <?php echo $Ciudad->nombre; ?></option>  
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