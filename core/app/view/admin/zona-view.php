<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Zonas locales</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="?view=divipol">Divipol</a></li>
                        <li class="breadcrumb-item active">Zona</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <?php
        $Zona = ZonaVotacionData::GetAll();
        $Divipol = DivipolData::GetAll();
        $Departamento = DepartamentoData::GetAll(); ?>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header bg-primary text-light">
                            <h3><i class="fa fa-address-card"></i> Registrar zona </h3>
                        </div>
                        <?php
                        if ((count($Divipol) > 0) || (count($Departamento) > 0)) {
                        ?>
                            <div class="card-body">
                                <form id="addzona" method="POST" action="index.php?view=addzona">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Departamento*</label>
                                                <select class="form-control" name="idDepartamentoZona" id="idDepartamentoZona" required>
                                                    <option value="">Selecione una opcion</option>
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
                                                <select class="form-control" name="idCiudadZona" id="idCiudadZona">
                                                    <option value="">Selecione una opcion</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Divipol*</label>
                                                <select class="form-control" name="idDivipolZona" id="idDivipolZona" required>
                                                    <option value="">Selecione una opcion</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">numero*</label>
                                                <input class="form-control" id="numero" name="numero" type="number" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">codigo*</label>
                                                <input class="form-control" id="codigo" name="codigo" type="text" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Nombre*</label>
                                                <input class="form-control" id="nombre" name="nombre" type="text" required>
                                            </div>
                                            <div class="category">* Campo Requerido</div>
                                            <div class="card-footer border-white bg-white text-right">
                                                <button type="submit" class="btn btn-primary btn-fill btn-wd">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        <br />
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <div class="dropdown">
                                <i class="fa fa-list"></i> Lista de zonas registradas
                                <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Exportar
                                </button>
                                <div class="dropdown-menu" id="MenuHerramientaZona" aria-labelledby="MenuHerramienta">

                                </div>
                            </div>
                        </h3>
                    </div>
                    <?php
                    if (count($Zona) > 0) {
                    ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablazona" class="table table-striped ">
                                    <thead class="bg-success text-white">
                                        <tr>
                                            <th>Id</th>
                                            <th>Divipol</th>
                                            <th>numero</th>
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($Zona as $Zona) {
                                            $id = $Zona->idDivipol;
                                            $Nombre = DivipolData::GetById($id);
                                        ?>
                                            <tr>
                                                <td><?php echo $Zona->id; ?></td>
                                                <td><?php echo $Nombre->nombre ?></td>
                                                <td><?php echo $Zona->numero; ?></td>
                                                <td><?php echo $Zona->codigo ?></td>
                                                <td><?php echo $Zona->nombre ?></td>
                                                <td style="width:100px;">
                                                    <a href="#" data-target="#modalzona" data-id="<?php echo $Zona->id; ?>" data-toggle="modal" class="openmodalzona btn btn-success btn-circle btn-sm" title="Ver" data-placement="top"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="#" data-id="<?php echo $Zona->id ?>,<?php echo $Zona->nombre; ?>" class="btndelzona btn btn-danger btn-circle btn-sm" title="Borrar" data-toggle="tooltip" data-placement="top" data-method="DELETE" onclick="Alert('btndelzona','la zona','./?action=delzona&id=<?php echo $Zona->id; ?>');"><i class="fa fa-trash"></i></a>
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
                                <b>No hay zonas registradas</b>
                            </span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--VENTANA MODAL DE ZONA-->
    <div id="modalzona" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="fa fa-address-card"></i> Datos zona</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
</section>