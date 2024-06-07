<?php require_once 'encabezado.php' ;
 require_once 'seccionSuperior.php' ;
 require_once 'menu_lateral.php';
  

?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Registrar un nuevo chofer</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Transportes</li>
      <li class="breadcrumb-item active">Carga Chofer</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    
    <div class="col-lg-6">

        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ingresa los datos</h5>
            <div class="alert alert-info alert-dismissible fade d-none" role="alert">
                <i class="bi bi-info-circle me-1"></i>
                Los campos indicados con (*) son requeridos
            </div>

            <div class="alert alert-warning alert-dismissible fade d-none" role="alert">
                <i class="bi bi-exclamation-triangle me-1"></i>
                Mensajes de Alerta por validaciones
            </div>

            <div class="alert alert-success alert-dismissible fade d-none" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                Los datos se guardaron correctamente! 
            </div>

            <form class="row g-3">
            
            <div class="col-12">
                <label for="Apellido" class="form-label">Apellido (*)</label>
                <input type="text" class="form-control" id="apellido">
            </div>

            <div class="col-12">
                <label for="Nombre" class="form-label">Nombre (*)</label>
                <input type="text" class="form-control" id="nombre">
            </div>
            
            <div class="col-12">
                <label for="dni" class="form-label">DNI (*)</label>
                <input type="text" class="form-control" id="dni">
            </div>
            <div class="col-12">
                <label for="user" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="user">
            </div>
            <div class="col-12">
                <label for="pass" class="form-label">Clave</label>
                <input type="text" class="form-control" id="pass">
            </div>

            <div class="text-center">
                <button class="btn btn-primary">Registrar</button>
                <button type="reset" class="btn btn-secondary">Limpiar Campos</button>
                <a href="index.html" class="text-primary fw-bold">Volver al index</a>
            </div>
            </form>

        </div>
        </div>

    </div>

  </div>
</section>

</main><!-- End #main -->











<?php
 require_once 'pie.php'
?>