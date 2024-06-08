<?php
require_once 'conexion.php';

function obtenerDescripcionNivel($id) {
    // Conexión a la base de datos
    $conexion = ConexionBD();
    
    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    
    // Asegúrate de que $id sea un número entero para evitar inyecciones SQL
    $id = (int)$id;
    
    // Consulta SQL para obtener la descripción
    $sql = "SELECT descripcion FROM nivel WHERE id = $id";
    
    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);
    
    // Verificar si se obtuvo un resultado
    if ($resultado) {
        if (mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            // Retornar la descripción
            return $fila['descripcion'];
        } else {
            return "No se encontró una descripción para el nivel con ID $id";
        }
    } else {
        return "Error en la consulta SQL: " . mysqli_error($conexion);
    }
}


?>
