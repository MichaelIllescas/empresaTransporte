<?php
require_once "funciones/conexion.php";
require_once "funciones/validacionesCamion.php";

$conexion = ConexionBD();

if (isset($_POST["registrar"])) {
    if (strlen($_POST["marca"]) > 0 && strlen($_POST["anio"]) > 0 && strlen($_POST["patente"]) > 0) {

        $mensaje = Validar_Datos();

        if (empty($mensaje)) {
            $marca = trim($_POST["marca"]);
            $modelo = trim($_POST["modelo"]);
            $anio = trim($_POST["anio"]);
            $patente = trim($_POST["patente"]);
            if(!empty($_POST["habilitado"])){
                $habilitado = trim($_POST["habilitado"]);
            
            }else{
                $habilitado=0;
            }
            $fechaRegistro = date("Y-m-d");

            // Verificar si la marca y modelo ya existen
            $stmt = $conexion->prepare("SELECT id FROM marcas WHERE marca = ? AND modelo = ?");
            $stmt->bind_param("ss", $marca, $modelo);
            $stmt->execute();
            $stmt->store_result();  

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($idMarca);
                $stmt->fetch();
            } else {
                // Insertar nueva marca y modelo
                $stmt = $conexion->prepare("INSERT INTO marcas (marca, modelo) VALUES (?, ?)");
                $stmt->bind_param("ss", $marca, $modelo);
                if ($stmt->execute()) {
                    $idMarca = $stmt->insert_id;
                } else {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-1"></i>
                        Error al guardar la marca y el modelo: <?php echo $conexion->error; ?>
                    </div>
                    <?php
                    exit;
                }
            }
            $stmt->close();

            // Insertar datos en la tabla camiones
            $stmt = $conexion->prepare("INSERT INTO camiones (idMarca, anio, patente, disponibilidad, fechaRegistro) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $idMarca, $anio, $patente, $habilitado, $fechaRegistro);

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

if (isset($_POST["limpiar"])) {
    $_POST = array();
}
?>
