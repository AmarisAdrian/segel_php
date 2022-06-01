<?php 
 if(!empty($_GET["id"])){ 
    $Registro = SpData::GetHistorialRegistroById($_GET["id"]);?>
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
                            <table id="tabladetalleregistro" class="table table-borderless table-hover display">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>No Documento</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Puesto</th>
                                        <th>Mesa</th>
                                        <th>Comentario</th>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php  $Registro->id; ?></td>
                                        <td><?php echo $Registro->documento; ?></td>
                                        <td><?php echo $Registro->nombre; ?></td>
                                        <td><?php echo $Registro->apellido; ?></td>
                                        <td><?php echo $Registro->puesto; ?></td>
                                        <td><?php echo $Registro->mesa; ?></td>
                                        <td><?php echo $Registro->comentario; ?></td>
                                        <td><?php echo $Registro->fecha; ?></td>
                                        <td><?php echo $Registro->tipo; ?></td>
                                    </tr>
                                </tbody>
                            </table>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <?php } ?>