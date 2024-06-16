<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} // Iniciar la sesión si no existe

require_once 'secciones/encabezado.php' ;
require_once 'secciones/seccionSuperior.php' ;
require_once 'secciones/menu_lateral.php';
require_once 'funciones/funciones_auxiliares.php'; 
if (empty($_SESSION)) {
    header('Location: login.php');
    exit;
}

$nivelUsuario = $_SESSION['usuario']['NIVEL']; 
$viajes = isset($_SESSION['viajes']) ? $_SESSION['viajes'] : [];


date_default_timezone_set("America/Argentina/Cordoba");

?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lista de viajes registrados</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Viajes</li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Viajes cargados</h5>

                        <!-- Default Table -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fecha Viaje</th>
                                    <th scope="col">Destino</th>
                                    <th scope="col">Camión</th>
                                    <th scope="col">Chofer</th>
                                    <?php if ($nivelUsuario != '3') { ?>
                                        <th scope="col">Costo Viaje</th>
                                    <?php } ?>
                                    <?php if ($nivelUsuario != '2') { ?>
                                        <th scope="col">Monto Chofer</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($viajes)) { ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No posee viajes asignados.</td>
                                    </tr>
                                <?php } else { ?>
                                    <?php foreach ($viajes as $index => $viaje) { 
                                        $claseFila = obtenerClaseFila($viaje['fechaViaje']);
                                        $tooltipMensaje = obtenerMensajeTooltip($viaje['fechaViaje']);
                                    ?>
                                        <tr class="<?php echo $claseFila; ?>" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="<?php echo $tooltipMensaje; ?>">
                                            <th scope="row"><?php echo $index + 1; ?></th>
                                            <td><?php echo formatearFecha($viaje['fechaViaje']); ?></td>
                                            <td><?php echo $viaje['denominacion']; ?></td>
                                            <td><?php echo $viaje['marca'] . ' - ' . $viaje['modelo'] . ' - ' . $viaje['patente']; ?></td>
                                            <td><?php echo $viaje['apellido'] . ', ' . $viaje['nombre']; ?></td>
                                            <?php if ($nivelUsuario != '3') { ?>
                                                <td><?php echo '$ ' . number_format($viaje['costo'], 2); ?></td>
                                            <?php } ?>
                                            <?php if ($nivelUsuario != '2') { ?>
                                                <td><?php echo mostrarMontoChofer($viaje['costo'], $viaje['porcentajeChofer'], $nivelUsuario); ?></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Default Table -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<?php require_once 'secciones/pie.php'; ?>