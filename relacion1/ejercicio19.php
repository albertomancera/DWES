<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 19</title>
</head>

<body>
    <?php
    $num = 25;

    $binario = "";

    while ($num > 0) {
        //Obtenemos el resto de dividir entre 2
        $resto = $num % 2;

        //Agregamos el resto al principio del resultado
        $binario = $resto . $binario;

        //Dividimos el número entre 2
        $num = intdiv($num, 2);
    }

    echo "El número decimal 25 en binario es: $binario";

    ?>

</body>

</html>