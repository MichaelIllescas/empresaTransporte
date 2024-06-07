<?php

require_once 'conexion.php';

$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$baseDeDatos = 'app_php';

$conexion = conectarBaseDeDatos($host, $usuario, $contraseña, $baseDeDatos);

function insertarChofer($conexion, $apellido, $nombre, $dni, $usuarioBD, $clave, $activo,  $imagen, $idNnivel) {
    if ($conexion !== false && $conexion instanceof mysqli) {
        // Consulta de inserción con los valores proporcionados
        $SQL_Insert = "INSERT INTO usuarios (apellido, nombre, dni, usuario, clave, activo,  imagen, idNivel) 
                       VALUES ('$apellido', '$nombre', '$dni', '$usuarioBD', '$clave', '$activo', '$imagen', '$idNnivel')";
        
        // Procedo a ejecutar la consulta con la conexión generada al principio
        if (!mysqli_query($conexion, $SQL_Insert)) {
            // Si surge un error, finalizo la ejecución del script con un mensaje
            die('<h4>Error al intentar insertar el registro de usuario: ' . mysqli_error($conexion) . '</h4>');
        }
        // Si todo va bien, muestro mensaje
        echo '<h4>Usuario: Registro insertado correctamente.</h4>';
        header('Location: ../index.php');
        
    } else {
        // Si la conexión falla
        echo '<h3>Hubo algún error al intentar conectarse...</h3>';
    }
}

?>