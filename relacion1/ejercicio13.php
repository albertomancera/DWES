<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 13</title>
</head>
<body>
    <h1>Calcular el factorial</h1>

    <?php
        $num = 6;

        if($num < 0){
            echo "El número debe ser entero y positivo. ";
        } elseif ($num == 0 || $num == 1) {
            echo "$num! = 1";
        }else {
            $factorial = 1;
            echo "$num! = ";

            for($i = $num; $i >= 1; $i--){
                $factorial *=$i;
                echo $i;
                if($i > 1) echo "x";
            }
            echo " = ", $factorial, "<br>";
        }
        
    ?>
</body>
</html>