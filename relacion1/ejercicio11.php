<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 11</title>
</head>
<body>
    <h1>Mejora del Ejercicio 10</h1>

    <?php
        $a = 1;
        $b = -3;
        $c = 2;

        $discriminante = $b * $b - 4 * $a * $c;

        if($a == 0){
            echo "No es una ecuación de segundo grado, solo hay una raiz: <br>";
            $x = -$c / $b;
            echo "La solcion de x = ", round($x,2), "<br>";
        }else if ($b == 0){
            echo "Las raices de manera más sencilla: <br>";
            $x1 = -sqrt(-$c/$a);
            $x2 = sqrt(-$c/$a);

            echo "Las soluciones son : <br>";
            echo "x1 = " , round($x1,2) ,"<br>";
            echo "x2 = ", round($x2,2), "<br>";
        
        }else if($c == 0){
            echo "Las raices son sacando el factor comun: <br>";
            $x1 = 0;
            $x2 = -$b/$a;
            
            echo "Las soluciones son : <br>";
            echo "x1 = " , round($x1,2) ,"<br>";
            echo "x2 = ", round($x2,2), "<br>";
            
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