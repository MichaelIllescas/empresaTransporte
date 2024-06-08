<?php
session_start();
require_once "conexion.php"; // Asegúrate de que este archivo contiene la función ConexionBD

$conexion = ConexionBD();

if (isset($_POST["user"]) && isset($_POST["clave"])) {
    $user = mysqli_real_escape_string($conexion, $_POST["user"]);
    $clave = mysqli_real_escape_string($conexion, $_POST["clave"]);

    // Consulta para verificar el usuario y la clave
    $SQL = "SELECT * FROM usuarios WHERE usuario = '$user' AND clave = '$clave'";
    $rs = mysqli_query($conexion, $SQL);

    // Verificar si la consulta devolvió resultados
    if ($rs) {
        if (mysqli_num_rows($rs) > 0) {
            $data = mysqli_fetch_array($rs, MYSQLI_ASSOC);

            // Asignar valores a la sesión
            $_SESSION["usuario"] = array(
                "ID" => $data["id"],
                "NOMBRE" => $data["nombre"],
                "APELLIDO" => $data["apellido"],
                "NIVEL" => $data["idNivel"],
                "IMAGEN" => $data["imagen"]
            );

            // Redireccionar al index
            header("Location: ../index.php");
            exit;
        } else {
            // Redireccionar al login si las credenciales son incorrectas
            header("Location: ../login.php?error=1");
            exit;
        }
    } else {
        // Error en la consulta
        echo "Error en la consulta SQL: " . mysqli_error($conexion);
        exit;
    }
} else {
    // Redireccionar al login si no se proporcionaron datos
    header("Location: ../login.php?error=1");
    exit;
}
?>
