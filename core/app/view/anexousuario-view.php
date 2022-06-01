<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Registro de anexos</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="?view=home">Home</a></li>
                        <li class="breadcrumb-item active"><a href="#">Anexos</a></li>
                        <li class="breadcrumb-item active">Anexos usuario</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-address-card"></i> Lista de anexos registrados</h3>
                    </div>
                    <div id="tablaanexousuario">
                        <?php $Anexo_Usuario = AnexoUsuarioData::GetAll();
                        if(count($Anexo_Usuario)>0){
                            ?>
                            <div class="alert alert-warning">
                                    <span>
                                        <b>A la espera de una orden</b>
                                    </span>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                                    <span>
                                        <b>No hay anexos registrados</b>
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
                            <h3><i class="fa fa-address-card"></i> Buscar anexo usuario </h3>
                        </div>    
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label">No Documento *</label>
                                <input class="form-control"  id="noDocumentoUsuario"  name="noDocumentoUsuario" type="number" placeholder="Digite su número de identidad" required />
                            </div>        
                            <div class="category">* Campo Requerido</div>                    
                            <div class="card-footer text-center">
                                <button name="buttonbuscaranexos" id="buttonbuscaranexousuario" class="btn btn-info btn-fill btn-wd">Buscar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>