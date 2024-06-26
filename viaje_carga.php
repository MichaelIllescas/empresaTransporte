<?php  
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}// Iniciar la sesión si es q no exite

require_once 'secciones/encabezado.php' ;
require_once 'secciones/seccionSuperior.php' ;
require_once 'secciones/menu_lateral.php';

if (empty($_SESSION)){
header('Location: login.php');

}

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
                <?php include "funciones/registrarViaje.php"?>

                <div class="alert alert-info alert-dismissible fade d-none" role="alert">
                    <i class="bi bi-info-circle me-1"></i>
                    Los campos indicados con (*) son requeridos
                </div>
                <form class="row g-3" method="POST">
    <div class="col-12">
        <label for="chofer" class="form-label">Chofer (*)</label>
        <select class="form-select" aria-label="Selector" id="chofer" name="chofer">
            <option selected>Selecciona una opción</option>
            <?php
            // Verificar si la variable de sesión 'usuarios' está definida y no está vacía
            if (isset($_SESSION['usuarios']) && !empty($_SESSION['usuarios'])) {
                // Recorrer la variable de sesión 'usuarios'
                foreach ($_SESSION['usuarios'] as $usuario) {
                    // Obtener el valor seleccionado si es el mismo que se envió por POST
                    $selected = ($_POST['chofer'] == $usuario['id']) ? 'selected' : '';
                    // Imprimir una opción para cada usuario en el formato requerido
                    echo '<option value="' . $usuario['id'] . '" ' . $selected . '>' . $usuario['apellido'] . ', ' . $usuario['nombre'] . ' (DNI ' . $usuario['dni'] . ')</option>';
                }
            }
            ?>
        </select>
    </div>
    <div class="col-12">
        <label for="transporte" class="form-label">Transporte (*)</label>
        <select class="form-select" aria-label="Selector" id="transporte" name="transporte">
            <option selected>Selecciona una opción</option>
            <?php
            // Verificar si la variable de sesión 'marcas' está definida y no está vacía
            if (isset($_SESSION['marcas']) && !empty($_SESSION['marcas'])) {
                // Recorrer la variable de sesión 'marcas'
                foreach ($_SESSION['marcas'] as $marca) {
                    // Obtener el valor seleccionado si es el mismo que se envió por POST
                    $selected = ($_POST['transporte'] == $marca['id']) ? 'selected' : '';
                    // Imprimir una opción para cada marca en el formato requerido
                    echo '<option value="' . $marca['id'] . '" ' . $selected . '>' . $marca['marca'] . ' - ' . $marca['modelo'] . ' - ' . $marca['patente'] . '</option>';
                }
            }
            ?>
        </select>
    </div>

    <div class="col-12">
        <label for="fecha" class="form-label">Fecha programada (*)</label>
        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo isset($_POST['fecha']) ? $_POST['fecha'] : ''; ?>">
    </div>
    <div class="col-12">
        <label for="destino" class="form-label">Destino (*)</label>
        <select class="form-select" aria-label="Selector" id="destino" name="destino">
            <option selected>Selecciona una opción</option>
            <?php
            // Verificar si la variable de sesión 'destinos' está definida y no está vacía
            if (isset($_SESSION['destinos']) && !empty($_SESSION['destinos'])) {
                // Recorrer la variable de sesión 'destinos'
                foreach ($_SESSION['destinos'] as $destino) {
                    // Obtener el valor seleccionado si es el mismo que se envió por POST
                    $selected = ($_POST['destino'] == $destino['id']) ? 'selected' : '';
                    // Imprimir una opción para cada destino en el formato requerido
                    echo '<option value="' . $destino['id'] . '" ' . $selected . '>' . $destino['denominacion'] . '</option>';
                }
            }
            ?>
        </select>
    </div>
    <div class="col-12">
        <label for="costo" class="form-label">Costo (*)</label>
        <input type="text" class="form-control" id="costo" name="costo" value="<?php echo isset($_POST['costo']) ? $_POST['costo'] : ''; ?>">
    </div>
    <div class="col-12">
        <label for="porc" class="form-label">Porcentaje chofer (*)</label>
        <input type="text" class="form-control" id="porc" name="porcentajeChofer" value="<?php echo isset($_POST['porcentajeChofer']) ? $_POST['porcentajeChofer'] : ''; ?>">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
        <button type="reset" class="btn btn-secondary" name="limpiar">Limpiar Campos</button>
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
 require_once 'secciones/pie.php'
?>