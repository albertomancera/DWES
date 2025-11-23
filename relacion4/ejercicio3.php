<?php 
    // Comprueba si se ha recibido un parámetro 'secreto' por GET.
    // Si no se ha recibido (inicio del juego), genera un número aleatorio entre 1 y 100.
    // Si se ha recibido, usa ese valor. Así se mantiene el número entre intentos.
    $secreto = isset($_GET['secreto']) ? $_GET['secreto'] : rand(1, 100);
    // Comprueba si se ha recibido un 'intento' por GET. Si no, su valor es null.
    $intento = isset($_GET['intento']) ? $_GET['intento'] : null;
    // Define el mensaje inicial para el jugador.
    $mensaje = "Adivina el número entre 1 y 100";

    // Este bloque solo se ejecuta si el usuario ha enviado un intento.
    if($intento != null){
        // Compara el intento con el número secreto.
        if($intento == $secreto){
            // Si acierta, actualiza el mensaje para felicitarlo.
            $mensaje = "¡Has acertado! El número era $secreto .";
        }elseif($intento > $secreto){
            // Si el intento es mayor, da una pista.
            $mensaje = "Te has pasado";
        }else{
            // Si el intento es menor, da otra pista.
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
            <!-- El formulario se envía a sí mismo (PHP_SELF) usando el método GET. -->
            <form class="shadow p-3 rounded w-50" id="formulario" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> method="get">
                <h2>Relación 4 - Ejercicio 3</h2>
                <!-- Muestra el mensaje con el resultado del intento o las instrucciones. -->
                <div><?php echo $mensaje; ?></div>

                <?php 
                    // Comprueba si el intento actual no es el correcto para decidir si el juego continúa.
                    if ($intento != $secreto) {
                        // Si el juego no ha terminado, muestra el campo para introducir el número.
                        echo "<input type='number' name='intento' min='1' max='100' required>";
                        // ¡IMPORTANTE! Pasa el número secreto en un campo oculto para no perderlo en el siguiente envío del formulario.
                        echo "<input type='hidden' name='secreto' value='$secreto'>";
                        echo "<input class='form-control my-3 bg-primary text-white' type='submit' value='Probar'>";
                    } else {
                        // Si el usuario ha acertado, muestra un enlace para recargar la página y empezar una nueva partida.
                        $self = $_SERVER['PHP_SELF'];
                        echo "<a href='$self'>Jugar otra vez</a>";
                    }
                
                ?>
            </form>
        </div>
    </body>
</html>