<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Puesto de votación</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="?view=divipol">Divipol</a></li>
                        <li class="breadcrumb-item active">Puesto de votación</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header bg-primary text-light">
                            <h3><i class="fas fa-map-marker"></i> Registrar puesto de votación </h3>
                        </div>
                        <?php
                            $Puesto = PuestoVotacionData::GetAll();
                            $Zona = ZonaVotacionData::GetAll();
                             $Departamento = DepartamentoData::GetAll();
                            if((count($Zona)>0) || (count($Departamento)>0)){ 
                        ?>
                        <div class="card-body">
                            <form id="addpuestovotacion" method="POST" action="index.php?view=addpuestovotacion">
                                <div class="row">
                                    <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Departamento*</label>
                                    <select class="form-control" name="idDepartamentoPuesto" id="idDepartamentoPuesto">
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
                                        <label class="control-label">Ciudad *</label>
                                        <select class="form-control" name="idCiudadPuesto" id="idCiudadPuesto">
                                                <option value="">Selecione una opcion</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Zona*</label>
                                    <select class="form-control" name="idZonaPuesto" id="idZonaPuesto" required>
                                        <option value="">Selecione una opcion</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Codigo*</label>
                                    <input class="form-control" id="codigo" name="codigo" type="text" required>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nombre*</label>
                                    <input class="form-control" id="nombre" name="nombre" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Direccion*</label>
                                    <input class="form-control" id="direccion" name="direccion" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Mesas habilitadas*</label>
                                    <input class="form-control" id="mesas" name="mesas" type="number" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Potencial de sufragantes*</label>
                                    <input class="form-control" id="potencial" name="potencial" type="number" required>
                                </div>
                                <div class="category">* Campo Requerido</div>
                                <div class="card-footer bg-white border-white text-right">
                                    <button type="submit" class="btn btn-primary btn-fill btn-wd">Guardar</button>
                                </div>
                                </div>
                                </div>
                            </form>
                        </div>
                        <?php } else { ?>
                        <div class="alert alert-danger">
                            <span>
                                <b>No hay zonas registradas</b>
                            </span>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <div class="dropdown">
                                <i class="fa fa-list"></i> Lista de puestos de votación registrados
                                <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Exportar
                                </button>
                                <div class="dropdown-menu" id="MenuHerramientaPuestoVotacion" aria-labelledby="MenuHerramientaPuestoVotacion">
                                </div>
                            </div>
                        </h3>
                    </div>
                    <?php 
                      if(count($Puesto)>0){
                      ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tablapuestovotacion" class="table table-striped ">
                                <thead  class="bg-success text-white">
                                    <tr>
                                        <th>Id</th>
                                        <th>Zona</th>
                                        <th>codigo</th>
                                        <th>Nombre</th>
                                        <th>direccion</th>
                                        <th>mesas</th>
                                        <th>potencial</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                foreach($Puesto as $Puesto){
                                                $id = $Puesto->idZona;
                                                $Nombre = ZonaVotacionData::GetById($id);				    
                                            ?>
                                    <tr>
                                        <td><?php echo $Puesto->id; ?></td>
                                        <td><?php echo $Nombre->nombre ?></td>
                                        <td><?php echo $Puesto->codigo; ?></td>
                                        <td><?php echo $Puesto->nombre ?></td>
                                        <td><?php echo $Puesto->direccion ?></td>
                                        <td><?php echo $Puesto->mesa ?></td>
                                        <td><?php echo $Puesto->potencial ?></td>
                                        <td style="width:100px;">
                                            <a href="#" data-target="#modalpuestovotacion"
                                                data-id="<?php echo $Puesto->id; ?>" data-toggle="modal"
                                                class="openmodalpuestovotacion btn btn-success btn-circle btn-sm"
                                                title="Ver" data-placement="top"> <i class="fa fa-eye"
                                                    aria-hidden="true"></i></a>
                                            <a href="#"
                                                data-id="<?php echo $Puesto->id?>,<?php echo $Puesto->nombre; ?>"
                                                class="btndelpuesto btn btn-danger btn-circle btn-sm" title="Borrar"
                                                data-toggle="tooltip" data-placement="top" data-method="DELETE"
                                                onclick="Alert('btndelpuesto','El puesto','./?action=delpuestovotacion&id=<?php echo $Puesto->id; ?>');"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                                }					    
                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="alert alert-danger">
                        <span>
                            <b>No hay puesto de votación registrado</b>
                        </span>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!--VENTANA MODAL DE PUESTO DE VOTACIÓN-->
    <div id="modalpuestovotacion" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title"><i class="fas fa-map-marker"></i> Datos puesto de votación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
</section>