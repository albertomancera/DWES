<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 5</title>
</head>
<body>
    <h1>Ecuación de Segundo Grado </h1>

    <?php
        $a = 1;
        $b = -3;
        $c = 2;

        $discriminante = $b * $b - 4 * $a * $c;

        if($a == 0){
            echo "No es una ecuación de segundo grado";
        }else if($discriminante < 0){
            echo "La ecuación no tiene soluciones reales";
        }else{
            $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
            $x2 = (-$b - sqrt($discriminante)) / (2 * $a);


            echo "Las soluciones reales son : <br>";
            echo "x1 = " , round($x1,2) ,"<br>";
            echo "x2 = ", round($x2,2), "<br>";
        }


    ?>
</body>
</html>