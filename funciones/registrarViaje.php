<?php

require_once "funciones/conexion.php";
require_once "funciones/validarCargaViaje.php";

$conexion = ConexionBD();

$mensaje = "";

// Verificar si se envió el formulario
if (isset($_POST['registrar'])) {
    if (strlen($_POST["fecha"]) > 0 && strlen($_POST["costo"]) > 0 && strlen($_POST["porcentajeChofer"]) > 0) {
        $mensaje = Validar_Datos();

        // Si no hay mensajes de error de validación, proceder con la inserción
        if (empty($mensaje)) {
            // Obtener los datos del formulario
            $idChofer = $_POST['chofer']; 
            $idDestino = $_POST['destino']; 
            $idCamion = $_POST['transporte']; 
            $costo = $_POST['costo'];
            $porcentajeChofer = $_POST['porcentajeChofer'];
            $fechaViaje = $_POST['fecha'];
            $idUsuario= $_SESSION['usuario']['ID'];
            $fechaRegistro= date("Y-m-d");
            
            $sql = "INSERT INTO viajes (idChofer, idDestino, idCamion, costo, porcentajeChofer, fechaViaje, idUsuario, fechaRegistro)
                    VALUES ('$idChofer', '$idDestino', '$idCamion', '$costo', '$porcentajeChofer', '$fechaViaje', '$idUsuario', '$fechaRegistro')";

            if ($conexion->query($sql) === TRUE) {
                // Mostrar mensaje de éxito y limpiar los datos del formulario
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    ¡Los datos se guardaron correctamente!
                </div>
                <?php
                 $_POST = array();
              
            } else {
                // Mostrar mensaje de error de la base de datos
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Error al guardar los datos: <?php echo $conexion->error; ?>
                </div>
                <?php
            }
        } else {
            // Mostrar mensajes de error de validación
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle me-1"></i>
                <?php echo $mensaje; ?>
            </div>
            <?php
        }
    } else {
        // Mostrar aviso sobre campos requeridos
        ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle me-1"></i>
            Los campos indicados con (*) son requeridos.
        </div>
        <?php
    }
}

// Si se presionó el botón Limpiar, limpiara los datos del formulario
if (isset($_POST["limpiar"])) {
    $_POST = array(); // Limpiar el arreglo POST
}

?>
