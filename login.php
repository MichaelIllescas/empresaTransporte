<?php
require_once "encabezado.php";

session_start();


?>


<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Panel de Administración</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Ingresa tu cuenta</h5>
                    <p class="text-center small">Ingresa tu datos de usuario y clave</p>
                  </div>

                  <form class="row g-3 needs-validation" action="funciones/validarInicioSesion.php" method="POST" novalidate>
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Usuario</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" class="form-control" id="yourUsername" name="user" required>
                                            <div class="invalid-feedback">Ingresa tu usuario.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Clave</label>
                                        <input type="password" class="form-control" id="yourPassword" name="clave" required>
                                        <div class="invalid-feedback">Ingresa tu clave</div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>

                                    <?php
                                    if (isset($_GET['error']) && $_GET['error'] == 1) {
                                        echo '<div class="alert alert-danger" role="alert">Usuario o clave incorrectos</div>';
                                    }
                                    ?>
                                </form>


                </div>
              </div>
             
                                  
 </section>
 </div>
</main>            
<?php
  require_once 'pie.php';
  ?>
 