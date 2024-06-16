<?php 

function obtenerClaseFila($fechaViaje) {
    date_default_timezone_set("America/Argentina/Cordoba");
    $fechaHoy = date("Y-m-d");

    if ($fechaViaje < $fechaHoy) {
        return 'table-success'; // Viaje ya realizado
    } elseif ($fechaViaje == $fechaHoy) {
        return 'table-danger'; // Viaje para hoy
    } elseif ($fechaViaje == date("Y-m-d", strtotime("+1 day"))) {
        return 'table-warning'; // Viaje para mañana
    } else {
        return ''; // Otro caso (opcional: puedes manejar otras condiciones según tu lógica)
    }
}
function obtenerMensajeTooltip($fechaViaje) {
    date_default_timezone_set("America/Argentina/Cordoba");
    $fechaActual = date("Y-m-d");
    $maniana = date("Y-m-d", strtotime($fechaActual . "+ 1 day"));

    if ($fechaViaje == $maniana) {
        return "El viaje es mañana!";
    } elseif ($fechaViaje == $fechaActual) {
        return "El viaje es hoy!";
    } elseif ($fechaViaje < $fechaActual) {
        return "El viaje ya se hizo.";
    } else {
        return "El viaje está programado.";
    }
}

function formatearFecha($fecha) {
    // Convertir la fecha al formato deseado (por ejemplo, DD/MM/YYYY)
    $timestamp = strtotime($fecha);
    return date('d/m/Y', $timestamp);
}

function mostrarMontoChofer($costo, $porcentajeChofer) {
    $montoChofer = $costo * $porcentajeChofer / 100;
    return "$ " . number_format($montoChofer, 2); // Formatear el monto con dos decimales
}

