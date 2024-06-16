<?php
function Validar_Datos() {
    $vMensaje = '';

    if (empty($_POST['chofer']) || $_POST['chofer'] == 'Selecciona una opción') {
        $vMensaje .= 'Debes seleccionar un chofer válido. <br />';
    }

    if (empty($_POST['transporte']) || $_POST['transporte'] == 'Selecciona una opción') {
        $vMensaje .= 'Debes seleccionar un transporte válido. <br />';
    }

    if (empty($_POST['fecha'])) {
        $vMensaje .= 'Debes ingresar una fecha programada. <br />';
    }

    if (empty($_POST['destino']) || $_POST['destino'] == 'Selecciona una opción') {
        $vMensaje .= 'Debes seleccionar un destino válido. <br />';
    }

    if (!is_numeric($_POST['costo'])) {
        $vMensaje .= 'El costo debe ser un valor numérico. <br />';
    }

    if (!is_numeric($_POST['porcentajeChofer'])) {
        $vMensaje .= 'El porcentaje para el chofer debe ser un valor numérico entero. <br />';
    }

    // Si el costo y porcentajeChofer son numéricos, validar que porcentajeChofer sea menor o igual al costo
    if (is_numeric($_POST['costo']) && is_numeric($_POST['porcentajeChofer'])) {
        $costo = floatval($_POST['costo']);
        $porcentajeChofer = intval($_POST['porcentajeChofer']);
        if ($porcentajeChofer > 100) {
            $vMensaje .= 'El porcentaje para el chofer no puede ser mayor que el costo del viaje. <br />';
        }
    }

    return $vMensaje;
}
?>