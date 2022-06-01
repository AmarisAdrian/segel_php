<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="breadcrumb-holder">
          <h1 class="main-title float-left">Estadisticas</h1>
          <ol class="breadcrumb float-right">
            <li class="breadcrumb-item"><a href="?view=home">Home</a></li>
            <li class="breadcrumb-item active">
              <a href="?view=inscripcion">Registro de votos</a>
            </li>
            <li class="breadcrumb-item active">Estadisticas</li>
          </ol>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-bar-chart"></i> Datos obtenidos por zonas
          </div>

          <div class="card-body">
            <div class="loader"></div>
            <canvas id="barChartZona"></canvas>
          </div>
          <div class="card-footer small text-muted">
            Actualizado
            <?php echo date("d-m-Y (H:i:A)")?>
          </div>
        </div>
        <!-- end card-->
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-bar-chart"></i> Datos obtenidos por puestos de votacion
          </div>
          <div class="card-body">
            <div class="loader"></div>
            <canvas id="pieChartPuesto"></canvas>
          </div>
          <div class="card-footer small text-muted">
            Actualizado
            <?php echo date("d-m-Y (H:i:A)")?>
          </div>
        </div>
        <!-- end card-->
      </div>
    </div>
  </div>
</section>
