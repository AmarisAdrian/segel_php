<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="breadcrumb-holder">
          <h1 class="main-title float-left">Informacion de sufragios</h1>
          <ol class="breadcrumb float-right">
            <li class="breadcrumb-item"><a href="?view=home">Home</a></li>
            <li class="breadcrumb-item active">
              <a href="?view=inscripcion">Registro de votos</a>
            </li>
            <li class="breadcrumb-item active">vista general</li>
          </ol>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <?php $Datos = SpData::GetEstadisticasByPuesto(); ?>
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h3>
              <div class="dropdown">
                <i class="fa fa-list"></i> Estadisticas de sufragios
                <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Exportar
                </button>
                <div class="dropdown-menu" id="MenuHerramientaEstadisticas" aria-labelledby="MenuHerramientaEstadisticas">
                </div>
              </div>
            </h3>
          </div>
          <?php if (count($Datos) > 0) { ?>
            <div class="card-body">
              <table id="tablaestadisticas" class="table table-responsive table table-striped ">
                <thead class=" bg-primary text-white">
                  <tr>
                    <th>Zona</th>
                    <th>Nombre</th>
                    <th>Votos</th>
                    <th>Potencial</th>
                    <th>Diferencia</th>
                    <th>Porcentaje</th>
                    <th>Listado</th>
                  </tr>
                </thead>
                <?php
                foreach ($Datos as $Datos) {
                  $Porcentaje = ($Datos->cantidad * 100) / $Datos->potencial;
                  $Diferencia = (100 - $Porcentaje); ?>
                  <tbody>
                    <td><?php echo $Datos->zona; ?></td>
                    <td><?php echo $Datos->nombre; ?></td>
                    <td><?php echo $Datos->cantidad; ?></td>
                    <td><?php echo $Datos->potencial; ?></td>
                    <td><?php echo $Datos->diferencia; ?></td>
                    <td>
                      <div class="progress">
                        <div class=" progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?php echo $Porcentaje; ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="<?php echo $Datos->potencial; ?>"><?php echo $Porcentaje; ?>%</div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?php echo $Diferencia; ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="<?php echo $Datos->potencial; ?>">- <?php echo number_format($Diferencia, 2); ?>%</div>
                      </div>
                    </td>
                    <td><a href="#" data-target="#modal_lista" data-id="<?php echo $Datos->idPuesto; ?>" data-toggle="modal" class="openmodal_lista btn btn-success btn-circle btn-sm" title="Ver" data-placement="top"> <i class="fa fa-eye" aria-hidden="true"></i></a></td>
                  </tbody>
                <?php }
              } else { ?>
                <div class="alert alert-danger">
                  <span>
                    <b>No hay datos para visualizar</b>
                  </span>
                </div>
              <?php } ?>
              </table>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--VENTANA MODAL VERIFICAR LISTA-->
  <div id="modal_lista" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-light"><i class="fa fa-list" aria-hidden="true"></i></a> Listado de inscripciones del puesto</h5>
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