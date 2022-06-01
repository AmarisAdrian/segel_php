 <?php $Usuario = UsuarioData::GetByDocumento($_SESSION['noDocumento']); ?>
 <div class="main" id="main">
    <!-- top bar navigation -->
    <div class="headerbar">
      <!-- LOGO -->
      <div class="headerbar-left">
        <a href="?view=home" class="logo"><img alt="Logo" src="./content/img/icon/apple-icon-76x76.png"/> <span><b>SEGEL</b></span></a>
      </div>
      <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
          <li class="list-inline-item dropdown notif">
            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">
              <img src="./content/img/other/admin.png" alt="Profile image" class="avatar-rounded">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
              <!-- item-->
              <div class="dropdown-item noti-title">
                <h5 class="text-overflow"><small>Hola <?php echo $Usuario->nombre.' '.$Usuario->apellido; ?></small> </h5>
              </div>
              <!-- item-->
              <a href="?view=profile" method="POST" value="<?php echo $Usuario->noDocumento; ?>" class="dropdown-item notify-item">
                <i class="fa fa-user"></i> <span>Perfil</span>
              </a>
              <!-- item-->
              <a href="./?action=destroysession" class="dropdown-item notify-item">
                <i class="fa fa-power-off"></i> <span>Cerrar sesión</span>
              </a>
            </div>
          </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
          <li class="float-left">
            <button class="button-menu-mobile open-left">
              <i class="fa fa-fw fa-bars"></i>
            </button>
          </li>
        </ul>
      </nav>
    </div>
    <!-- End Navigation -->
    <!-- Left Sidebar -->
    <div class="left main-sidebar">
      <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
          <ul>
            <li class="submenu">
              <a class="active" href="?view=home"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
            </li>
            <li class="submenu">
              <a href="#"><i class="fa fa-fw far fa-address-card"></i> <span>Inscripciones</span><span class="menu-arrow"></span> </a>
              <ul class="list-unstyled">
              <li><a href="?view=consultarvotante">Consultar votante</a></li>
                <li><a href="?view=votante">Registrar sufragante</a></li>
                <li><a href="?view=inscripcion">Lista de inscripciones</a></li>
              </ul>
            </li>
            <li class="submenu">
              <a href="#"><i class="fas fa-database"></i><span> Registros de votos</span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">
                <li><a href="?view=vistageneral">Vista de votos</a></li>
                <li><a href="?view=estadistica">Estadisticas</a></li>
              </ul>
            </li>
            <li class="submenu">
              <a href="#"><i class="fas fa-map-marked"></i> <span>Divipol</span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">
                <li><a href="?view=divipol">Divipol</a></li>          
                <li><a href="?view=zona">Zonas</a></li>
                <li><a href="?view=puestovotacion">Gestión puestos de votación</a></li> 
                <li><a href="?view=puesto_votacion">Listado puestos de votación </a></li> 
              </ul>
            </li>
            <li class="submenu">
              <a href="#"><i class="fas fa-paperclip"></i> <span>Anexos</span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">
                <li><a href="?view=anexousuario">Anexos usuarios</a></li>
                <li><a href="?view=anexovotante">Anexos votantes</a></li>
              </ul>
            </li>
            <li class="submenu">
              <a href="#"><i class="fa fa-fw fa-th"></i> <span> Logistica </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">
                <li><a href="#">Star Rating</a></li>
              </ul>
            </li>
            <li class="submenu">
              <a href="#"><i class="fas fa-check"></i> <span>Pendientes</span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">
                <li><a href="?view=aprobacion">Aprobaciones </a></li>
              </ul>
            </li>
          <li class="submenu">
              <a href="#"><i class="fa fa-fw fas fa-cog"></i> <span>Configuracion</span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">
                <li><a href="?view=ciudad">Ciudades </a></li>
                <li><a href="?view=departamento">Departamentos</a></li>
              </ul>
            </li>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->
    <div class="content-page bg-light">
      <!-- Start content -->
      <div class="content">   
      <div class="push"></div>
        <?php 
        View::load($Usuario->idTipoUsuario,"index"); ?>
      </div>
      <!-- END content -->
      </div>
    <!-- END content-page -->
    <footer class="footer">
      <span class="text-right">
        Copyright <a target="_blank" href="#">SEGEL</a>
      </span>
      <span class="float-right">
        Powered by <a target="_blank" href="https://www.crabs.co"><b>Crabs</b></a>
      </span>
    </footer>
   </div>
</div>
