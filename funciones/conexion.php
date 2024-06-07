<?php
// Función para establecer conexión a la base de datos
function ConexionBD() {
    // Configuración de conexión
    $host = 'localhost';
    $usuario = 'root';
    $contraseña = '';
    $baseDeDatos = 'app_php';

    // Conexión a la base de datos
    $conexion = mysqli_connect($host, $usuario, $contraseña, $baseDeDatos);

    // Verificar conexión
    if (!$conexion) {
        die('Error de conexión: ' . mysqli_connect_error());
    }

    return $conexion;
}
?>
