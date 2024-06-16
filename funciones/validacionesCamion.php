<?php
function Validar_Datos() {
    $vMensaje='';
    
    if (strlen($_POST['marca']) < 0) {
        $vMensaje.='Debes Seleccionar una marca. <br />';
    }
    if (strlen($_POST['modelo']) < 3) {
        $vMensaje.='Debes ingresar un modelo con al menos 3 caracteres. <br />';
    }
    if (  strlen($_POST['patente']) < 6 || strlen($_POST['patente']) > 7) {
        $vMensaje .= 'Debes ingresar una patente que sea alfa numérica y tenga entre 6  y 7 dígitos. <br />';
    }

    if (strlen($_POST['anio']) != 4) {
        $vMensaje.='Debes ingresar un año de 4 dígitos. <br />';
    }
    return $vMensaje;
}

?>