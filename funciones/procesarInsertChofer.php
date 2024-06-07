<?php

require_once 'insertarChofer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $usuarioBD = $_POST['usuario'];
    $clave = $_POST['clave'];
    $activo = 'activo';

        $imagen ='imagen';
    $nivel = 2;

    $host = 'localhost';
    $usuario = 'root';
    $contraseña = '';
    $baseDeDatos = 'app_php';

    $conexion = conectarBaseDeDatos($host, $usuario, $contraseña, $baseDeDatos); // Asegúrate de obtener la conexión aquí
    insertarChofer($conexion, $apellido, $nombre, $dni, $usuarioBD, $clave, $activo, $imagen, $nivel);
}

?>
