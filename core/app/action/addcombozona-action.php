<?php 
if(!empty($_GET["id"])){
 $Zona = ZonaVotacionData::GetDivipolById($_GET["id"]);
 ?>            
             <select class="form-control" name="idZona" id="idZona">    
              <option value="">Selecione una opcion</option>     
              <?php 
                foreach($Zona as $Zona)
                { 
                  ?>                         
                <option value="<?php echo $Zona->id; ?> "> 
                  <?php echo $Zona->nombre;                 
                  ?>                 
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