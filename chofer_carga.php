<?php require_once 'encabezado.php' ;
 require_once 'seccionSuperior.php' ;
 require_once 'menu_lateral.php';
  

?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Registrar un nuevo chofer</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
            <?php include "funciones/registrarChofer.php"?>
            


           

            <form class="row g-3" method="POST">
            
            <div class="col-12">
                <label for="Apellido" class="form-label">Apellido (*)</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo !empty($_POST['apellido']) ? $_POST['apellido'] : ''; ?>">
            </div>

            <div class="col-12">
                <label for="Nombre" class="form-label">Nombre (*)</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo !empty($_POST['nombre']) ? $_POST['nombre'] : ''; ?>">
            </div>
            
            <div class="col-12">
                <label for="dni" class="form-label">DNI (*)</label>
                <input type="text" class="form-control" id="dni" name="dni" value="<?php echo !empty($_POST['dni']) ? $_POST['dni'] : ''; ?>">
            </div>
            <div class="col-12">
                <label for="user" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="user" name="usuario" value="<?php echo !empty($_POST['usuario']) ? $_POST['usuario'] : ''; ?>">
            </div>
            <div class="col-12">
                <label for="pass" class="form-label">Clave</label>
                <input type="text" class="form-control" id="pass" name="clave" value="<?php echo !empty($_POST['clave']) ? $_POST['clave'] : ''; ?>">
            </div>

            <div class="text-center">
                <button class="btn btn-primary" name ="registrar">Registrar</button>
                <button  class="btn btn-secondary" name="limpiar">Limpiar Campos</button>
                <a href="index.php" class="text-primary fw-bold">Volver al index</a>
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