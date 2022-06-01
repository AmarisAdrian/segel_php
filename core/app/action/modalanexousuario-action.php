<?php 
if(!empty($_GET["id"]) && is_numeric($_GET["id"])){
        $Usuario = UsuarioData::GetByDocumento($_GET["id"]);
        if($Usuario){
          $Anexo_usuario = AnexoUsuarioData::GetByIdUsuario($Usuario->id);                
            if($Anexo_usuario){ 
                ?>
                        <div class="card-body">
                            <div class="table-responsive">             
                                    <table id="tablaanexousuario" class="table table-bordered table-hover display">
                                        <thead>
                                            <tr> 
                                                <th>Id</th>
                                                <th>No Documento</th>
                                                <th>Imagen</th>
                                                <th>Comentario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        foreach($Anexo_usuario as $Anexo_usuario){					    
                                            ?>
                                            <tr>
                                                <td><?php echo $Anexo_usuario->id; ?></td>
                                                <td><?php echo $Anexo_usuario->noDocumento; ?></td>
                                                <td><a href="#" data-target="#modalanexo" data-toggle="modal" class="celda_anexo_usuario" title="Ver" data-placement="top" data-id="<?php echo $Anexo_usuario->id; ?>">Ver imagen</a></td>
                                                <td><?php echo $Anexo_usuario->comentario; ?></td>
                                            </tr>
                                        <?php }	?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
         <!--VENTANA MODAL DE ANEXOS-->
         <div id="modalanexo" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog-centered modal-lg modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php } else{ ?>
            <div class="alert alert-danger">
                <span>
                    <b>No hay anexos registrados con ese numero de documento</b>
                </span>
            </div>
        <?php }  ?>                         
<?php } else{ ?>
         <div class="alert alert-danger">
         <span>
             <b>la persona consultada no existe</b>
         </span>
     </div>  
<?php } }else { ?>
        <div class="alert alert-warning">
            <span>
                <b>No envió el número de documento</b>
            </span>
        </div>  
        <script type="text/javascript">
            Ocultar();
        </script>            
<?php }?> 
 