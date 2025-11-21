<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relación 4 - Ejercicio 1</title>
        <link rel="shortcut icon" href="./playamar.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <style>
            #wrapper {
                height: 100vh;
            }
            .form-text {
                visibility: hidden;
            }
        </style>
    </head>
    <body>
        <div id="wrapper" class="d-flex justify-content-center align-items-center">
            <form class="shadow p-3 rounded w-50" id="formulario" action=<?php echo htmlspecialchars("proceso.php")?> method="post">
                <h2>Relación 4 - Ejercicio 1</h2>
                <div>
                    <label class="form-label" for="usuario">Usuario: <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="usuario" id="usuario">
                    <div id="usuarioHelp" class="form-text text-danger">El usuario es obligatorio.</div>
                </div>
                <div>
                    <label class="form-label" for="contrasenya">Contraseña: <span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="contrasenya" id="contrasenya">
                    <div id="contrasenyaHelp" class="form-text text-danger">La contraseña es obligatoria.</div>
                </div>
                <input class="form-control my-3" type="submit" value="Enviar">

                <h1>
                <?php 
                    if(isset($_SESSION['errorLogin'])){
                        echo "<p class='text-danger'>Usuario o contraseña desconocidos</p>";

                    }
                ?>
            </form>
        </div>
        <script src="./validacion.js"></script>
    </body>
</html>