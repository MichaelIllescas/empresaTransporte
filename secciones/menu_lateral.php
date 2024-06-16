<?php
require_once 'funciones/menuNiveles.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">


  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="index.php">
        <i class="bi bi-grid"></i>
        <span>Panel</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item  <?php echo ($_SESSION["usuario"]["NIVEL"] == 1 || $_SESSION["usuario"]["NIVEL"] == 2) ? "" : "d-none"; ?>">
             
   
      <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-truck"></i><span>Transporte</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <?php echo ($_SESSION["usuario"]["NIVEL"] == 1 || $_SESSION["usuario"]["NIVEL"] == 2) ? cargarCamion  () : ""; ?>
        <?php echo ($_SESSION["usuario"]["NIVEL"] == 1) ? cargarChofer() : ""; ?>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-globe2"></i><span>Viajes</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

        <?php echo ($_SESSION["usuario"]["NIVEL"] == 1 || $_SESSION["usuario"]["NIVEL"] == 2) ? cargarViaje() : ""; ?>


        <?php echo listadoViajes(); ?>
      </ul>
    </li>
  </ul>

</aside><!-- End Sidebar-->