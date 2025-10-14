<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 -Ejercicio 12</title>
</head>
<body>
    <h1>Nota Númerica </h1>

    <?php
        $nota = 2;

        switch ($nota) {
            case 1:
            case 3:
            case 3:
            case 4:
                echo "Suspenso, tu nota es : ", $nota , "<br>";
                break;
            case 5:
                echo "Suficiente, tu nota es: ",$nota, "<br>";
                break;
            case 6:
                echo "Bien, tu nota es: ",$nota,"<br";
                break;
            case 7:
            case 8:
                echo "Notable , tu nota es: ",$nota,"<br>";
                break;
            case 9:
            case 10:
                echo "Sobresaliente, tu nota es: ",$nota,"<br>";
                break;
            default:
                echo "Nota no valida, está fuera del rango (1-10)";
                break;
        }
    ?>
</body>
</html>