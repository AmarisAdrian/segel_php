<?php
if(isset($_SESSION)){
 $NoDocumento =  $_SESSION['noDocumento']; 
 $Usuario = UsuarioData::GetByDocumento($NoDocumento);  
?>
<section>
<div class="container-fluid">
<div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Datos de mi cuenta</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="?view=home">Home</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-content">
                <?php 
                       $TipoDocumento = TipoDocumentoData::GetAll();
                       $TipoUsuario = TipoUsuarioData::GetAll();
                       $Estado = EstadoUsuarioData::GetAll();
                       $Genero = GeneroData::GetAll();
                       $Departamento = DepartamentoData::GetAll();
                       $Ciudad = CiudadData::GetAll();
                      if((count($TipoDocumento)>0) && (count($Estado)>0) && (count($Genero)>0) && (count($Departamento)>0)&& (count($Ciudad)>0)){
                      ?>
                    <form class="form-horizontal" id="editProfile" action="?view=#" method="POST" role="form">
                    <div class="card-header">
                            <h3><i class="fa fa-address-card"></i> Mi perfil</h3>
                        </div>
                        <br />
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tipo de documento *</label>
                                        <select class="form-control" name="idTipoDocumento" id="idTipoDocumento">
                                        <?php 
                                            $TipoDoc = TipoDocumentoData::GetById($Usuario->idTipoDocumento);
                                        ?>
                                        <option value="<?php echo $TipoDoc->id;?> "><?php echo $TipoDoc->nombre; ?> </option> 
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <?php 
                                            $TipoUser = TipoUsuarioData::GetById($Usuario->idTipoDocumento);
                                        ?>
                                        <label class="control-label">Tipo de usuario *</label>
                                        <input class="form-control" name="tipousuario" id="tipousuario" value="<?php echo $TipoUser->nombre; ?>"type="text" readonly/>
                                         <input class="form-control" name="idTipoUsuario" id="idTipoUsuario" value="<?php echo $TipoUser->id; ?>"type="text" readonly hidden/>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Estado usuario *</label>
                                                     <?php  $EstadoU = EstadoUsuarioData::GetById($Usuario->idEstadoUsuario); ?>
                                                     <input class="form-control" name="estadoUsuario" id="estadoUsuario" value="<?php echo $EstadoU->nombre; ?>"type="text" readonly/>
                                                     <input class="form-control" name="idEstadoUsuario" id="idEstadoUsuario" value="<?php echo $EstadoU->id; ?>"type="number" readonly hidden/>   
                                                 </div>
                                            </div>                           
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Numero de documento *</label>
                                        <input class="form-control" name="noDocumento" id="noDocumento" value="<?php echo $Usuario->noDocumento; ?>"type="number" placeholder="Numero de documento" required="true"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nombre *</label>
                                        <input class="form-control" value="<?php echo $Usuario->nombre;?>" name="nombre" id="nombre" type="text" placeholder="Nombres" required="true" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Apellidos *</label> 
                                        <input type="text" value="<?php echo $Usuario->apellido;?>" name="apellido" id="apellido" class="form-control" id="nombre" placeholder="Apellidos" required="true "
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Genero *</label>
                                        <select class="form-control" name="idGenero" id="idGenero">
                                            <?php 
                                            $IdGen = GeneroData::GetById($Usuario->idGenero);
                                             ?> 
                                        <option value="<?php echo $IdGen->id;?> "><?php echo $IdGen->nombre; ?> </option><option value="<?php echo $IdGen->id;?> "><?php echo $IdGen->nombre; ?> </option>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Movil *</label>
                                        <input class="form-control" value="<?php echo $Usuario->movil;?>" name="movil" id="movil" type="number" placeholder="Movil" required="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Telefono *</label>
                                                <input class="form-control" value="<?php echo $Usuario->telefono;?>" name="telefono" id="telefono" type="number" placeholder="Telefono" required="true" />
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Email *</label>
                                                <input class="form-control" value="<?php echo $Usuario->email;?>" name="email" id="email" type="text" placeholder="Email" required="true" />
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Direccion *</label>
                                        <input class="form-control" value="<?php echo $Usuario->direccion;?>" name="direccion" id="direccion" type="text" placeholder="Direccion" required="true" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Departamento *</label>
                                        <select class="form-control" name="idDepartamentoPerfil" id="idDepartamentoPerfil">
                                            <?php 
                                                $IdDepartamento = DepartamentoData::GetById($Usuario->idDepartamento);
                                            ?>
                                                <option value="<?php echo $IdDepartamento->id;?> "><?php echo $IdDepartamento->nombre; ?> </option>        
                                        <?php 
                                             foreach($Departamento as $Departamento) { 
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
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ciudad *</label>
                                        <select class="form-control" name="idCiudadPerfil" id="idCiudadPerfil">
                                                <option value="">Selecione una opcion</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Firma *</label>
                                        <textarea class="form-control"  value="<?php echo $Usuario->firma;?>" name="firma" id="firma"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="category">
                                            * Campo Requerido
                                        </div>
                                        <div class="card-footer text-left">
                                            <button type="submit" class="btn btn-info btn-fill btn-wd">Guardar</button>
                                            <button type="reset" class="btn btn-default">Limpiar</button>
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