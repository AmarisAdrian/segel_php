<section>
<div class="loader"></div>
<div class="container-fluid">
<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Ciudades</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="?view=home">Home</a></li>
                    <li class="breadcrumb-item active">Configuración</li>
                    <li class="breadcrumb-item active">Ciudades</li>
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
                                    <i class="fa fa-list"></i> Lista de ciudades registradas
                              <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Exportar
                                </button> 
                                <div class="dropdown-menu" id="MenuHerramientaCiudad" aria-labelledby="MenuHerramientaCiudad">
   
                                </div>
                            </div>
                        </h3>
                        </div>
                        <div class="card-body">
                                <div class="table-responsive">
                    <?php 
                        $Departamento = DepartamentoData::GetAll();
                        $Ciudad = CiudadData::GetAll();
                    if(count($Ciudad)>0){
                    ?>
                          <!--Aqui va la tabla-->
                          <table id="tablaciudad" class="table table-striped ">
                         
                                <thead class="bg-primary text-white">
                                    <tr>
                                    <th>Id</th>
                                    <th>Departamento</th>
                                    <th>Nombre</th>
                                    <th></th>
                                    </tr>
                                </thead>                             
                                <tbody>
                                <?php
		            	            foreach($Ciudad as $Ciudad){
                                    $nombreDepartamento = DepartamentoData::GetById($Ciudad->idDepartamento);						    
			    	            ?>
                                    <tr>
                                        <td><?php echo $Ciudad->id; ?></td>
                                        <td><?php echo $nombreDepartamento->nombre ?></td>
                                        <td><?php echo $Ciudad->nombre; ?></td>
                                        <td style="width:100px;">
                                            <a href="#" data-target="#modalciudad" data-id="<?php echo $Ciudad->id;?>"
                                                data-toggle="modal" class=" openmodalciudad btn btn-success btn-circle btn-sm" title="Ver"
                                                data-placement="top" > <i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="#" method="post"
                                                class="btndelciudad btn btn-danger btn-circle btn-sm" title="Borrar" data-toggle="tooltip" data-id="<?php echo $Ciudad->id?>,<?php echo $Ciudad->nombre; ?>"
                                                data-placement="top" data-method="DELETE" onclick="Alert('btndelciudad','la ciudad','./?action=delciudad&id=<?php echo $Ciudad->id; ?>');"><i class="fa fa-trash"></i></a>
                                        </td>                               
                                    </tr>
                                    <?php
		            	            }					    
			    	            ?>
                                </tbody>                            
                            </table>
                            <!--FIN DE TABLA-->
                </div>
            </div>
            <?php } else { ?>
            <div class="alert alert-danger">
                <span>
                    <b>No hay ciudades registradas</b>
                </span>
            </div>
            <?php } ?>
        </div>
    </div>
     <!--FIN MODULO DE REGISTRO DE CIUDAD-->
 <!--MODULO DE REGISTRO DE CIUDAD-->
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fas fa-city"></i> Registrar ciudad </h3>
                </div>
                <?php
                if(count($Departamento)>0){
                    $Num = CiudadData::GetLatest();
                    $Cont = $Num->id;  
                            ?>
                <div class="card-body">
                    <form class="form-horizontal" id="addCiudad" method="POST" action="?view=addciudad" role="form">
                            <div class="form-group">
                                <label class="control-label">Id *</label>
                                <input class="form-control" value="<?php echo $Cont+1; ?>" id="id" name="id" type="text" readonly="true">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Departamento *</label>
                                <select class="form-control" name="idDepartamento" id="idDepartamento" required="true">
                                    <option value="">Selecione una opcion</option>
                                    <?php 
                                                  foreach($Departamento as $Departamento)
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
                            <div class="form-group">
                                <label class="control-label">Nombre *</label>
                                <input class="form-control" id="nombre" name="nombre" type="text" required="true" />
                            </div>

                            <div class="category">* Campo Requerido</div>
                        <div class="card-footer border-white bg-white text-center">
                            <button type="submit" class="btn btn-primary btn-fill btn-wd">Guardar</button>
                        </div>
                    </form>
                </div>
                <?php } else { ?>
                    <div class="alert alert-danger">
                        <span>
                            <b>No hay departamentos registrados</b>
                        </span>
                    </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
 <!--FIN MODULO DE REGISTRO DE CIUDAD-->
 <!--VENTANA MODAL DE CIUDAD-->
 <div id="modalciudad" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title text-light"><i class="fas fa-city" aria-hidden="true"></i></a>  Datos ciudad</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            </div>
          </div>
        </div>
      </div>
       <!--FIN VENTANA MODAL DE CIUDAD-->
</section>