<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 20</title>
</head>

<body>
    <h1>Ejercicio 19 Mejorado</h1>

    <?php
    // Número a convertir
    $numero = 255;

    // Base a la que queremos convertir: puede ser 2, 8 o 16
    $base = 16;

    // Variable para guardar el resultado
    $resultado = "";

    // Caracteres posibles para hexadecimal
    $hex_chars = "0123456789ABCDEF";

    // Guardamos el número original para mostrarlo después
    $original = $numero;

    // Bucle de conversión manual
    while ($numero > 0) {
        $resto = $numero % $base;
        $resultado = $hex_chars[$resto] . $resultado;
        $numero = intdiv($numero, $base);
    }

    // Mostramos el resultado según la base elegida
    if ($base == 2) {
        echo "El número decimal $original en binario es: $resultado";
    } elseif ($base == 8) {
        echo "El número decimal $original en octal es: $resultado";
    } elseif ($base == 16) {
        echo "El número decimal $original en hexadecimal es: $resultado";
    } else {
        echo "Base no válida. Usa 2, 8 o 16.";
    }
    ?>

</body>

</html>