<?php
     if(!empty($_GET["id"])){
        $Votante = VotanteData::GetByNoDoc($_GET["id"]);
        $EstadoUsuario = EstadoUsuarioData::GetAll();
        $Usuario = UsuarioData::GetAll();
        $TipoDocumento = TipoDocumentoData::GetAll();
        $Genero = GeneroData::GetAll();
        $Departamento = DepartamentoData::GetAll();
        $Ciudad = CiudadData::GetAll();
        if($Votante){
     ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputName" class="col-lg-3 control-label">Id </label>
                    <div class="col-md-12">
                        <input type="text" name="id" value="<?php echo $Votante->id;?>" class="form-control" id="id" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label">Funcionario </label>
                    <div class="col-md-12 ">
                    <?php 
                            $nombreUsuario = UsuarioData::GetById($Votante->idUsuario); ?> 
                    <input type="text" name="idUsuario" value="<?php echo $nombreUsuario->nombre.' '.$nombreUsuario->apellido;?>" class="form-control" id="idUsuario" disabled>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label">Estado usuario</label>
                    <div class="col-md-12 ">
                        <?php 
                            $nombreEstadoUsuario = EstadoUsuarioData::GetById($Votante->idEstadoUsuario); ?>
                          <input type="text" name="idEstadoUsuario" value="<?php echo $nombreEstadoUsuario->nombre;?>" class="form-control" id="idEstadoUsuario" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-8  control-label">Tipo de Documento </label>
                    <div class="col-md-12 ">
                    <?php 
                       $nombreTipoDocumento = TipoDocumentoData::GetById($Votante->idTipoDocumento); ?>
                    <input type="text" name="idTipoDocumento" value="<?php echo $nombreTipoDocumento->nombre;?>" class="form-control" id="idTipoDocumento" disabled>                                                    
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-5">No Documento </label>
                    <div class="col-md-12">
                        <input type="number" name="noDocumento" value="<?php echo $Votante->noDocumento;?>" class="form-control"
                        id="noDocumento" disabled>    
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-5">Nombres </label>
                    <div class="col-md-12">
                        <input type="text" name="nombre" value="<?php echo $Votante->nombre;?>" class="form-control"
                        id="nombre" disabled>   
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-5">Apellidos </label>
                    <div class="col-md-12">
                        <input type="text" name="apellido" value="<?php echo $Votante->apellido;?>" class="form-control"
                        id="apellido" disabled>    
                    </div>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-5 control-label">Genero </label>
                    <div class="col-md-12 ">
                    <?php 
                        $nombreGenero=GeneroData::GetById($Votante->idGenero); ?>
                        <input type="text" name="idGenero" value="<?php echo $nombreGenero->nombre; ?>" class="form-control"id="idGenero" disabled>  

                </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-5">Teléfono Movil </label>
                    <div class="col-md-12">
                        <input type="number" name="movil" value="<?php echo $Votante->movil;?>" class="form-control"
                        id="movil" disabled>    
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-5">Teléfono Fijo </label>
                    <div class="col-md-12">
                        <input type="number" name="fijo" value="<?php echo $Votante->fijo;?>" class="form-control"
                        id="fijo" disabled>    
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-5">Direccion </label>
                    <div class="col-md-12">
                        <input type="text" name="direccion" value="<?php echo $Votante->direccion;?>" class="form-control"
                        id="direccion" disabled>   
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Departamento </label>
                    <div class="col-md-12 ">
                    <?php 
                        $nombreDepartamento = DepartamentoData::GetById($Votante->idDepartamento); ?>
                        <input type="text" name="idModalDepartamento" value="<?php echo $nombreDepartamento->nombre; ?> " class="form-control"
                        id="idModalDepartamento" disabled>                       
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Ciudad</label>
                    <div class="col-md-12 ">
                         <?php 
                         $nombreCiudad = CiudadData::GetById($Votante->idCiudad); ?>
                        <input type="text" name="idModalCiudad" value="<?php echo $nombreCiudad->nombre; ?> " class="form-control"
                        id="idModalCiudad" disabled>   
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-3">Firma </label>
                    <div class="col-md-12">
                        <input type="text" name="firma" value="<?php echo $Votante->firma;?>" class="form-control"
                        id="firma" disabled>    
                    </div>
                </div>
            </div>                   
        </div>
      
<?php }else{ ?>
    <div class="alert alert-danger">
        <span>
            <b>El votante consultado no existe!</b>
        </span>
    </div>
<?php  } ?>  
<?php }else{ ?>
    <div class="alert alert-danger">
        <span>
            <b>No ha digitado el numero de documento</b>
        </span>
    </div>
<?php  } ?>
