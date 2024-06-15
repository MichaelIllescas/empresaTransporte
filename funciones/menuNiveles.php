<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function listadoViajes() {

    return  '<li>
                <a href="viajes_listado.php" class="active">
                   <i class="bi bi-layout-text-window-reverse"></i><span>Listado de viajes</span>
                  </a>
            </li>';
}

function cargarViaje(){
    return'<li>
                <a href="funciones/cargarDadosRegistroViaje.php" class="active">
                    <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo Viaje</span>
                </a>
            </li>';
}
function cargarChofer(){
    return'   <li>
                    <a href="chofer_carga.php" class="active">
                        <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo chofer</span>
                    </a>
                </li>';
}
function cargarCamion(){
    return' <li>
                    <a href="funciones/cargarDatosCamiones.php" class="active">
                        <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo transporte</span>
                    </a>
                </li>';
}



?>
