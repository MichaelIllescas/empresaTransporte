<?php
require_once "funciones/conexion.php";
require_once "funciones/validacionesChofer.php";

$conexion = ConexionBD();

if (isset($_POST["registrar"])) {
    if (strlen($_POST["nombre"]) > 1 && strlen($_POST["apellido"]) > 1 && strlen($_POST["dni"]) > 1) {

        $mensaje = Validar_Datos();

        if (empty($mensaje)) {
            $nombre = trim($_POST["nombre"]);
            $apellido = trim($_POST["apellido"]);
            $dni = trim($_POST["dni"]);
            $usuario = trim($_POST["usuario"]);
            $clave = trim($_POST["clave"]);
            $fechaRegistro = date("Y-m-d");

            $stmt = $conexion->prepare("INSERT INTO `usuarios` (`nombre`, `apellido`, `dni`, `usuario`, `clave`, `activo`, `idNivel`, `fechaCreacion`, `imagen`) VALUES (?, ?, ?, ?, ?, 1, 3, ?, 'imagen.jpg')");
            $stmt->bind_param("ssssss", $nombre, $apellido, $dni, $usuario, $clave, $fechaRegistro);

            if ($stmt->execute()) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    ¡Los datos se guardaron correctamente!
                </div>
                <?php
                  $_POST = array();
            } else {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Error al guardar los datos: <?php echo $conexion->error; ?>
                </div>
                <?php
            }

            $stmt->close();
        } else {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle me-1"></i>
                <?php echo $mensaje; ?>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle me-1"></i>
            Los campos indicados con (*) son requeridos.
        </div>
        <?php
    }
}


if (isset($_POST["limpiar"])){
    $_POST = array();

    }
?>



