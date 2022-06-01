<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12">
        <div class="breadcrumb-holder">
          <h1 class="main-title float-left">Dashboard</h1>
          <ol class="breadcrumb float-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <!-- end row -->
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-info">
          <i class="fa fa-id-card-o float-right text-white"></i>
          <h6 class="text-white text-uppercase m-b-20">Registros</h6>
          <h1 id="NumTotalRegistro" class="m-b-20 text-white counter ">
            <?php
             $Registro = RegistroVotanteData::GetAll();
              if(count($Registro)>=0){
                  echo count($Registro);
                 }
              ?></h1>
          <span class="text-white">Total</span>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-success">
          <i class="fa fa-user-o float-right text-white"></i>
          <h6 class="text-white text-uppercase m-b-20 ">Sufragantes</h6>
          <h1 id="NumTotalVotante" class="m-b-20 text-white counter">
            <?php
            $votante = VotanteData::GetAll();
                    if(count($votante)>=0){
                      echo count($votante);
                    }
                ?></h1>
          <span class="text-white">Total</span>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-warning">
          <i class="fas fa-users float-right text-white"></i>
          <h6 class="text-white text-uppercase m-b-20">Lideres</h6>
          <h1 id="NumTotalLider" class="m-b-20 text-white counter">
            <?php
            $usuario = UsuarioData::GetTypeUser();
              if(count($usuario)>=0){
                  echo count($usuario);
               }
                ?>
          </h1>
          <span class="text-white">Total</span>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-danger">
          <i class="fas fa-paperclip float-right text-white"></i>
          <h6 class="text-white text-uppercase m-b-20">Anexos</h6>
          <h1 id="NumTotalAnexo" class="m-b-20 text-white counter">
          <?php
             $ContVo = AnexoUsuarioData::GetAll();
             $ContUser = AnexoVotanteData::GetAll();
              if(count($ContVo)>=0 && count($ContUser)>=0){
                  $Res = count($ContVo+$ContUser);
                  echo ($Res);
               }
                ?>
          </h1>
          <span class="text-white">Total</span>
        </div>
      </div>

    </div>
    <!-- end row -->



    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
          <div class="card-header">
            <h3><i class="fa fa-bar-chart-o"></i> Top lideres</h3>
            Listado generales de lideres con mas inscripciones realizadas
          </div>
          <div class="card-body">
          <?php $Rk = SpData::GetRankingLider(); ?>
            <div class="table-responsive">
              <table id="tablatoplider" class="table table-striped ">
                <thead class="bg-primary text-white">
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                      foreach($Rk as $Rk){				    
                  ?>
                  <tr>
                    <td><?php echo $Rk->noDocumento; ?></td>
                    <td><?php echo $Rk->nombre.' '.$Rk->apellido; ?></td>
                    <td><?php echo $Rk->cantidad; ?></td>
                  </tr>
                  <?php
                      }					    
                    ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Actualizado <?php echo date("d-m-Y (H:i:A)")?></div>
        </div><!-- end card-->
      </div>
    </div>
    <!-- end row -->
  </div>
</section>
