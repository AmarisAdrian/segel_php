<?php
if (!empty($_GET["id"])) {
    $Votante = VotanteData::GetById($_GET["id"]);
    $EstadoUsuario = EstadoUsuarioData::GetAll();
    $Usuario = UsuarioData::GetAll();
    $TipoDocumento = TipoDocumentoData::GetAll();
    $Genero = GeneroData::GetAll();
    $Departamento = DepartamentoData::GetAll();
    $Ciudad = CiudadData::GetAll();
?>
    <form class="form-horizontal" method="POST" id="editvotante" action="?view=updatevotante" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputName" class="col-lg-3 control-label">Id *</label>
                    <div class="col-md-12">
                        <input type="text" name="id" value="<?php echo $Votante->id; ?>" class="form-control" id="id" placeholder="Id" readonly="true">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label">Funcionario *</label>
                    <div class="col-md-12 ">
                        <select class="form-control" name="idUsuario" id="idUsuario">
                            <?php
                            $idUsuario = $Votante->idUsuario;
                            $nombreUsuario = UsuarioData::GetById($idUsuario); ?>
                            <option value="<?php echo $Votante->idUsuario; ?> "><?php echo $nombreUsuario->nombre; ?> </option>
                            <?php
                            foreach ($Usuario as $Usuario) { ?>
                                <option value="<?php echo $Usuario->id; ?> ">
                                    <?php echo $Usuario->nombre; ?>
                                </option>
                            <?php }  ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label">Estado usuario *</label>
                    <div class="col-md-12 ">
                        <select class="form-control" name="idEstadoUsuario" id="idEstadoUsuario">
                            <?php
                            $idEstadoUsuario = $Votante->idEstadoUsuario;
                            $nombreEstadoUsuario = EstadoUsuarioData::GetById($idEstadoUsuario); ?>
                            <option value="<?php echo $Votante->idEstadoUsuario; ?> "><?php echo $nombreEstadoUsuario->nombre; ?> </option>
                            <?php
                            foreach ($EstadoUsuario as $EstadoUsuario) { ?>
                                <option value="<?php echo $EstadoUsuario->id; ?> ">
                                    <?php echo $EstadoUsuario->nombre; ?>
                                </option>
                            <?php }  ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-lg-8  control-label">Tipo de Documento *</label>
                    <div class="col-md-12 ">
                        <select class=" form-control" name="idTipoDocumento" id="idTipoDocumento" required>
                            <?php
                            $idTipoDocumento = $Votante->idTipoDocumento;
                            $nombreTipoDocumento = TipoDocumentoData::GetById($idTipoDocumento); ?>
                            <option value="<?php echo $Votante->idTipoDocumento; ?> "><?php echo $nombreTipoDocumento->nombre; ?> </option>
                            <?php foreach ($TipoDocumento as $TipoDocumento) {
                            ?>
                                <option value="<?php echo $TipoDocumento->id; ?> ">
                                    <?php echo $TipoDocumento->nombre; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-5">No Documento *</label>
                    <div class="col-md-12">
                        <input type="number" name="noDocumento" value="<?php echo $Votante->noDocumento; ?>" class="form-control" id="noDocumento" paceholder="NoDocumento" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-5">Nombres *</label>
                    <div class="col-md-12">
                        <input type="text" name="nombre" value="<?php echo $Votante->nombre; ?>" class="form-control" id="nombre" paceholder="Nombre" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-5">Apellidos *</label>
                    <div class="col-md-12">
                        <input type="text" name="apellido" value="<?php echo $Votante->apellido; ?>" class="form-control" id="apellido" paceholder="Apellido" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-5 control-label">Genero *</label>
                    <div class="col-md-12 ">
                        <select class="form-control" name="idGenero" id="idGenero" required>
                            <?php
                            $idGenero = $Votante->idGenero;
                            $nombreGenero = GeneroData::GetById($idGenero); ?>
                            <option value="<?php echo $Votante->idGenero; ?> "><?php echo $nombreGenero->nombre; ?> </option>
                            <?php
                            foreach ($Genero as $Genero) { ?>
                                <option value="<?php echo $Genero->id; ?> ">
                                    <?php echo $Genero->nombre; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-5">Teléfono Movil *</label>
                    <div class="col-md-12">
                        <input type="number" name="movil" value="<?php echo $Votante->movil; ?>" class="form-control" id="movil" paceholder="Movil" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-5">Teléfono Fijo *</label>
                    <div class="col-md-12">
                        <input type="number" name="fijo" value="<?php echo $Votante->fijo; ?>" class="form-control" id="fijo" paceholder="Fijo" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-5">Direccion *</label>
                    <div class="col-md-12">
                        <input type="text" name="direccion" value="<?php echo $Votante->direccion; ?>" class="form-control" id="direccion" paceholder="Direccion" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Departamento *</label>
                    <div class="col-md-12 ">
                        <select class="form-control" name="idModalDepartamento" id="idModalDepartamento" required>
                            <?php
                            $idDepartamento = $Votante->idDepartamento;
                            $nombreDepartamento = DepartamentoData::GetById($idDepartamento); ?>
                            <option value="<?php echo $Votante->idDepartamento; ?> "><?php echo $nombreDepartamento->nombre; ?> </option>
                            <?php
                            foreach ($Departamento as $Departamento) { ?>
                                <option value="<?php echo $Departamento->id; ?> ">
                                    <?php echo $Departamento->nombre; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Ciudad *</label>
                    <div class="col-md-12 ">
                        <select class="form-control" name="idModalCiudad" id="idModalCiudad" required>
                            <?php
                            $idCiudad = $Votante->idCiudad;
                            $nombreCiudad = CiudadData::GetById($idCiudad); ?>
                            <option value="<?php echo $Votante->idCiudad; ?> "><?php echo $nombreCiudad->nombre; ?> </option>
                            <?php
                            foreach ($Ciudad as $Ciudad) { ?>
                                <option value="<?php echo $Ciudad->id; ?> ">
                                    <?php echo $Ciudad->nombre; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-lg-3">Firma *</label>
                    <div class="col-md-12">
                        <input type="text" name="firma" value="<?php echo $Votante->firma; ?>" class="form-control" id="firma" paceholder="Firma" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
            <button type="button" class="bg-danger btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </form>

<?php } else { ?>
    <div class="alert alert-danger">
        <span>
            <b>Error al consultar el votante seleccionado</b>
        </span>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
<?php  } ?>