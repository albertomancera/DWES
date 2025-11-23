<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 15</title>
</head>
<body>
    <h1>Es Primo o No </h1>
    
    <?php
        $num = 17; // Número a comprobar

        // Un número primo debe ser > 1
        if ($num <= 1) {
            echo "El número debe de ser entero y positivo mayor que 1.";
        } else {

            $esPrimo = true;

            // Comprobamos divisores desde 2 hasta la raíz cuadrada de $num
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) {
                    $esPrimo = false;
                    break; // No es necesario seguir comprobando
                }
            }

            // Resultado
            if ($esPrimo) {
                echo "$num es un número primo";
            } else {
                echo "$num no es un número primo";
            }
        }
    ?>
</body>
</html>