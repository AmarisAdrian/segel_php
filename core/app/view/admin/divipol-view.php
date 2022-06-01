<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">División politica</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="?view=home">Home</a></li>
                        <li class="breadcrumb-item active">Divipol</li>
                        <li class="breadcrumb-item active">Divipol</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <?php
        $Divipol = DivipolData::GetAll();
        $Departamento = DepartamentoData::GetAll();
        $Ciudad = CiudadData::GetAll();
        ?>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header text-light bg-primary">
                            <h3><i class="fas fa-globe"></i> Registrar divipol </h3>
                        </div>
                        <?php
                        if ((count($Departamento) > 0) && (count($Ciudad) > 0)) {
                        ?>
                            <div class="card-body bg-muted">
                                <form id="addivipol" method="POST" action="index.php?view=addivipol">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Departamento*</label>
                                                <select class="form-control" name="iddepartamentodivipol" id="iddepartamentodivipol" required>
                                                    <option value="">Seleccione una opcion</option>
                                                    <?php
                                                    foreach ($Departamento as $Departamento) {
                                                    ?>
                                                        <option value="<?php echo $Departamento->id; ?> ">
                                                            <?php echo $Departamento->nombre; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Ciudad *</label>
                                                <select class="form-control" name="idciudadivipol" id="idciudadivipol" required>
                                                    <option value="">Selecione una opcion</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Nombre*</label>
                                                <input class="form-control" id="nombre" name="nombre" type="text" requerid>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Referencia*</label>
                                                <input class="form-control" id="referencia" name="referencia" type="text" requerid>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Comentarios*</label>
                                                <textarea class="form-control" name="comentario" id="comentario" rows="5" cols="10" Placeholder="Escribe aquí tus comentarios" requerid></textarea>
                                            </div>
                                            <div class="category"> * Campo Requerido</div>
                                            <div class="card-footer border-white bg-white text-right">
                                                <button type="submit" class="btn btn-primary btn-fill btn-wd">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger">
                        <span>
                            <b>No hay divipol registradas</b>
                        </span>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <br />
        <!--TABLA DE DIVIPOL-->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <div class="dropdown">
                                <i class="fa fa-list"></i> Lista de las divisiones politicas registradas
                                <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Exportar
                                </button>
                                <div class="dropdown-menu" id="MenuHerramientaDivipol" aria-labelledby="MenuHerramienta">

                                </div>
                            </div>
                        </h3>
                    </div>
                    <?php
                    if ((count($Divipol) > 0)) {
                    ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabladivipol" class="table table-striped ">
                                    <thead class="bg-success text-white">
                                        <tr>
                                            <th>Id</th>
                                            <th>Departamento</th>
                                            <th>Ciudad</th>
                                            <th>Nombre</th>
                                            <th>referencia</th>
                                            <th>comentario</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($Divipol as $Divipol) {
                                            $idDep = $Divipol->idDepartamento;
                                            $idCi = $Divipol->idCiudad;
                                            $NombreDep = DepartamentoData::GetById($idDep);
                                            $NombreCi = CiudadData::GetById($idCi);
                                        ?>
                                            <tr>
                                                <td><?php echo $Divipol->id; ?></td>
                                                <td><?php echo $NombreDep->nombre ?></td>
                                                <td><?php echo $NombreCi->nombre ?></td>
                                                <td><?php echo $Divipol->nombre; ?></td>
                                                <td><?php echo $Divipol->referencia ?></td>
                                                <td><?php echo $Divipol->comentario ?></td>
                                                <td style="width:100px;">
                                                    <a href="#" data-target="#modaldivipol" data-id="<?php echo $Divipol->id; ?>" data-toggle="modal" class="openmodaldivipol btn btn-success btn-circle btn-sm" title="Ver" data-placement="top"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="#" data-id="<?php echo $Divipol->id ?>,<?php echo $Divipol->nombre; ?>" class="btndeldivipol btn btn-danger btn-circle btn-sm" title="Borrar" data-toggle="tooltip" data-placement="top" data-method="DELETE" onclick="Alert('btndeldivipol','divipol','./?action=deldivipol&id=<?php echo $Divipol->id; ?>');"><i class="fa fa-trash"></i></a>
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
                                <b>No hay divipol registradas</b>
                            </span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--VENTANA MODAL DE DIVIPOL-->
    <div id="modaldivipol" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="fas fa-globe"></i> Datos divipol</h5>
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