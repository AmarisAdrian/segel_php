<?php 
if(!empty($_GET['id'])){
    $Divipol = DivipolData::GetById($_GET['id']);
    $Departamento = DepartamentoData::GetAll();
    $Ciudad = CiudadData::GetAll();
    ?>
    <form class="form-horizontal" method="POST" id="editdivipol" action="?view=updatedivipol" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputName" class="col-lg-8 control-label">Id *</label>
                    <div class="col-md-12">
                        <input type="text" name="id" value="<?php echo $Divipol->id;?>" class="form-control" id="id"
                        placeholder="Id" readonly="true">
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-8 control-label">Departamento *</label>
                    <div class="col-md-12 ">
                        <select class=" form-control" name="idDepartamentoDivipol" id="idDepartamentoDivipol" required="true">
                    
                            <?php 
                                $idDepartamento= $Divipol->idDepartamento;
                                $nombreDepartamento = DepartamentoData::GetById($idDepartamento); ?>
                                <option value="<?php echo $Divipol->idDepartamento;?> "><?php echo $nombreDepartamento->nombre; ?> </option>                              
                                <?php foreach($Departamento as $Departamento)
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
                </div> 
                <div class="form-group">
                    <label class=" col-lg-8 control-label">Ciudad *</label>
                    <div class="col-md-12 ">
                        <select class=" form-control" name="idCiudadDivipol" id="idCiudadDivipol" required="true">
                
                            <?php 
                                $idCiudad= $Divipol->idCiudad;
                                $nombreCiudad = CiudadData::GetById($idCiudad); ?>
                                <option value="<?php echo $Divipol->idCiudad;?> "><?php echo $nombreCiudad->nombre; ?> </option>                              
                                <?php foreach($Ciudad as $Ciudad)
                                    { 
                                    ?> 
                                        <option value="<?php echo $Ciudad->id;?> ">
                                            <?php echo $Ciudad->nombre; ?>   
                                        </option>
                                    <?php 
                                    }  
                                    ?>
                        </select>
                 </div> 
                 </div>
                 </div>
            <div class="col-md-6"> 
                <div class="form-group">
                    <label for="inputName" class="col-lg-8 control-label">Nombre *</label>
                    <div class="col-md-12">
                        <input type="text" name="nombre" value="<?php echo $Divipol->nombre;?>" class="form-control" id="nombre"
                        placeholder="Nombre">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-8 control-label">Referencia *</label>
                    <div class="col-md-12">
                        <input type="number" name="referencia" value="<?php echo $Divipol->referencia;?>" class="form-control" id="referencia"
                        placeholder="Referencia" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label">Comentario *</label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="comentario" id="comentario" rows="5" cols="10"
                            Placeholder="Escribe aquí tus comentarios" required><?php echo $Divipol->comentario;?></textarea>
                    </div>
                </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
            <button type="button" class="bg-danger btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
<?php }else{ ?>
    <div class="alert alert-danger">
        <span>
            <b>Error al consultar divipol</b>
        </span>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
<?php  } ?>
