<?php 
 if(!empty($_POST["id"])){
    $var = $_POST["id"];
 }
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Registro de anexos</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="?view=home">Home</a></li>
                        <li class="breadcrumb-item active">Registro de anexos</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                <div class="card">
                    <div class="card-header">
                                        <h3><i class="fa fa-address-card"></i> Datos personales</h3>
                    </div>
                    <div class="card-content">
                                <?php 
                                $Usuario = UsuarioData::GetAll();
                            if(count($Usuario)>0){ 
                                    if(!empty($var)){
                                    $Usuario = UsuarioData::GetByDocumento($var);
                                        ?>
                                    <form class="form-horizontal " method="POST" id="nuevoanexousuario" action="?view=addanexousuario" role="form" enctype='multipart/form-data'>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="bloquenecesario">
                                                    <div class="form-group">
                                                        <br/>
                                                            <label for="inputName" class="col-lg-3 control-label">Id *</label>
                                                            <div class="col-md-12">
                                                                <input type="text" name="idUsuario" value="<?php echo $Usuario->id;?>" class="form-control" id="idUsuario" 
                                                                placeholder="Id" readonly="true">
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-lg-4 control-label">No Documento *</label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="noDocumento" value="<?php echo $Usuario->noDocumento;?>" class="form-control" id="noDocumento" 
                                                                placeholder="noDocumento" required readonly="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputName" class="col-lg-3 control-label">Nombre *</label>
                                                            <div class="col-md-12">
                                                                <input type="text" name="nombre" value="<?php echo $Usuario->nombre;?>" class="form-control" id="nombre" 
                                                                placeholder="Nombre" readonly="true">
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-lg-4 control-label">Comentarios *</label>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" name="comentario" id="comentario" rows="10" cols="65" Placeholder="Escribe aquí tus comentarios" required></textarea>    
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-lg-3 control-label">Imagen *</label>
                                                        <div class="col-md-8">
                                                            <input type="file" id="imagen" name="imagen" required/>           
                                                        </div>
                                                    </div>
                                                    <div class="container">   
                                                        <div class="category">Imagen seleccionada</div>
                                                            <div class="card-footer text-left">
                                                                <img src="./content/img/icon/icono-imagen.png" id="imagenShow" name="imagenShow" width="25%" height="25%" >
                                                            </div>            
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="category">* Campo Requerido</div>
                                                                <div class="card-footer text-left">
                                                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Guardar</button>
                                                                    <input class="btn btn-default" type="reset" value="Limpiar">
                                                                </div>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </form>
                                    <?php }else { ?>
                                        <div class="alert alert-warning alert-dismissable" id="alert">
                                            <span>
                                                <b>A la espera de una orden</b>
                                            </span>
                                        </div>
                                        <?php } ?>
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
            
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">
                            <h3><i class="fa fa-address-card"></i> Buscar Usuario </h3>
                        </div>    
                        <div class="card-body">
                            <form class="form-horizontal " method="POST" id="buscar" action="?view=newanexousuario" role="form">
                                <div class="form-group">
                                    <label class="control-label">No Documento *</label>
                                    <input class="form-control"  id="id"  name="id" type="number" placeholder="Digite su número de identidad" requerid />
                                </div>        
                                <div class="category">* Campo Requerido</div>                    
                                <div class="card-footer text-center">
                                    <button typo="submit" name="buscarusuario" id="buscarusuario" class="btn btn-info btn-fill btn-wd">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
