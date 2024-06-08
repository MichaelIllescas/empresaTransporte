<?php
// Función para establecer conexión a la base de datos

function ConexionBD() {
    $host = 'localhost';
    $user = 'root';     
    $password = '';     
    $dbname = 'app_php';

    $conexion = new mysqli($host, $user, $password, $dbname);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    return $conexion;
}
?>
