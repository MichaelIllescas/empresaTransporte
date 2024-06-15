<?php require_once 'encabezado.php' ;
 require_once 'seccionSuperior.php' ;
 require_once 'menu_lateral.php';
  
 if (session_status() == PHP_SESSION_NONE) {
  session_start();
}// Iniciar la sesión si es q no exite

?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Registrar un nuevo viaje</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Viajes</li>
          <li class="breadcrumb-item active">Carga</li>
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
<!--
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Mensajes de Alerta por validaciones
                </div>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    Los datos se guardaron correctamente! 
                </div>
-->
                <form class="row g-3">
                    <div class="col-12">
                        <label for="selector" class="form-label">Chofer (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector">
                            <option selected>Selecciona una opción</option>
                            <?php
                            // Verificar si la variable de sesión 'usuarios' está definida y no está vacía
                            if (isset($_SESSION['usuarios']) && !empty($_SESSION['usuarios'])) {
                                // Recorrer la variable de sesión 'usuarios'
                                foreach ($_SESSION['usuarios'] as $usuario) {
                                    // Imprimir una opción para cada usuario en el formato requerido
                                    echo '<option>' . $usuario['apellido'] . ', ' . $usuario['nombre'] . ' (DNI ' . $usuario['dni'] . ')</option>';
                                }
                            }
                            ?>
                         </select> 

                    </div>
                    <div class="col-12">
                        <label for="selector" class="form-label">Transporte (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector">
                            <option selected>Selecciona una opción</option>
                        <?php
                        // Verificar si la variable de sesión 'marcas' está definida y no está vacía
                        if (isset($_SESSION['marcas']) && !empty($_SESSION['marcas'])) {
                            // Recorrer la variable de sesión 'marcas'
                            foreach ($_SESSION['marcas'] as $marca) {
                                // Imprimir una opción para cada marca en el formato requerido
                                echo '<option>' . $marca['marca'] . ' - ' . $marca['modelo'] . ' - ' . $marca['patente'] . '</option>';
                            }
                        }
                        ?>
                    </select>

                    </div>
                    
                    <div class="col-12">
                        <label for="fecha" class="form-label">Fecha programada (*)</label>
                        <input type="date" class="form-control" id="fecha">
                    </div>
                    <div class="col-12">
                        <label for="selector" class="form-label">Destino (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector">
                             <option selected>Selecciona una opción</option>
                        <?php
                          // Verificar si la variable de sesión 'destinos' está definida y no está vacía
                          if (isset($_SESSION['destinos']) && !empty($_SESSION['destinos'])) {
                          // Recorrer la variable de sesión 'destinos'
                          foreach ($_SESSION['destinos'] as $destino) {
                          // Imprimir una opción para cada destino en el formato requerido
                          echo '<option>' . $destino['denominacion'] . '</option>';
                          }   
                        }
                        ?>
                          </select>

                    </div>
                    <div class="col-12">
                        <label for="costo" class="form-label">Costo (*)</label>
                        <input type="text" class="form-control" id="costo">
                    </div>
                    <div class="col-12">
                        <label for="porc" class="form-label">Porcentaje chofer (*)</label>
                        <input type="text" class="form-control" id="porc">
                    </div>



                    

                    <div class="text-center">
                        <button class="btn btn-primary">Registrar</button>
                        <button type="reset" class="btn btn-secondary">Limpiar Campos</button>
                        <a href="index.php" class="text-primary fw-bold">Volver al index</a>
                    </div>
                </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->


<?php
 require_once 'pie.php'
?>