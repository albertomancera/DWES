<?php
    // Inicia o reanuda una sesión. Es necesario para poder usar la variable superglobal $_SESSION.
    session_start();

    // Comprueba si el número secreto ya está guardado en la sesión.
    // Si no existe, significa que es una partida nueva.
    if (!isset($_SESSION['secreto'])) {
        // Genera un número aleatorio entre 1 y 100 y lo guarda en la sesión.
        $_SESSION['secreto'] = rand(1, 100);
    }

    // Recupera el número secreto de la sesión para usarlo en el script.
    $secreto = $_SESSION['secreto'];
    // Comprueba si se ha enviado un 'intento' por el método GET.
    // Si existe, lo convierte a entero. Si no, su valor es null.
    $intento = isset($_GET['intento']) ? (int)$_GET['intento'] : null;
    // Mensaje inicial que se mostrará al usuario.
    $mensaje = "Adivina el número entre 1 y 100";

    // Procesa la jugada solo si se ha recibido un intento (si $intento no es null).
    if ($intento !== null) {
        // Compara el intento del usuario con el número secreto.
        if ($intento == $secreto) {
            // El usuario ha acertado.
            $mensaje = "¡Has acertado! El número era $secreto.";
            // Elimina el número secreto de la sesión para que se genere uno nuevo en la siguiente partida.
            unset($_SESSION['secreto']);
        } elseif ($intento > $secreto) {
            // El intento es mayor que el número secreto.
            $mensaje = "Te has pasado.";
        } else {
            // El intento es menor que el número secreto.
            $mensaje = "Te has quedado corto.";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 4 - Ejercicio 3 (Sesiones)</title>
    <link rel="shortcut icon" href="./playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <!-- htmlspecialchars() previene ataques XSS. -->
        <form class="shadow p-3 rounded w-50" id="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
            <h2>Relación 4 - Ejercicio 3 (Sesiones)</h2>
            <!-- Muestra el mensaje correspondiente al estado del juego. -->
            <div><?php echo $mensaje; ?></div>

            <?php 
                // Lógica para mostrar el formulario o el enlace de "Jugar otra vez".
                if ($intento !== $secreto) {
                    // Si el juego no ha terminado (el intento no es correcto), muestra el campo para adivinar.
                    echo "<input type='number' name='intento' min='1' max='100' required>";
                    echo "<input class='form-control my-3 bg-primary text-white' type='submit' value='Probar'>";
                } else {
                    // Si el usuario ha acertado, muestra un enlace para recargar la página y empezar de nuevo.
                    $self = $_SERVER['PHP_SELF'];
                    echo "<a href='$self'>Jugar otra vez</a>";
                }
            ?>

        </form>
    </div>
</body>
</html>