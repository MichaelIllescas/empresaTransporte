<?php require_once 'encabezado.php' ;
 require_once 'seccionSuperior.php' ;
 require_once 'menu_lateral.php';
  

?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Registrar un nuevo viaje</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Viajes</li>
          <li class="breadcrumb-item active">Carga</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ingresa los datos</h5>

                <div class="alert alert-info alert-dismissible fade d-none" role="alert">
                    <i class="bi bi-info-circle me-1"></i>
                    Los campos indicados con (*) son requeridos
                </div>
<!--
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Mensajes de Alerta por validaciones
                </div>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    Los datos se guardaron correctamente! 
                </div>
-->
                <form class="row g-3">
                    <div class="col-12">
                        <label for="selector" class="form-label">Chofer (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector">
                          <option selected="">Selecciona una opcion</option>
                          <option>Perez, Juan (DNI 22333444) </option>
                          <option>Alvarez, Marcos (DNI 33444555) </option>
                          <option>Rodriguez, Ariel (DNI 44555666) </option>
                          <option>Zapata, Joaquin (DNI 55666777) </option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="selector" class="form-label">Transporte (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector">
                          <option selected="">Selecciona una opcion</option>
                          <option>Iveco - Daily Furgon - AC206JK </option>
                          <option>Volkswagen - Delivery - AC506AA  </option>
                          <option>Scania - Serie P - AA322CX   </option>
                          <option>Iveco - Daily Chasis - AD698HA </option>
                        </select>
                    </div>
                    
                    <div class="col-12">
                        <label for="fecha" class="form-label">Fecha programada (*)</label>
                        <input type="date" class="form-control" id="fecha">
                    </div>
                    <div class="col-12">
                        <label for="selector" class="form-label">Destino (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector">
                          <option selected="">Selecciona una opcion</option>
                          <option>Rio Primero </option>
                          <option>Capilla del Monte</option>
                          <option>San Francisco  </option>
                          <option>Morteros   </option>
                          <option>Toledo </option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="costo" class="form-label">Costo (*)</label>
                        <input type="text" class="form-control" id="costo">
                    </div>
                    <div class="col-12">
                        <label for="porc" class="form-label">Porcentaje chofer (*)</label>
                        <input type="text" class="form-control" id="porc">
                    </div>



                    

                    <div class="text-center">
                        <button class="btn btn-primary">Registrar</button>
                        <button type="reset" class="btn btn-secondary">Limpiar Campos</button>
                        <a href="index.html" class="text-primary fw-bold">Volver al index</a>
                    </div>
                </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->


<?php
 require_once 'pie.php'
?>