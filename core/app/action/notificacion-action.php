<?php 
if(!empty($_GET["id"])){
    $id = $_GET["id"];
        if($id == 1){
        $Votante = SpData::GetAllHistorialVotante();?>
        <!--Tabla registro votante-->
        <div class="table-votante">
        <div class="table-responsive">
                            <table id="tablahistorialvotante" class="table table-borderless table-hover display">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Lider</th>
                                        <th>No Documento</th>
                                        <th>Nombre completo</th>
                                        <th>fecha</th>
                                        <th>tipo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                foreach($Votante as $Votante){	
                                                $Lider = UsuarioData::GetById($Votante->idUsuario);		    
                                            ?>
                                    <tr>
                                        <td><?php $Votante->id; ?></td>
                                        <td><?php echo $Lider->nombre.' '.$Lider->apellido; ?></td>
                                        <td><?php echo $Votante->noDocumento; ?></td>
                                        <td><?php echo $Votante->nombre.' '.$Votante->apellido?></td>
                                        <td><?php echo $Votante->fecha ?></td>
                                        <td><?php echo $Votante->tipo ?></td>
                                        <td>
                                            <a href="#" data-target="#modalhistorialvotante"
                                                data-id="<?php echo $Votante->id; ?>" data-toggle="modal"
                                                class="openmodalhistorialvotante btn btn-success btn-circle btn-sm"
                                                title="Ver" data-placement="top"> <i class="fa fa-eye"
                                                    aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                             }					    
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!--fin Tabla registro votante-->
                 <!--Tabla registro usuario-->
<?php } 
    if($id == 2){
     $Usuario = SpData::GetAllHistorialUsuario();?>
    <div class="table-usuario">
    <div class="table-responsive">
                        <table id="tablahistorialusuario" class="table table-borderless table-hover display">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>No Documento</th>
                                    <th>Nombre completo</th>
                                    <th>fecha</th>
                                    <th>tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            foreach($Usuario as $Usuario){			    
                                        ?>
                                <tr>
                                    <td><?php echo $Usuario->id; ?></td>
                                    <td><?php echo $Usuario->noDocumento; ?></td>
                                    <td><?php echo $Usuario->nombre.' '.$Usuario->apellido?></td>
                                    <td><?php echo $Usuario->fecha ?></td>
                                    <td><?php echo $Usuario->tipo ?></td>
                                    <td>
                                        <a href="#" data-target="#modalhistorialusuario"
                                            data-id="<?php echo $Puesto->id; ?>" data-toggle="modal"
                                            class="openmodalhistorialusuario btn btn-success btn-circle btn-sm"
                                            title="Ver" data-placement="top"> <i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php
                                         }					    
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                 <!--fin Tabla registro usuario-->
                  <!--Tabla registro usuario-->
<?php }
    if($id == 3){
    $Registro = SpData::GetAllHistorialRegistro(); ?>
    <!--Tabla registro de puesto de votacion-->
    <div class="table-registro">
    <div class="table-responsive">
                        <table id="tablahistorialregistro" class="table table-borderless  table-hover display">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Sufragante</th>
                                    <th>Puesto</th>
                                    <th>Comentario</th>
                                    <th>fecha</th>
                                    <th>tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        foreach($Registro as $Registro){	
                                            $nombrePuesto = PuestoVotacionData::GetById($Registro->idPuesto);
                                            $nombreVotante = VotanteData::GetById($Registro->idVotante);			    
                                        ?>
                                <tr>
                                    <td><?php  $Registro->id; ?></td>
                                    <td><?php echo $nombreVotante->nombre.' '.$nombreVotante->apellido; ?></td>
                                    <td><?php echo $nombrePuesto->nombre; ?></td>
                                    <td><?php echo $Registro->comentario;?></td>
                                    <td><?php echo $Registro->fecha ?></td>
                                    <td><?php echo $Registro->tipo ?></td>
                                    <td>
                                        <a href="#" data-target="#modalhistorialregistro"
                                            data-id="<?php echo $Registro->id; ?>" data-toggle="modal"
                                            class="openmodalhistorialregistro btn btn-success btn-circle btn-sm"
                                            title="Ver" data-placement="top"> <i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php
                                         }					    
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                   <!--fin Tabla registro de puesto de votacion-->
<?php }
  if($id == 4){
    $Votantel = SpData::GetAllHistorialVotanteLeido(); ?>
    <!--Tabla registro de puesto de votacion leidos-->
    <div class="table-hvotante">
    <div class="table-responsive">
    <table id="tablahistorialvotantel" class="table table-borderless table-hover display">
                                <thead>
                                
                                    <tr>
                                        <th></th>
                                        <th>Lider</th>
                                        <th>No Documento</th>
                                        <th>Nombre completo</th>
                                        <th>fecha</th>
                                        <th>tipo</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                foreach($Votantel as $Votantel){	
                                                $Lider = UsuarioData::GetById($Votantel->idUsuario);		    
                                            ?>
                                    <tr>
                                        <td><?php $Votantel->id; ?></td>
                                        <td><?php echo $Lider->nombre.' '.$Lider->apellido; ?></td>
                                        <td><?php echo $Votantel->noDocumento; ?></td>
                                        <td><?php echo $Votantel->nombre.' '.$Votantel->apellido?></td>
                                        <td><?php echo $Votantel->fecha ?></td>
                                        <td><?php echo $Votantel->tipo ?></td>
                                    </tr>
                                    <?php
                                             }					    
                                        ?>
                                </tbody>
                            </table>
                    </div>
                </div>
<?php }
  if($id == 5){
    $Usuariol = SpData::GetAllHistorialUsuarioLeido(); ?>
    <!--Tabla registro de puesto de votacion leidos-->
    <div class="table-husuario">
    <div class="table-responsive">
        <table id="tablahistorialusuariol" class="table table-borderless table-hover display">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>No Documento</th>
                                    <th>Nombre completo</th>
                                    <th>fecha</th>
                                    <th>tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            foreach($Usuariol as $Usuariol){			    
                                        ?>
                                <tr>
                                    <td><?php echo $Usuariol->id; ?></td>
                                    <td><?php echo $Usuariol->noDocumento; ?></td>
                                    <td><?php echo $Usuariol->nombre.' '.$Usuariol->apellido?></td>
                                    <td><?php echo $Usuariol->fecha ?></td>
                                    <td><?php echo $Usuariol->tipo ?></td>
                                </tr>
                                <?php
                                         }					    
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<?php }
 if($id == 6){
    $Registrol = SpData::GetAllHistorialRegistroLeido(); ?>
    <!--Tabla registro de puesto de votacion leidos-->
    <div class="table-hregistro">
    <div class="table-responsive">
            <table id="tablahistorialregistrol" class="table table-borderless  table-hover display">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Sufragante</th>
                                    <th>Puesto</th>
                                    <th>Comentario</th>
                                    <th>fecha</th>
                                    <th>tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            foreach($Registrol as $Registrol){	
                                              $nombrePuesto = PuestoVotacionData::GetById($Registrol->idPuesto);
                                              $nombreVotante = VotanteData::GetById($Registrol->idVotante);			    
                                        ?>
                                <tr>
                                    <td><?php  $Registrol->id; ?></td>
                                    <td><?php echo $nombreVotante->nombre.' '.$nombreVotante->apellido; ?></td>
                                    <td><?php echo $nombrePuesto->nombre; ?></td>
                                    <td><?php echo $Registrol->comentario;?></td>
                                    <td><?php echo $Registrol->fecha ?></td>
                                    <td><?php echo $Registrol->tipo ?></td>
                                </tr>
                                <?php
                                         }					    
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<?php } } ?>

    <!--VENTANA MODAL DE HISTORIAL VOTANTE-->
    <div id="modalhistorialvotante" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title"><i class="fa fa-address-card"></i> Detalles de eventos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <!--VENTANA MODAL DE HISTORIAL USUARIO-->
    <div id="modalhistorialusuario" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title"><i class="fa fa-address-card"></i> Detalles de eventos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <!--VENTANA MODAL DE HISTORIAL REGISTRO DE VOTANTE-->
    <div id="modalhistorialregistro" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title"><i class="fa fa-address-card"></i> Detalles de eventos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>