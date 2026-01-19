<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Prueba</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
            <div class="img-left d-none d-md-flex"></div>
            <div class="card-body">
                <h4 class="tittle text-center mt-4">Inicio de Sesión</h4>
                <form method="post" action="" class="form-box px-3">

                    <?php 
                        include "modelo/conexion.php";
                        include "controlador/controlador_login.php";
                    ?>


                    <div class="form-input">
                        <span><i class="fa fa-envelope-o"></i></span>
                        <input type="text" name="usuario" placeholder="Usuario" required>
                    </div>
                    <div class="form-input">
                        <span><i class="fa fa-key"></i></span>
                        <input type="password" name="password" placeholder="Contraseña" required>
                    </div>

                    <div class="view">
                        <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
                    </div>

                    <div class="mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cb1" name="">
                            <label class="custom-control-label" for="cb1"> Recuerdame </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="submit" class="btn btn-block text-uppercase" name="btningresar" value="Iniciar Sesión">
                    </div>

                    <div class="text-right">
                        <a href="#" class="forget-link">¿Se te ha olvidado la contraseña?</a>
                    </div>

                    <div class="text-center mb-3">
                        <div class="col-4">
                            <a href="#" class="btn btn-block btn-social btn-facebook">Facebook</a>
                        </div>

                        <div class="col-4">
                            <a href="#" class="btn btn-block btn-social btn-google">Google</a>
                        </div>

                        <div class="col-4">
                            <a href="#" class="btn btn-block btn-social btn-twitter">Twitter</a>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="text-center mb-2">
                        ¿No tienes cuenta?
                        <a href="registro_usuario.php" class="register-link">Registrate</a>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>