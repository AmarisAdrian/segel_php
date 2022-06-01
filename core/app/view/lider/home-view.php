<?php
if(isset($_SESSION)){
 $NoDocumento =  $_SESSION['noDocumento']; 
 $Usuario = UsuarioData::GetByDocumento($NoDocumento);
 $Reg = VotanteData::GetUserById($Usuario->id);
 $RegV = SpData::GetAllVotanteInscritoByUsuario($Usuario->id);
 ?>
<section>
  <div class="container-fluid">
    <!---COMIENZO HEADER-->
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
    <!---FIN HEADER-->
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card-box noradius noborder bg-success">
          <i class="fa fa-id-card-o float-right text-white"></i>
          <h6 class="text-white text-uppercase m-b-20">Tus votantes</h6>
          <h1 id="NumTotalRegistro" class="m-b-20 text-white counter ">
            <?php
             if($Reg>=0){ echo count($Reg); } ?>
          </h1>
          <span class="text-white">Total</span>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card-box noradius noborder bg-info">
          <i class="fas fa-users float-right text-white"></i>
          <h6 class="text-white text-uppercase m-b-20">Asignaciones</h6>
          <h1 class="m-b-20 text-white counter ">
            <?php
              if($RegV>0){ echo count($RegV); }?>
          </h1>
          <span class="text-white">Total</span>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card-box noradius noborder bg-danger">
          <i class="fa fa-list-alt float-right text-white"></i>
          <h6 class="text-white text-uppercase m-b-20">Registros</h6>
          <h1  class="m-b-20 text-white counter ">
            <?php
               //   if($Reg>=0){ echo count($Reg); } ?>
          </h1>
          <span class="text-white">Total</span>
        </div>
      </div>
    </div>
    <section>
      <?php }
         else{

         }
  ?>
    </section>
  </div>
</section>
