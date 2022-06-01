<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Puesto de votación</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="?view=puesto_votacion">Puestos de votacion</a></li>
                        <li class="breadcrumb-item active">Puesto de votación</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
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
                      $Puesto = PuestoVotacionData::GetAll();
                      $Zona = ZonaVotacionData::GetAll();
                      $Departamento = DepartamentoData::GetAll();
                      if(count($Puesto)>0){
                      ?>
                    <hr />
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tablapuestovotacion" class="table table-striped ">
                                <thead  class="bg-primary text-white">
                                    <tr>
                                        <th>Id</th>
                                        <th>Zona</th>
                                        <th>codigo</th>
                                        <th>Nombre</th>
                                        <th>direccion</th>
                                        <th>mesas</th>
                                        <th>potencial</th>
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
    <!--VENTANA MODAL DE PUESTO DE VOTACIÓN-->
    <div id="modalpuestovotacion" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
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