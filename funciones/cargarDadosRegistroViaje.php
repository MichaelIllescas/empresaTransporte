<?php 
require_once "conexion.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}// Iniciar la sesión si es q no exite


$conexion = ConexionBD(); // Establecer la conexión a la base de datos
$query = "SELECT id, apellido, nombre, dni FROM usuarios WHERE idNivel = 3";

$result = $conexion->query($query); // Ejecutar la consulta

if ($result) { // Comprobar si la consulta se ejecutó correctamente
    $usuarios = array(); // Inicializar un array para almacenar los usuarios
    while ($row = $result->fetch_assoc()) { // Iterar sobre los resultados de la consulta
        $usuarios[] = $row; // Agregar cada usuario al array
    }
    // Almacenar el array de usuarios en la variable de sesión
    $_SESSION['usuarios'] = $usuarios;
} else {
    // Mostrar un mensaje de error si la consulta falló
    echo "Error al obtener los usuarios: " . $conexion->error;
}
// Consulta SQL para obtener todas las marcas de la tabla `marcas` y la patente de los camiones correspondientes
$query = "SELECT m.id, m.marca, m.modelo, c.id, c.patente 
          FROM marcas AS m
          INNER JOIN camiones AS c ON m.id = c.idMarca 
          ORDER BY m.marca";
$result = $conexion->query($query); // Ejecutar la consulta

if ($result) { // Comprobar si la consulta se ejecutó correctamente
    $marcas = array(); // Inicializar un array para almacenar las marcas y patentes
    while ($row = $result->fetch_assoc()) { // Iterar sobre los resultados de la consulta
        $marcas[] = $row; // Agregar cada fila al array
    }
    // Almacenar el array de marcas en la variable de sesión
    $_SESSION['marcas'] = $marcas;
} else {
    // Mostrar un mensaje de error si la consulta falló
    echo "Error al obtener las marcas: " . $conexion->error;
}


//Obtener los destinos
$query="SELECT * from destinos";

$result = $conexion->query($query); // Ejecutar la consulta

if ($result) { // Comprobar si la consulta se ejecutó correctamente
    $destinos = array(); // Inicializar un array para almacenar los usuarios
    while ($row = $result->fetch_assoc()) { // Iterar sobre los resultados de la consulta
        $destinos[] = $row; // Agregar cada usuario al array
    }
    // Almacenar el array de usuarios en la variable de sesión
    $_SESSION['destinos'] = $destinos;
} else {
    // Mostrar un mensaje de error si la consulta falló
    echo "Error al obtener los destinos: " . $conexion->error;
}




$conexion->close(); // Cerrar la conexión a la base de datos







header('Location: ../viaje_carga.php');
exit;

?>
