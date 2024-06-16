<?php 
 session_start();

 if (empty($_SESSION)){
 header('Location: login.php');

 }
 require_once 'secciones/encabezado.php' ;
 require_once 'secciones/seccionSuperior.php' ;
 require_once 'secciones/menu_lateral.php';



?>

<main id="main" class="main">




<div class="pagetitle">
  <h1>Bienvenid@ <?php echo ucfirst($_SESSION["usuario"]["NOMBRE"])." ".ucfirst($_SESSION["usuario"]["APELLIDO"]);?>!!</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Customers Card -->
        <div class="col-xxl-12 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Jonathan Illescas está trabajando en el segundo desempeño. <span>| Pe ta cu lar!</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <span class="text-danger small pt-1 fw-bold">Puedes seleccionar el menu de la izquierda</span>

                </div>
              </div>
            </div>
          </div>

        </div><!-- End Customers Card -->

      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

</main><!-- End #main -->




<?php
 require_once 'secciones/pie.php'
?>