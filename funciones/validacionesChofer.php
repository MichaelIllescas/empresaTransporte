<?php
function Validar_Datos() {
    $vMensaje='';
    if (strlen($_POST['nombre']) < 3) {
        $vMensaje.='Debes ingresar un nombre con al menos 3 caracteres. <br />';
    }
    if (strlen($_POST['apellido']) < 3) {
        $vMensaje.='Debes ingresar un apellido con al menos 3 caracteres. <br />';
    }
    if (!is_numeric($_POST['dni']) || strlen($_POST['dni']) < 7 || strlen($_POST['dni']) > 10) {
        $vMensaje .= 'Debes ingresar un DNI que sea numérico y tenga entre 7 y 10 dígitos. <br />';
    }
    if (!empty($_POST["usuario"]) && strlen($_POST['clave']) == 0 ) {
        $vMensaje.='Debes ingresar la clave. <br />';
    }
    return $vMensaje;

}

?>