<?php
if(isset($_SESSION)){
 $NoDocumento =  $_SESSION['noDocumento']; 
 $Usuario = UsuarioData::GetByDocumento($NoDocumento);  
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Registro de sufragante</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Inscripciones</li>
                        <li class="breadcrumb-item active">Registro de sufragante</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                            <h3><i class="fa fa-address-card"></i> Datos personales</h3>
                        </div>
                    <div class="card-content">
                        <?php 
                        $TipoDocumento = TipoDocumentoData::GetAll();
                        $Estado = EstadoUsuarioData::GetAll();
                        $Genero = GeneroData::GetAll();
                        $Departamento = DepartamentoData::GetAll();
                        $Ciudad = CiudadData::GetAll();
                      if(($TipoDocumento)&& ($Estado) && ($Genero) && ($Departamento) && ($Ciudad) && ($Usuario)){
                     ?>
                     <div class="card-body">
                        <form class="form-horizontal" id="addvotante" action="?view=addvotante" method="POST" role="form"> 
                            <br />
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Tipo de documento *</label>
                                            <select class="form-control" name="idTipoDocumento" id="idTipoDocumento" required>
                                                <option value="">Selecione una opcion</option>
                                                <?php 
                                                  foreach($TipoDocumento as $TipoDocumento)
                                                  { 
                                                    ?>
                                                <option value="<?php echo $TipoDocumento->id;?> ">
                                                    <?php echo $TipoDocumento->nombre; ?>
                                                </option>
                                                <?php 
                                                  }  
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Estado usuario *</label>
                                                <select class="form-control" name="idEstadoUsuario" id="idEstadoUsuario" required>
                                                    <option value="">Selecione una opcion</option>
                                                    <?php 
                                                      foreach($Estado as $Estado)
                                                      { 
                                                        ?>
                                                    <option value="<?php echo $Estado->id;?> ">
                                                        <?php echo $Estado->nombre; ?>
                                                    </option>
                                                    <?php 
                                                      }  
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                    <label class="control-label">Funcionario</label>
                                                    <input class="form-control" value="<?php echo $Usuario->nombre.' '.$Usuario->apellido;?>" name="funcionario" id="funcionario" type="text"
                                                        placeholder="Numero de documento" readonly/>
                                                    <input class="form-control" value="<?php echo $Usuario->id?>" name="idUsuario" id="idUsuario" type="text" hidden />
                                                    </select>
                                                </div>
                                        </div>                                   
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                                    <label class="control-label">Numero de documento *</label>
                                                    <input class="form-control" name="noDocumento" id="noDocumento" type="number"
                                                        placeholder="Numero de documento" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                    <label class="control-label">Nombre *</label>
                                                    <input class="form-control" name="nombre" id="nombre" type="text"
                                                        placeholder="Nombres" required/>
                                                </div>                                      
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                    <label class="control-label">Apellidos *</label>
                                                    <input type="text" name="apellido" id="apellido" class="form-control" id="nombre"
                                                        placeholder="Apellidos" required />
                                                </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                    <label class="control-label">Genero *</label>
                                                    <select class="form-control" name="idGenero" id="idGenero" required>
                                                        <option value="">Selecione una opcion</option>
                                                        <?php 
                                                            foreach($Genero as $Genero)
                                                            { 
                                                            ?>
                                                        <option value="<?php echo $Genero->id;?> ">
                                                            <?php echo $Genero->nombre; ?>
                                                        </option>
                                                        <?php 
                                                            }  
                                                        ?>
                                                    </select>
                                                </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                    <label class="control-label">Teléfono Movil *</label>
                                                    <input class="form-control" name="movil" id="movil" type="number"
                                                        placeholder="300 000 0000" required/>
                                                </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                    <label class="control-label">Teléfono Fijo *</label>
                                                    <input class="form-control" name="fijo" id="fijo" type="number" placeholder="300 0000"
                                                    required/>
                                                </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                    <label class="control-label">Direccion *</label>
                                                    <input class="form-control" name="direccion" id="direccion" type="text"
                                                        placeholder="Direccion" required/>
                                                </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-6 col-lg-6">   
                                                <div class="form-group">
                                                        <label class="control-label">Departamento *</label>
                                                        <select class="form-control" name="idDepartamentoVotante" id="idDepartamentoVotante" required>
                                                            <option value="">Selecione una opcion</option>
                                                            <?php 
                                                         foreach($Departamento as $Departamento) { 
                                                          ?>
                                                            <option value="<?php echo $Departamento->id;?> ">
                                                                <?php echo $Departamento->nombre; ?>
                                                            </option>
                                                            
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                            </div>  
                                    <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                    <label class="control-label">Ciudad *</label>
                                                    <select class="form-control" name="idCiudadVotante" id="idCiudadVotante" required>
                                                        <option value="">Selecione una opcion</option>
                                                    </select>
                                                </div>
                                    </div>
                                           
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Firma *</label>
                                            <textarea class="form-control" name="firma" id="firma"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="category">* Campo Requerido</div>
                                        <div class="card-footer bg-white border-white text-right">
                                            <button type="submit" class="btn btn-primary btn-fill btn-wd">Guardar</button>
                                            <input class="btn btn-secondary" type="reset" value="Limpiar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                    <?php } else { ?>
                    <div class="alert alert-danger">
                        <span>
                            <b>Error de base de datos.Hay datos vacios</b>
                        </span>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
<?php }else{ ?>
    <div class="alert alert-danger">
                        <span>
                            <b>Error al enviar los datos</b>
                        </span>
                    </div>
<?php } ?> 