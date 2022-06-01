<?php 
if(!empty($_GET["id"])){ 
 $Mesa = PuestoVotacionData::GetById($_GET["id"]);
 $Cont = $Mesa->mesa;
 echo $Cont;
?>     
<select class="form-control" name="idMesa" id="idMesa" required>
    <option value="">Selecione una opcion</option>
    <?php 
        for($i=1;$i<=$Cont;$i++)
            { 
                ?>
    <option value="<?php echo $i ?>">
        <?php echo $i; ?>
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