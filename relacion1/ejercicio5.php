<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Array asociativo de temperaturas</h1>

    <?php
    $temperaturas = ["lunes" => 32,
                    "martes" => 28,
                    "miercoles" => 34,
                    "jueves" => 23,
                    "viernes" => 27,
                    "sabado" => 33,
                    "domingo" => 25
    ];

    echo "Temperatura del primer dia de la semana", $temperaturas["lunes"];

    echo "<br> temperatura de todos los dias de la semana: <br>";
    echo "<h2> saltando de linea </h2>";
    foreach ($temperaturas as $dia => $temp) {
        echo "$dia : $temp <br>";
    }

    echo "<h2> en forma de lista </h2>";
    echo "<ol>";
    foreach ($temperaturas as $dia => $temp) {
        echo "<li>$dia : $temp </li>";
    }

    echo "</ol>";

    echo "<h2> en forma de tabla </h2>";
    echo "<table>";
    foreach ($temperaturas as $dia => $temp) {
        echo "<tr>";
            echo "<td>$dia </td> : <td> $temp </td>";
        echo "</tr>";
    }   

    echo "</table>";

    ?>
</body>
</html>