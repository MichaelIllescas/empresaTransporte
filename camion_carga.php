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
      <h1>Registrar un nuevo transporte</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Transportes</li>
          <li class="breadcrumb-item active">Carga Camión</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Ingresa los datos</h5>
                  <?php include "funciones/registrarCamion.php"?>
            

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

                  <form class="row g-3" method="POST">
                  <div class="col-12">
        <label for="selector" class="form-label">Marca (*)</label>
        <select class="form-select" aria-label="Selector" id="selector" name="marca">
    <option value="">Selecciona una opción</option>
    <?php
    if (isset($_SESSION['marcas'])) { // Verificar si la variable de sesión 'marcas' está definida
        foreach ($_SESSION['marcas'] as $marca) { // Iterar sobre cada marca en la variable de sesión
            // Crear un <option> para cada marca y marcarla como seleccionada si coincide con el valor enviado por POST
            echo '<option value="' . htmlspecialchars($marca) . '" ' . ((isset($_POST['marca']) && $_POST['marca'] == $marca) ? 'selected' : '') . '>' . htmlspecialchars($marca) . '</option>';
        }
    }
    ?>
</select>

    </div>
                    <div class="col-12">
                        <label for="modelo" class="form-label">Modelo (*)</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo !empty($_POST['modelo']) ? $_POST['modelo'] : ''; ?>">
                    </div>

                    <div class="col-12">
                        <label for="año" class="form-label">Año</label>
                        <input type="text" class="form-control" id="anio" name ="anio" value="<?php echo !empty($_POST['anio']) ? $_POST['anio'] : ''; ?>">
                    </div>
                    
                    <div class="col-12">
                        <label for="patente" class="form-label">Patente (*)</label>
                        <input type="text" class="form-control" id="patente" name ="patente" value="<?php echo !empty($_POST['patente']) ? $_POST['patente'] : ''; ?>">
                    </div>
     
                    <div class="col-12">
                        <label class="form-label">Disponibilidad</label>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="gridCheck1" name="habilitado" value="1" <?php echo isset($_POST['habilitado']) ? 'checked' : ''; ?>>
                          <label class="form-check-label" for="gridCheck1"> Habilitado</label>
                        </div>
                    </div>
                    

                    <div class="text-center">
                        <button class="btn btn-primary" name="registrar">Registrar</button>
                        <button type="reset" class="btn btn-secondary" name="limpiar">Limpiar Campos</button>
                        <a href="index.php" class="text-primary fw-bold">Volver al index</a>
                    </div>
                  </form><!-- Vertical Form -->

              </div>
            </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->













<?php require_once 'secciones/pie.php';?>