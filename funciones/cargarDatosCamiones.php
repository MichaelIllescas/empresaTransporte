<?php 
require_once "conexion.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}// Iniciar la sesión si es q no exite


$conexion = ConexionBD(); // Establecer la conexión a la base de datos

// Consulta SQL para obtener todas las marcas únicas de la tabla `marcas`
$query = "SELECT DISTINCT marca FROM marcas ORDER BY marca";
$result = $conexion->query($query); // Ejecutar la consulta

if ($result) { // Comprobar si la consulta se ejecutó correctamente
    $marcas = array(); // Inicializar un array para almacenar las marcas
    while ($row = $result->fetch_assoc()) { // Iterar sobre los resultados de la consulta
        $marcas[] = $row['marca']; // Agregar cada marca al array
    }
    // Almacenar el array de marcas en la variable de sesión
    $_SESSION['marcas'] = $marcas;
} else {
    // Mostrar un mensaje de error si la consulta falló
    echo "Error al obtener las marcas: " . $conexion->error;
}

$conexion->close(); // Cerrar la conexión a la base de datos




header('Location: ../camion_carga.php');
exit;

?>