<?php 
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
                    if(!isset($_SESSION['a'])){
                        $_SESSION['a'] = 0;
                        $_SESSION['b'] = 0;
                    }
                
                ?>

                <?php 
                    if (isset($_REQUEST['enviar'])) {
                        switch($_REQUEST['operacion']){
                            case "+a":
                                $_SESSION['a']++;
                                break;
                            case "-a":
                                $_SESSION['a']--;
                                break;
                            case "+b":
                                $_SESSION['b']++;
                                break;
                            case "-b":
                                $_SESSION['b']--;
                                break;
                            case "ra":
                                $_SESSION['a'] = 0;
                                break;
                            case "rb":
                                $_SESSION['b'] = 0;
                                break;
                            case "ds":
                                $_SESSION['a'] = 0;
                                $_SESSION['b'] = 0;
                                session_destroy();
                                break;
                        }
                    }
                
                
                ?>

                <h1>A : <?php echo $_SESSION['a']; ?></h1>
                <h1>B : <?php echo $_SESSION['b']; ?></h1>

                <select name="operacion" id="operacion">
                    <option value="+a">Incrementar A</option>
                    <option value="-a">Decrementar A</option>
                    <option value="+b">Incrementar B</option>
                    <option value="-b">Decrementar B</option>
                    <option value="ra">Resetear A</option>
                    <option value="rb">Resetear B</option>
                    <option value="ds">Destruir sesión</option>
                </select>
                <input class="form-control my-3 bg-primary text-white" name="enviar" type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>