<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo ConfiguracionData::GetByHandler('titulo')->valor; ?>
  </title>
  <meta name="description" content="SEGEL LOGISTICA ELECTORAL">
  <meta name="author" content="Startup - https://www.crabs.co">
  <meta charset="utf-8" />
  <meta name="robots" content="noindex">
  <meta name="googlebot" content="noindex">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./content/img/icon/apple-icon-60x60.png" />
  <link rel="manifest" href="./content/img/icon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="./content/img/icon/ms-icon-144x144.png">
  <link rel="icon" type="image/png" href="./content/img/icon/apple-icon-57x57.png"/>
  <!-- Bootstrap CSS -->
  <link href="./content/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./content/css/style.css" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.css"/>
  <!-- BEGIN CSS for this page -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"/>                                                
    <script src="https://kit.fontawesome.com/16d736b7fa.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- END CSS for this page -->
</head>
<body class="adminbody" id="adminbody">
  <?php 
   if(isset($_SESSION['noDocumento'])&&($_SESSION['tiempo'])){
      $inactivo = 1200;
      $vida_session = time() - $_SESSION['tiempo'];
      $Usuario = UsuarioData::GetByDocumento($_SESSION['noDocumento']);
      if($vida_session > $inactivo)
      {
        session_unset();
        session_destroy();              
        Core::redir("./?view=home");
        exit();
      }   
      Module::LoadTypeLayout($Usuario->idTipoUsuario);
  }else{?>
<div class="container">
  <div class="row justify-content-center align-items-center minh-100">
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 ">
		<div class="card form-login" id="form-login">
			<div class="card-header  bg-primary text-light">
				<h3>
					<div class="dropdown">
						<i class="fa fa-id-card "></i> Login
					<div>
				</h3>
			</div>
			<div class="card-body">
				<form  accept-charset="UTF-8" class="frmlogin" id="frmlogin"role="form" method="POST" action="./?action=processlogin">
					<fieldset>
						<div class="form-group">
							<input class="form-control" placeholder="Usuario" name="usuario" id="usuario" type="number" required>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Contraseña" name="password" id="password "type="password"
								value="" required>
						</div>
						<input class="btn btn-md btn-primary btn-block" type="submit" id="btnenviar" class="btnenviar" value="Iniciar Sesion">
					</fieldset>
				</form>
      </div>
    </div>
    <div id="MensajeError">
      </div>
	</div>
</div>
</div>
 <?php } ?>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js" integrity="sha256-JG6hsuMjFnQ2spWq0UiaDRJBaarzhFbUxiUTxQDA9Lk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js" integrity="sha256-J2sc79NPV/osLcIpzL3K8uJyAD7T5gaEFKlLDM18oxY=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js" integrity="sha256-CfcERD4Ov4+lKbWbYqXD6aFM9M51gN4GUEtDhkWABMo=" crossorigin="anonymous"></script>    
  <script src="./content/js/ajax-function.js"></script>
  <script src="./content/js/sweetalert2.min.js"></script>
  <script src="./content/js/jquery.min.js"></script>
  <script src="./content/js/modernizr.min.js"></script>
  <script src="./content/js/moment.min.js"></script>
  <script src="./content/js/modal.js"></script>
  <script src="./content/js/select.dinamico.js"></script>
  <script src="./content/js/popper.min.js"></script>
  <script src="./content/js/bootstrap.min.js"></script>
  <script src="./content/js/detect.js"></script>
  <script src="./content/js/fastclick.js"></script>
  <script src="./content/js/jquery.blockUI.js"></script>
  <script src="./content/js/jquery.nicescroll.js"></script>
  <script src="./content/js/action.js"></script>
  <script src="./content/js/datatable.js"></script>
  <!-- App js -->
  <script src="./content/js/pikeadmin.js"></script>
  <!-- BEGIN Java Script for this page -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>
  <!-- Counter-Up-->
  <script src="./content/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
  <script src="./content/plugins/counterup/jquery.counterup.min.js"></script>
  
</body>
</html>