<?php
    session_start();

    if (!isset($_SESSION['secreto'])) {
        $_SESSION['secreto'] = rand(1, 100);
    }

    $secreto = $_SESSION['secreto'];
    $intento = isset($_GET['intento']) ? (int)$_GET['intento'] : null;
    $mensaje = "Adivina el número entre 1 y 100";

    if ($intento !== null) {
        if ($intento == $secreto) {
            $mensaje = "¡Has acertado! El número era $secreto.";
            unset($_SESSION['secreto']);
        } elseif ($intento > $secreto) {
            $mensaje = "Te has pasado.";
        } else {
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
        <form class="shadow p-3 rounded w-50" id="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
            <h2>Relación 4 - Ejercicio 3 (Sesiones)</h2>
            <div><?php echo $mensaje; ?></div>

            <?php 
                if ($intento !== $secreto) {
                    echo "<input type='number' name='intento' min='1' max='100' required>";
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