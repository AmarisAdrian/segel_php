<?php 
    if(!empty($_GET["id"])){ 
        $votante = SpData::GetHistorialVotanteById($_GET["id"]);
?>
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
                            <table id="tabladetallevotante" class="table table-borderless table-hover display">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Tipo Documento</th>
                                        <th>Situacion</th>
                                        <th>No Documento</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Genero</th>
                                        <th>Movil</th>
                                        <th>fijo</th>
                                        <th>Dirección</th>
                                        <th>Departamento</th>
                                        <th>Ciudad</th>
                                        <th>Firma</th>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php $votante->id; ?></td>
                                        <td><?php echo $votante->tipodocumento; ?></td>
                                        <td><?php echo $votante->situacion; ?></td>
                                        <td><?php echo $votante->NoDocumento; ?></td>
                                        <td><?php echo $votante->nombre; ?></td>
                                        <td><?php echo $votante->apellido; ?></td>
                                        <td><?php echo $votante->genero; ?></td>
                                        <td><?php echo $votante->movil; ?></td>
                                        <td><?php echo $votante->fijo; ?></td>
                                        <td><?php echo $votante->direccion; ?></td>
                                        <td><?php echo $votante->departamento; ?></td>
                                        <td><?php echo $votante->ciudad; ?></td>
                                        <td><?php echo $votante->firma; ?></td>
                                        <td><?php echo $votante->fecha; ?></td>
                                        <td><?php echo $votante->tipo; ?></td>
                                    </tr>
                                </tbody>
                            </table>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>

