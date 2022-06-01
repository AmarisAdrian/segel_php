<?php 
 if(!empty($_GET["id"])){ 
    $Usuario = SpData::GetHistorialUsuarioById($_GET["id"]);?>
     <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <div class="dropdown">
                                <i class="fa fa-list"></i>Detalles de cambios
                            </div>
                        </h3>
                    </div>
                    <div class="table-responsive">
                    <div class="card-body">
                            <table id="tabladetalleusuario" class="table table-borderless table-hover display">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Tipo documento</th>
                                        <th>Tipo usuario</th>
                                        <th>Estado Usuario</th>
                                        <th>Documento</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Password</th>
                                        <th>Genero</th>
                                        <th>Telefono</th>
                                        <th>Movil</th>
                                        <th>Email</th>
                                        <th>Direccion</th>
                                        <th>Departamento</th>
                                        <th>Ciudad</th>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php  $Usuario->id; ?></td>
                                        <td><?php echo $Usuario->tipodocumento; ?></td>
                                        <td><?php echo $Usuario->tipousuario; ?></td>
                                        <td><?php echo $Usuario->estadousuario; ?></td>
                                        <td><?php echo $Usuario->NoDocumento; ?></td>
                                        <td><?php echo $Usuario->nombre; ?></td>
                                        <td><?php echo $Usuario->apellido; ?></td>
                                        <td><?php echo $Usuario->password; ?></td>
                                        <td><?php echo $Usuario->genero; ?></td>
                                        <td><?php echo $Usuario->telefono; ?></td>
                                        <td><?php echo $Usuario->movil; ?></td>
                                        <td><?php echo $Usuario->email; ?></td>
                                        <td><?php echo $Usuario->direccion; ?></td>
                                        <td><?php echo $Usuario->departamento; ?></td>
                                        <td><?php echo $Usuario->ciudad; ?></td>
                                        <td><?php echo $Usuario->fecha; ?></td>
                                        <td><?php echo $Usuario->tipo; ?></td>
                                    </tr>
                                </tbody>
                            </table>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <?php } ?>