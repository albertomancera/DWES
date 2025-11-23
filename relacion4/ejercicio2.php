<?php 
    // 1. Inicia o reanuda una sesión para poder usar la variable superglobal $_SESSION.
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relación 4 - Ejercicio 2</title>
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
            <form class="shadow p-3 rounded w-50" id="formulario" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> method="get">
                <h2 class="text-center">Relación 4 - Ejercicio 2</h2>

                <?php 
                    // 2. Comprueba si la variable de sesión 'a' no ha sido creada todavía.
                    //    Esto solo será cierto la primera vez que un usuario visita la página.
                    if(!isset($_SESSION['a'])){
                        // Si no existe, inicializa las variables de sesión 'a' y 'b' a 0.
                        $_SESSION['a'] = 0;
                        $_SESSION['b'] = 0;
                    }
                
                ?>

                <?php 
                    // 3. Comprueba si el formulario ha sido enviado (si existe el parámetro 'enviar').
                    //    $_REQUEST funciona tanto para GET como para POST.
                    if (isset($_REQUEST['enviar'])) {
                        // 4. Usa una estructura switch para ejecutar una acción basada en la opción seleccionada
                        //    en el menú desplegable ('operacion').
                        switch($_REQUEST['operacion']){
                            case "+a":
                                // Si la opción es '+a', incrementa el valor de 'a' en la sesión.
                                $_SESSION['a']++;
                                break;
                            case "-a":
                                // Si la opción es '-a', decrementa el valor de 'a' en la sesión.
                                $_SESSION['a']--;
                                break;
                            case "+b":
                                // Si la opción es '+b', incrementa el valor de 'b' en la sesión.
                                $_SESSION['b']++;
                                break;
                            case "-b":
                                // Si la opción es '-b', decrementa el valor de 'b' en la sesión.
                                $_SESSION['b']--;
                                break;
                            case "ra":
                                // Si la opción es 'ra', resetea el valor de 'a' a 0.
                                $_SESSION['a'] = 0;
                                break;
                            case "rb":
                                // Si la opción es 'rb', resetea el valor de 'b' a 0.
                                $_SESSION['b'] = 0;
                                break;
                            case "ds":
                                // Si la opción es 'ds' (destruir sesión):
                                // Primero, resetea las variables a 0 (buena práctica).
                                $_SESSION['a'] = 0;
                                $_SESSION['b'] = 0;
                                // Luego, destruye toda la información registrada en la sesión actual.
                                session_destroy();
                                break;
                        }
                    }
                ?>

                <!-- 5. Muestra los valores actuales de los contadores 'a' y 'b' que están guardados en la sesión. -->
                <h1>A : <?php echo $_SESSION['a']; ?></h1>
                <h1>B : <?php echo $_SESSION['b']; ?></h1>

                <!-- 6. El menú desplegable (select) que permite al usuario elegir qué operación realizar. -->
                <!--    El atributo 'name' ("operacion") es la clave que se usa en el switch de PHP. -->
                <select name="operacion" id="operacion">
                    <option value="+a">Incrementar A</option>
                    <option value="-a">Decrementar A</option>
                    <option value="+b">Incrementar B</option>
                    <option value="-b">Decrementar B</option>
                    <option value="ra">Resetear A</option>
                    <option value="rb">Resetear B</option>
                    <option value="ds">Destruir sesión</option>
                </select>
                <!-- El botón de envío del formulario. Su nombre ('enviar') se usa para detectar si el formulario fue enviado. -->
                <input class="form-control my-3 bg-primary text-white" name="enviar" type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>