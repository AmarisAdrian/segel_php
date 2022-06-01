<section>
<div class="container-fluid">
<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Departamentos</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="?view=home">Home</a></li>
                    <li class="breadcrumb-item active">Configuración</li>
                    <li class="breadcrumb-item active">Departamentos</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
            <div class="card">
                    <div class="card-header">
                        <h3>
                            <div class="dropdown">
                                    <i class="fa fa-list"></i> Lista de departamentos registrados
                              <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Exportar
                                </button> 
                                <div class="dropdown-menu" id="MenuHerramientaDepartamento" aria-labelledby="MenuHerramientaDepartamento">
                                </div>
                            </div>
                        </h3>
                    </div>
                    <?php 
                  $Departamento = DepartamentoData::GetAll();
                  if(count($Departamento)>0){
                  ?>
                  <hr/>
                  <div class="card-body">
                        <div class="table-responsive">
                                <table id="tabladepartamento" class="table table-striped">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach($Departamento as $Departamento){					    
                                        ?>
                                            <tr>
                                                <td><?php echo $Departamento->id; ?></td>
                                                <td><?php echo $Departamento->nombre ?></td>
                                                <td style="width:100px;">
                                                    <a href="#"data-target="#modaldepartamento" data-id="<?php echo $Departamento->id; ?>"
                                                        data-toggle="modal" class="openmodaldepartamento btn btn-success btn-circle btn-sm" title="Ver"
                                                        data-placement="top"> <i class="fa fa-eye" aria-hidden="true"></i></a>                  
                                                        <a href="#" data-id="<?php echo $Departamento->id?>,<?php echo $Departamento->nombre; ?>"
                                                        class="btndeldepartamento btn btn-danger btn-circle btn-sm" title="Borrar" data-toggle="tooltip"
                                                        data-placement="top" data-method="DELETE" onclick="Alert('btndeldepartamento','el departamento','./?action=deldepartamento&id=<?php echo $Departamento->id; ?>');"><i class="fa fa-trash"></i></a>
                                                </td>                                  
                                            </tr>
                                            <?php
                                            }					    
                                        ?>
                                        </tbody>                            
                                    </table>
                        </div>
            </div>
        </div>
            <?php } else { ?>
            <div class="alert alert-danger">
                <span>
                    <b>No hay departamentos registrados</b>
                </span>
            </div>
            <?php } ?>
        </div>
        <?php
       $Num = DepartamentoData::GetLatest();
       $Cont = $Num->id;
       $Num = $Cont+1;                 
            ?>
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
            <div class="card">
                <div class="card-content">
                        <div class="card-header">
                                <h3><i class="fas fa-flag"></i> Registrar departamento </h3>
                            </div>
                <div class="card-body">
                    <form id="addDepartamento" method="POST" action="index.php?view=addepartamento">
                        <div class="form-group">
                                <label class="control-label">Id *</label>
                                <input class="form-control" value="<?php echo $Num; ?>" id="id "name="id" type="text" type="number" readonly="true">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nombre *</label>
                                <input class="form-control" id="name "name="name" type="text" required="true" />
                            </div>
                            <div class="category">* Campo Requerido</div>
                        
                        <div class="card-footer bg-white border-white text-center">
                            <button type="submit" class="btn btn-primary btn-fill btn-wd">Guardar</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
        <!--VENTANA MODAL DE DEPÁRTAMENTOS-->
        <div id="modaldepartamento" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                      <h5 class="modal-title text-light"><i class="fas fa-flag" aria-hidden="true"></i></a> Datos departamento</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    </div>
                  </div>
                </div>
              </div>
</div>
</section>