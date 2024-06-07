<?php require_once 'encabezado.php' ;
 require_once 'seccionSuperior.php' ;
 require_once 'menu_lateral.php';
  

?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Registrar un nuevo transporte</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Transportes</li>
          <li class="breadcrumb-item active">Carga Camión</li>
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

                  <div class="alert alert-warning alert-dismissible fade d-none" role="alert">
                      <i class="bi bi-exclamation-triangle me-1"></i>
                      Mensajes de Alerta por validaciones
                  </div>

                  <div class="alert alert-success alert-dismissible fade d-none" role="alert">
                      <i class="bi bi-check-circle me-1"></i>
                      Los datos se guardaron correctamente! 
                  </div>

                  <form class="row g-3">
                    <div class="col-12">
                        <label for="selector" class="form-label">Marca (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector">
                          <option selected="">Selecciona una opcion</option>
                          <option>Iveco</option>
                          <option>Volkswagen</option>
                          <option>Volvo</option>
                          <option>Scania</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="modelo" class="form-label">Modelo (*)</label>
                        <input type="text" class="form-control" id="modelo">
                    </div>

                    <div class="col-12">
                        <label for="año" class="form-label">Año</label>
                        <input type="text" class="form-control" id="año">
                    </div>
                    
                    <div class="col-12">
                        <label for="patente" class="form-label">Patente (*)</label>
                        <input type="text" class="form-control" id="patente">
                    </div>
                    <!--
                    <div class="col-12">
                        <label for="selector" class="form-label">Tipo carga (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector">
                          <option selected="">Selecciona una opcion</option>
                          <option>Congelados</option>
                          <option>Carga normal</option>
                        </select>
                    </div>
-->
                    <div class="col-12">
                        <label class="form-label">Disponibilidad</label>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="gridCheck1">
                          <label class="form-check-label" for="gridCheck1"> Habilitado</label>
                        </div>
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













<?php require_once 'pie.php';?>