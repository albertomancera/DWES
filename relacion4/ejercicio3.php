<?php 
    $secreto = isset($_GET['secreto']) ? $_GET['secreto'] : rand(1, 100);
    $intento = isset($_GET['intento']) ? $_GET['intento'] : null;
    $mensaje = "Adivina el número entre 1 y 100";

    if($intento != null){
        if($intento == $secreto){
            $mensaje = "¡Has acertado! El número era $secreto .";
        }elseif($intento > $secreto){
            $mensaje = "Te has pasado";
        }else{
            $mensaje = "Te has quedado corto";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relación 4 - Ejercicio 3</title>
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
                <h2>Relación 4 - Ejercicio 3</h2>
                <div><?php echo $mensaje; ?></div>

                <?php 
                    if ($intento != $secreto) {
                        echo "<input type='number' name='intento' min='1' max='100' required>";
                        echo "<input type='hidden' name='secreto' value='$secreto'>";
                        echo "<input class='form-control my-3 bg-primary text-white' type='submit' value='Probar'>";
                    } else {
                        $self = $_SERVER['PHP_SELF'];
                        echo "<a href='$self'>Jugar otra vez</a>";
                    }
                
                ?>
            </form>
        </div>
    </body>
</html>