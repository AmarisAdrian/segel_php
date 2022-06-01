<?php
if(isset($_SESSION)){
 $NoDocumento =  $_SESSION['noDocumento']; 
 $Usuario = UsuarioData::GetByDocumento($NoDocumento);  
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Inscripciones de cedula</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="?view=home">Home</a></li>
                        <li class="breadcrumb-item active">Inscripciones</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <div class="dropdown">
                                <i class="fa fa-list"></i> Lista de sufragantes registrados
                                <a class="btn btn-primary" a href="index.php?view=newvotante">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Registrar sufragante</a>
                                <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Exportar
                                </button>
                                <div class="dropdown-menu" class="MenuHerramientaVotante" aria-labelledby="MenuHerramienta" id="MenuHerramientaVotante">

                                </div>
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php 
                              if($Usuario->idTipoUsuario==1){
                                $Votante = SpData::GetAllVotanteNoInscrito();
                              }
                              if($Usuario->idTipoUsuario==2){
                                $Votante = SpData::GetAllVotanteNoInscrito();
                              }
                              if($Usuario->idTipoUsuario==3){
                                $Votante = SpData::GetAllVotanteNoInscritoById($Usuario->id);
                              }
                                if(count($Votante)>0){
                            ?>
                            <!--Aqui va la tabla-->
                            <table id="tablavotante" class="table table-striped ">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>id</th>
                                        <th>No Documento</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Movil</th>
                                        <th>Dirección</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
		            	            foreach($Votante as $Votante){						    
			    	            ?>
                                    <tr>
                                        <td><?php echo $Votante->id; ?></td>
                                        <td><?php echo $Votante->noDocumento; ?></td>
                                        <td><?php echo $Votante->nombre; ?></td>
                                        <td><?php echo $Votante->apellido; ?></td>
                                        <td><?php echo $Votante->movil; ?></td>
                                        <td><?php echo $Votante->direccion; ?></td>
                                        <td width="50px">
                                            <a href="#">
                                                <form method="POST" action="?view=newanexovotante">
                                                    <input type="hidden" id="id" name="id"
                                                        value="<?php echo $Votante->noDocumento;?>">
                                                    <button type="submit" class=" btn btn-dark btn-circle btn-sm"
                                                        title="Anexar" data-placement="top"> <i class="fa fa-paperclip"
                                                            aria-hidden="true"></i></button>
                                                </form>
                                            </a>


                                        </td>
                                        <td>
                                            <a href="#" data-target="#modalvotante" data-id="<?php echo $Votante->id;?>"
                                                data-toggle="modal"
                                                class="openmodalvotante btn btn-success btn-circle btn-sm" title="Ver"
                                                data-placement="top"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="#" method="post"
                                                class="btndelvotante btn btn-danger btn-circle btn-sm" title="Borrar"
                                                data-id="<?php echo $Votante->id?>,<?php echo $Votante->nombre; ?>"
                                                data-toggle="tooltip" data-placement="top" data-method="DELETE"
                                                onclick="Alert('btndelvotante','el votante','./?action=delvotante&id=<?php echo $Votante->id; ?>');"><i
                                                    class="fa fa-trash"></i></a>
                                            <a href="#" data-target="#modalasignarpuesto" data-id="<?php echo $Votante->id;?>"
                                                data-toggle="modal"
                                                class="openmodalasignarpuesto btn btn-warning btn-circle btn-sm" title="Asignar puesto de votacion"
                                                data-placement="top"> <i class="fa fa-map-marker" aria-hidden="true"></i></a>
                                        </td>

                                    </tr>
                                    <?php
		            	            }					    
			    	            ?>
                                </tbody>
                            </table>
                            <?php } else { ?>
                            <div class="alert alert-danger">
                                <span>
                                    <b>No hay votantes registrados</b>
                                </span>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--VENTANA MODAL DE VOTANTE-->
        <div id="modalvotante" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-light"><i class="fa fa-address-card" aria-hidden="true"></i></a> Datos usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!--VENTANA MODAL ASIGNAR PUESTO-->
        <div id="modalasignarpuesto" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-light"><i class="fas fa-map-marker" aria-hidden="true"></i></a> Asignar puesto de votación</h5>
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
    </div>
</section>
<?php }else{ ?>
    <div class="alert alert-danger">
                        <span>
                            <b>Error al enviar los datos</b>
                        </span>
                    </div>
<?php } ?> 