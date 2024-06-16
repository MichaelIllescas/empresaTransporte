<?php
session_start(); // Iniciar sesión si no está iniciada

require_once "conexion.php";

$conexion = ConexionBD();

// Verificar si el ID del usuario está disponible en la sesión
if (!isset($_SESSION['usuario']['ID'])) {
    die("Error: El ID del usuario no está disponible en la sesión.");
}

$idUsuario = $_SESSION['usuario']['ID'];
$nivelUsuario = $_SESSION['usuario']['NIVEL'];

function cargarViajesCofer($conexion, $idUsuario){
    $SQL = "SELECT v.fechaViaje, d.denominacion, m.marca, m.modelo, c.patente, u.nombre, u.apellido, v.costo, v.porcentajeChofer
            FROM viajes v
            INNER JOIN destinos d ON v.idDestino = d.id
            INNER JOIN camiones c ON v.idCamion = c.id
            INNER JOIN marcas m ON c.idMarca = m.id
            INNER JOIN usuarios u ON v.idChofer = u.id
            INNER JOIN nivel n ON u.idNivel = n.id
            WHERE u.id = ?
            ORDER BY v.fechaViaje ASC";

    // Preparar y ejecutar la consulta
    $stmt = $conexion->prepare($SQL);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("i", $idUsuario); // "i" indica que el parámetro es un entero
    $stmt->execute();
    $result = $stmt->get_result();

    // Guardar los resultados en $_SESSION['viajes']
    $_SESSION['viajes'] = [];
    while ($row = $result->fetch_assoc()) {
        $_SESSION['viajes'][] = $row;
    }

    $stmt->close();  
}
function cargarViajesAdmin($conexion){
    $SQL = "SELECT v.fechaViaje, d.denominacion, m.marca, m.modelo, c.patente, u.nombre, u.apellido, v.costo, v.porcentajeChofer
            FROM viajes v
            INNER JOIN destinos d ON v.idDestino = d.id
            INNER JOIN camiones c ON v.idCamion = c.id
            INNER JOIN marcas m ON c.idMarca = m.id
            INNER JOIN usuarios u ON v.idChofer = u.id
            INNER JOIN nivel n ON u.idNivel = n.id 
             ORDER BY v.fechaViaje ASC";

    // Preparar y ejecutar la consulta
    $stmt = $conexion->prepare($SQL);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    // Guardar los resultados en $_SESSION['viajes']
    $_SESSION['viajes'] = [];
    while ($row = $result->fetch_assoc()) {
        $_SESSION['viajes'][] = $row;
    }

    $stmt->close();  
}


if($nivelUsuario == 1){
    cargarViajesAdmin($conexion, $idUsuario);
}elseif ($nivelUsuario == 2){
    cargarViajesAdmin($conexion, $idUsuario);
}else{
    cargarViajesCofer($conexion, $idUsuario);
}




$conexion->close();
header('Location: ../viajes_listado.php');
exit;
?>
